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

use Symfony\Component\Validator\ConstraintViolationList;
use Symfony\Component\Validator\ConstraintViolationListInterface;

/**
 * Description of Row
 *
 * @author Manuel Aguirre <programador.manuel@gmail.com>
 */
class Row implements RowInterface
{

    /**
     *
     * @var ConstraintViolationListInterface
     */
    private $errors;

    public function getRowErrors()
    {
        if (!$this->errors) {
            $this->errors = new ConstraintViolationList();
        }

        return $this->errors;
    }

    public function setRowErrors(ConstraintViolationListInterface $errors)
    {
        
    }

}
