<?php

/*
 * This file is part of the Optime Project.
 *
 * (c) Manuel Aguirre <programador.manuel@gmail.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Manuelj555\Bundle\UploadDataBundle\Event;

use Manuelj555\Bundle\UploadDataBundle\ReadedData;
use Symfony\Component\EventDispatcher\Event;

/**
 * Description of ValidateEvent
 *
 * @author Manuel Aguirre <programador.manuel@gmail.com>
 */
class ValidateEvent extends Event
{

    /**
     *
     * @var ReadedData
     */
    protected $data;

    function __construct(ReadedData $data)
    {
        $this->data = $data;
    }

    public function getData()
    {
        return $this->data;
    }

}
