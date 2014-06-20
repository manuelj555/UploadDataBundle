<?php

/*
 * This file is part of the Manuel Aguirre Project.
 *
 * (c) Manuel Aguirre <programador.manuel@gmail.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Manuelj555\Bundle\UploadDataBundle\Tests;

use Manuelj555\Bundle\UploadDataBundle\RowInterface;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * Description of Model
 *
 * @author Manuel Aguirre <programador.manuel@gmail.com>
 */
class Model extends \Manuelj555\Bundle\UploadDataBundle\Row
{

    protected $firstName;
    /**
     *
     * @Assert\Email()
     */
    protected $lastName;

    public function getFirstName()
    {
        return $this->firstName;
    }

    public function getLastName()
    {
        return $this->lastName;
    }

    public function setFirstName($firstName)
    {
        $this->firstName = $firstName;
    }

    public function setLastName($lastName)
    {
        $this->lastName = $lastName;
    }

}
