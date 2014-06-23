<?php

/*
 * (c) Manuel Aguirre <programador.manuel@gmail.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Manuelj555\Bundle\UploadDataBundle\Event;

use Manuelj555\Bundle\UploadDataBundle\LoadedData;
use Symfony\Component\EventDispatcher\Event;

/**
 *
 * @author Manuel Aguirre <programador.manuel@gmail.com>
 */
class PreReadDataEvent extends Event
{

    /**
     *
     * @var LoadedData
     */
    protected $data;

    function __construct(LoadedData $data = null)
    {
        $this->data = $data;
    }

    public function getData()
    {
        return $this->data;
    }

}
