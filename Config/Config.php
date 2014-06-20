<?php

/*
 * This file is part of the Manuel Aguirre Project.
 *
 * (c) Manuel Aguirre <programador.manuel@gmail.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Manuelj555\Bundle\UploadDataBundle\Config;

/**
 * Description of Config
 *
 * @author Manuel Aguirre <programador.manuel@gmail.com>
 */
class Config extends AbstractConfig
{

    protected $columnNames = array();
    protected $requiredColumns = array();
    protected $rowValidators = array();
    protected $validationGroups = array();
    protected $headersPosition = array();
    protected $rowClass;
    protected $name;

    public function getName()
    {
        return $this->name;
    }

    public function setName($name)
    {
        $this->name = $name;
        
        return $this;
    }

    public function getColumnNames()
    {
        return $this->columnNames;
    }

    public function getHeadersPosition()
    {
        return $this->headersPosition;
    }

    public function getRowClass()
    {
        return $this->rowClass;
    }

    public function setColumnNames($columnNames)
    {
        $this->columnNames = $columnNames;

        return $this;
    }

    public function setHeadersPosition($headersPosition)
    {
        $this->headersPosition = $headersPosition;

        return $this;
    }

    public function setRowClass($rowClass)
    {
        $this->rowClass = $rowClass;

        return $this;
    }

    public static function create()
    {
        return new static();
    }

    public function getRequiredColumns()
    {
        return $this->requiredColumns;
    }

    public function getRowValidators()
    {
        return $this->rowValidators;
    }

    public function getValidationGroups()
    {
        return $this->validationGroups;
    }

    public function setRequiredColumns($requiredColumns)
    {
        $this->requiredColumns = $requiredColumns;
        
        return $this;
    }

    public function setRowValidators($rowValidators)
    {
        $this->rowValidators = $rowValidators;
        
        return $this;
    }

    public function setValidationGroups($validationGroups)
    {
        $this->validationGroups = $validationGroups;
        
        return $this;
    }

}
