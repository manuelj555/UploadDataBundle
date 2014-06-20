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

use Manuelj555\Bundle\UploadDataBundle\Config\ConfigInterface;

/**
 *
 * @author Manuel Aguirre <programador.manuel@gmail.com>
 */
interface DataReaderInterface
{

    public function supports($filename);

    public function read($filename);

    public function getHeaders($filename, ConfigInterface $config);
    public function getData($filename, ConfigInterface $config);
}
