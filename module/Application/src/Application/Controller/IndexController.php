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
use Faces\Standar\Password;
use Faces\Standar\Select;
use Faces\Standar\Link;
use Faces\Standar\Radio;
use Faces\Standar\RadioGroup;
use Faces\Standar\CheckBox;
use Faces\Standar\CheckBoxGroup;

class IndexController extends AbstractActionController
{
    public function indexAction()
    {

        $name = new Text();
        $name->setName('name')
             ->setId('name');

        $surname = new Text();
        $surname->setName('surname')
                ->setId('surname');

        $phone = new Text();
        $phone->setName('phone')
               ->setId('phone');


        $sports = new CheckBoxGroup();
        $sports->setName('sports');

        $sportsFields = array(1 => ' Foot ball', 2 => 'Bascket Ball', 3 => 'Tennis');
        $sports->setOptions($sportsFields);

        $google = new Link();
        $google->setId('google')
               ->setName('google')
               ->setBody('Visit Google')
               ->setHref('http://www.google.com');

        return array(
            'name'    => $name,
            'surname' => $surname,
            'phone'   => $phone,
            'sports'  => $sports,
            'google'  => $google
        );
    }
}