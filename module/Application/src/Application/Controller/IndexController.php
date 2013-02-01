<?php
/**
 * Zend Framework (http://framework.zend.com/)
 *
 * @link      http://github.com/zendframework/ZendSkeletonApplication for the canonical source repository
 * @copyright Copyright (c) 2005-2012 Zend Technologies USA Inc. (http://www.zend.com)
 * @license   http://framework.zend.com/license/new-bsd New BSD License
 */

namespace Application\Controller;

use Zend\Mvc\Controller\AbstractActionController;
use Faces\Standar\Text;

class IndexController extends AbstractActionController
{
    public function indexAction()
    {
        $name = new Text();
        $name->setId('name')
             ->setName('name')
             ->setValue('Angel Francisco');

        $surname = new Text();
        $surname->setId('surname')
             ->setName('surname')
             ->setValue('Ybarhuen Manrique')
             ->setAttr('style', "color:red;")->setAttr('onclick', "alert('Au');");

        return array(
            'name'    => $name,
            'surname' => $surname,
        );
    }
}