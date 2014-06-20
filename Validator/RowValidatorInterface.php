<?php

/*
 * This file is part of the Manuel Aguirre Project.
 *
 * (c) Manuel Aguirre <programador.manuel@gmail.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */
namespace Manuelj555\Bundle\UploadDataBundle\Validator;

use Manuelj555\Bundle\UploadDataBundle\RowInterface;
/**
 *
 * @author Manuel Aguirre <programador.manuel@gmail.com>
 */
interface RowValidatorInterface
{
    public function validate(RowInterface $row);
}