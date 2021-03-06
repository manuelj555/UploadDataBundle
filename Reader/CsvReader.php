<?php

/*
 * This file is part of the Manuel Aguirre Project.
 *
 * (c) Manuel Aguirre <programador.manuel@gmail.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Manuelj555\Bundle\UploadDataBundle\Reader;

use InvalidArgumentException;
use Manuelj555\Bundle\UploadDataBundle\Config\ConfigInterface;
use SplFileObject;

/**
 * Description of CsvReader
 *
 * @author Manuel Aguirre <programador.manuel@gmail.com>
 */
class CsvReader implements DataReaderInterface
{

    protected $delimiter = '|';

    public function getDelimiter()
    {
        return $this->delimiter;
    }

    public function setDelimiter($delimiter)
    {
        $this->delimiter = $delimiter;
    }

    public function read($filename, ConfigInterface $config)
    {
        if (!file_exists($filename)) {
            throw new InvalidArgumentException(sprintf('File "%s" not found.', $filename));
        }

        $file = new SplFileObject($filename, 'rb');

        $file->setFlags(SplFileObject::READ_CSV | SplFileObject::SKIP_EMPTY | SplFileObject::DROP_NEW_LINE);
        $file->setCsvControl($this->getDelimiter());

        $data = iterator_to_array($file);

        return new \Manuelj555\Bundle\UploadDataBundle\LoadedData(
                $this->getHeaders($data, $config)
                , $this->getData($data, $config)
        );
    }

    public function supports($filename)
    {
        return strtolower(pathinfo($filename, PATHINFO_EXTENSION)) === 'csv';
    }

    protected function getHeaders($data, ConfigInterface $config)
    {
        list($col, $row) = $config->getHeadersPosition();
        $config->setFileColumns($data[$row]);

        return $data[$row];
    }

    protected function getData($data, ConfigInterface $config)
    {
        list($col, $row) = $config->getHeadersPosition();
        unset($data[$row]);

        return $data;
    }

}
