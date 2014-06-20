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
 * Description of AbstractConfig
 *
 * @author Manuel Aguirre <programador.manuel@gmail.com>
 */
abstract class AbstractConfig implements ConfigInterface
{

    protected $fileColumns = array();
    protected $columnsAssociation = array();

    public function getColumnAlias()
    {
        return array();
    }

    public function getDefaultMatch($column)
    {
        $alias = (array) $this->getColumnAlias();

        foreach ($this->getFileColumns() as $index => $name) {
            //si existe un alias para la columna, devolvemos el indice de la columna
            if (isset($alias[$column]) && (strtoupper($alias[$column]) === strtoupper($name))) {
                return $index;
            }
            if (strtoupper($name) === strtoupper($column)) {
                return $index;
            }
        }

        return null;
    }

    public function getFileColumns()
    {
        return $this->fileColumns;
    }

    public function getColumnsAssociation()
    {
        return $this->columnsAssociation;
    }

    public function setFileColumns(array $fileColumns)
    {
        $this->fileColumns = $fileColumns;

        return $this;
    }

    public function setColumnsAssociation($columnsAssociation)
    {
        $this->columnsAssociation = $columnsAssociation;

        return $this;
    }

    public function getRequiredColumns()
    {
        return array();
    }

    public function getRowValidators()
    {
        return array();
    }

    public function getValidationGroups()
    {
        return array();
    }

}
