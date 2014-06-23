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

/**
 * Description of LoadedData
 *
 * @author Manuel Aguirre <programador.manuel@gmail.com>
 */
class LoadedData implements \IteratorAggregate
{

    protected $headers;
    protected $data;

    function __construct($headers, $data)
    {
        $this->headers = $headers;
        $this->data = $data;
    }

    public function getHeaders()
    {
        return $this->headers;
    }

    public function getData()
    {
        return $this->data;
    }

    public function getIterator()
    {
        return new \ArrayIterator($this->getData());
    }

}
