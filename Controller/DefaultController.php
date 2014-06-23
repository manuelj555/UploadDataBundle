<?php

namespace Manuelj555\Bundle\UploadDataBundle\Controller;

use Manuelj555\Bundle\UploadDataBundle\Config\Config;
use Manuelj555\Bundle\UploadDataBundle\DataProcessor;
use Manuelj555\Bundle\UploadDataBundle\Form\Type\ColumnsType;
use Manuelj555\Bundle\UploadDataBundle\Tests\Model;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

class DefaultController extends Controller
{

    public function indexAction(Request $request)
    {
        /* @var $p DataProcessor */
        $r = $this->get('upload_data.reader.csv');
        $p = $this->get('upload_data.processor');
        $file = __DIR__ . '/hola.csv';

        $config = Config::create()
                ->setColumnNames(array('firstName', 'lastName'))
                ->setName('prueba')
                ->setRowClass(new Model())
                ->setHeadersPosition(array(0, 0))
                ->setColumnsAssociation(array(
            'firstName' => 0, 'lastName' => 1
        ));
        
        $data = $r->read($file, $config);

        $form = $this->createForm(new ColumnsType(), $config);

        $form->add('Enviar', 'submit');

        $form->handleRequest($request);

        if ($form->isValid()) {

            $data = $p->process($data, $config);

            var_dump($data);
        }

        return $this->render('UploadDataBundle:Default:index.html.twig', array(
                    'form' => $form->createView(),
        ));
    }

}
