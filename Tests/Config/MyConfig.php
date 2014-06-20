<?php

/*
 * This file is part of the Manuel Aguirre Project.
 *
 * (c) Manuel Aguirre <programador.manuel@gmail.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Manuelj555\Bundle\UploadDataBundle\Tests\Config;

use Manuelj555\Bundle\UploadDataBundle\Config\AbstractConfig;

/**
 * Description of MyConfig
 *
 * @author Manuel Aguirre <programador.manuel@gmail.com>
 */
class MyConfig extends AbstractConfig
{

    public function getColumnNames()
    {
        return array('first_name', 'last_name');
    }

    public function getHeadersPosition()
    {
        return array(0, 0);
    }

    public function getRowClass()
    {
        return null;
    }

}
