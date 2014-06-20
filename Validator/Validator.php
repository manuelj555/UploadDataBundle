<?php

namespace Manuelj555\Bundle\UploadDataBundle\Validator;

use Manuelj555\Bundle\UploadDataBundle\Config\ConfigInterface;
use Manuelj555\Bundle\UploadDataBundle\Event\ValidateEvent;
use Manuelj555\Bundle\UploadDataBundle\Events;
use Manuelj555\Bundle\UploadDataBundle\ReadedData;
use Symfony\Component\DependencyInjection\ContainerInterface;
use Symfony\Component\EventDispatcher\EventDispatcherInterface;
use Symfony\Component\Validator\ConstraintViolationListInterface;
use Symfony\Component\Validator\ValidatorInterface;

class Validator
{

    /**
     *
     * @var ValidatorInterface
     */
    protected $validator;

    /**
     *
     * @var EventDispatcherInterface
     */
    protected $dispatcher;

    /**
     *
     * @var ContainerInterface
     */
    protected $container;

    function __construct(ValidatorInterface $validator
    , EventDispatcherInterface $dispatcher
    , ContainerInterface $container)
    {
        $this->validator = $validator;
        $this->dispatcher = $dispatcher;
        $this->container = $container;
    }

    public function validate(ConfigInterface $config, ReadedData $data)
    {
        $data->setInvalids(array());

        $event = new ValidateEvent($data);

        $name = sprintf(Events::VALIDATE, $config->getName());
        $this->dispatcher->dispatch($name, $event);

        foreach ($data as $row) {
            $list = $this->validator->validate($row, $config->getValidationGroups());
            if ($row->getRowErrors() instanceof ConstraintViolationListInterface) {
                $row->getRowErrors()->addAll($list);
            } else {
                $row->setRowErrors($list);
            }
            //abrimos la posibilidad de validar cualquier cosa en una fila
            foreach ($config->getRowValidators() as $validator) {
                if (is_string($validator)) {
                    $validator = $this->container->get($validator);
                }
                $validator->validate($row);
            }

            if (count($row->getRowErrors())) {
                $data->addRowInvalid($row);
            }
        }

        return count($data->getInvalids());
    }

}
