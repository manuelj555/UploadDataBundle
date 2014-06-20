<?php

/*
 * This file is part of the Manuel Aguirre Project.
 *
 * (c) Manuel Aguirre <programador.manuel@gmail.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Manuelj555\Bundle\UploadDataBundle;

use InvalidArgumentException;
use Manuelj555\Bundle\UploadDataBundle\Config\ConfigInterface;
use Manuelj555\Bundle\UploadDataBundle\Event\ReadDataEvent;
use Manuelj555\Bundle\UploadDataBundle\Reader\DataReaderInterface;
use Manuelj555\Bundle\UploadDataBundle\Validator\Validator;
use ReflectionClass;
use Symfony\Component\EventDispatcher\EventDispatcherInterface;
use Symfony\Component\Serializer\Normalizer\GetSetMethodNormalizer;
use UnexpectedValueException;

/**
 * Description of DataProcessor
 *
 * @author Manuel Aguirre <programador.manuel@gmail.com>
 */
class DataProcessor
{

    /**
     *
     * @var DataReaderInterface
     */
    protected $reader;

    /**
     *
     * @var Validator
     */
    protected $validator;

    /**
     *
     * @var EventDispatcherInterface
     */
    protected $dispatcher;

    function __construct(DataReaderInterface $reader
    , Validator $validator
    , EventDispatcherInterface $dispatcher)
    {
        $this->reader = $reader;
        $this->validator = $validator;
        $this->dispatcher = $dispatcher;
    }

    public function process($filename, ConfigInterface $config)
    {
        $data = $this->loadData($filename, $config);

        $event = new ReadDataEvent($data);
        $name = sprintf(Events::POST_READ, $config->getName());
        $this->dispatcher->dispatch($name, $event);
        
        $this->validator->validate($config, $event->getData());

        return $event->getData();
    }

    public function setFileHeaderColumns($filename, ConfigInterface $config)
    {
        $data = $this->reader->read($filename);
        $headers = $this->reader->getHeaders($data, $config);
        
        $config->setFileColumns($headers);
    }

    protected function loadData($filename, ConfigInterface $config)
    {
        $rowClass = $this->getRowClass($config);
        $data = $this->reader->read($filename);
        $headers = $this->reader->getHeaders($data, $config);
        $data = $this->reader->getData($data, $config);

        $event = new ReadDataEvent($data);
        $name = sprintf(Events::PRE_READ, $config->getName());
        $this->dispatcher->dispatch($name, $event);

        $normalizer = new GetSetMethodNormalizer();
        $columnsName = array_flip($config->getColumnsAssociation());

        $result = new ReadedData();

        foreach ((array) $event->getData() as $rowIndex => $rowData) {
            foreach ($rowData as $column => $value) {
                unset($data[$rowIndex][$column]);
                if (array_key_exists($column, $columnsName)) {
                    $data[$rowIndex][$columnsName[$column]] = $value;
                }
            }
            $rowObject = $normalizer->denormalize($data[$rowIndex], new $rowClass());
            $result[] = $rowObject;
        }

        return $result;
    }

    protected function getRowClass(ConfigInterface $config)
    {
        $rowClass = $config->getRowClass();

        if (is_object($rowClass)) {
            $rowClass = get_class($rowClass);
        }

        if (!is_string($rowClass) || empty($rowClass)) {
            throw new UnexpectedValueException(sprintf("El método 'getConfig' de la clase '%s' debe devolver un string con el nombre de una clase válida ó una instancia", get_class($config)));
        }

        $reflection = new ReflectionClass($rowClass);

        if (!$reflection->isSubclassOf('Manuelj555\\Bundle\\UploadDataBundle\\RowInterface')) {
            throw new InvalidArgumentException(sprintf('The class %s must implements Manuelj555\\Bundle\\UploadDataBundle\\RowInterface', $rowClass));
        }

        return $rowClass;
    }

}
