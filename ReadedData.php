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

use ArrayAccess;
use IteratorAggregate;

/**
 * Description of ReadedData
 *
 * @author Manuel Aguirre <programador.manuel@gmail.com>
 */
class ReadedData implements IteratorAggregate, ArrayAccess
{

    protected $items = array();
    protected $invalids = array();

    function __construct($items = array())
    {
        $this->items = $items;
    }

    public function getIterator()
    {
        return new \ArrayIterator($this->items);
    }

    public function offsetExists($offset)
    {
        return array_key_exists($offset, $this->items);
    }

    public function offsetGet($offset)
    {
        if ($this->offsetExists($offset)) {
            return $this->items[$offset];
        }
    }

    public function offsetSet($offset, $value)
    {
        if (null !== $offset) {
            $this->items[$offset] = $value;
        } else {
            $this->items[] = $value;
        }
    }

    public function offsetUnset($offset)
    {
        unset($this->items[$offset]);
    }

    public function getValids()
    {
        return (array) array_diff_key((array) $this->items, (array) $this->invalids);
    }

    public function getInvalids()
    {
        return (array) $this->invalids;
    }

    public function setInvalids(array $invalids)
    {
        $this->invalids = $invalids;
    }

    public function addRowInvalid(RowInterface $excelRow)
    {
        $this->invalids[] = $excelRow;
        return $this;
    }

}
