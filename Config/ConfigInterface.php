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
 *
 * @author Manuel Aguirre <programador.manuel@gmail.com>
 */
interface ConfigInterface
{

    public function getName();

    /**
     * @return array
     */
    public function getColumnNames();

    public function getColumnAlias();

    public function getRequiredColumns();

    public function getRowClass();

    public function setFileColumns(array $columns);

    public function getFileColumns();

    public function getHeadersPosition();

    public function getColumnsAssociation();

    public function setColumnsAssociation($columnsAssociation);

    public function getDefaultMatch($column);

    public function getRowValidators();

    public function getValidationGroups();
}
