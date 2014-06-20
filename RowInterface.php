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

use Symfony\Component\Validator\ConstraintViolationListInterface;

/**
 *
 * @author Manuel Aguirre <programador.manuel@gmail.com>
 */
interface RowInterface
{

    public function setRowErrors(ConstraintViolationListInterface $errors);

    public function getRowErrors();
}
