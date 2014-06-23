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
use Manuelj555\Bundle\UploadDataBundle\LoadedData;

/**
 *
 * @author Manuel Aguirre <programador.manuel@gmail.com>
 */
interface DataReaderInterface
{

    public function supports($filename);

    /**
     * 
     * @param type $filename
     * @param ConfigInterface $config
     * 
     * @return LoadedData
     */
    public function read($filename, ConfigInterface $config);
}
