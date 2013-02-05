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
use Faces\Standar\Multiple;
use Faces\Standar\Button;
use Faces\Standar\TextArea;
use Faces\Standar\Label;
use Faces\Layout\Form;
use Faces\Standar\Image;
use Faces\Standar\Date;
use Faces\Standar\Number;

class IndexController extends AbstractActionController
{
    public function indexAction()
    {

        $name = new Text();
        $name->setName('name')
             ->setId('name');
        $nameLabel = new Label();
        $nameLabel->setId("nameLbl")->setName('nameLbl');
        $nameLabel->setFor('name')->setBody('Name : ');

        $surname = new Text();
        $surname->setName('surname')
                ->setId('surname');

        $phone = new Text();
        $phone->setName('phone')
               ->setId('phone');


        $sports = new CheckBoxGroup();
        $sports->setName('sports');

        $sportsFields = array(1 => ' Foot ball', 2 => 'Bascket Ball', 3 => 'Tennis');
        $sports->setOptions($sportsFields)->mergeOptions(array(1));

        $google = new Link();
        $google->setId('google')
               ->setName('google')
               ->setBody('Visit Google')
               ->setHref('http://www.google.com');

        $rol = new Select();
        $rol->setId('rol')
            ->setName('rol')
            ->setOptions(array(1 => 'Admin', 2 => 'Client', 3 => 'Anonymus'))
            ->setValue(3);
        
        $jobs = new Multiple();
        $jobs->setId('jobs')
              ->setName('jobs')
              ->setOptions(array(1 => 'doctor', 2 => 'pilot', 3 => 'soldier'))
              ->setValues(array(1, 3, 2));
        
        
        $button = new Button();
        $button->setId('button')
               ->setName('button')
               ->setBody('Enviar');
        $button->setSubmitType();

        $comment = new TextArea();
        $comment->setId('comment')
                ->setName('comment');
        
        $comment->setRows(3)->setCols(20)->setBody('Hola a todos este es mi ...');
        
        
        $form = new Form();
        $form->setId('form')->setName('form');
        
        $image = new Image();
        $image->setSrc('http://www.w3schools.com/images/compatible_chrome.gif')->setId('image');
        
        $date = new Date();
        $date->setName('born')->setId('born');
        
        $init = new Date();
        $init->setName('init')->setId('init');
        $init->setYearRange(2000, 2012);
        
        $number = new Number();
        $number->setId('age');
        $number->setFormat(Number::FORMAT_DECIMAL)
               ->setStep(0.2)
               ->setMax(1)
               ->setMin(-5);

        return array(
            'name'    => $name,
            'nameLbl' => $nameLabel,
            'surname' => $surname,
            'phone'   => $phone,
            'sports'  => $sports,
            'google'  => $google,
            'rol'     => $rol,
            'jobs'    => $jobs,
            'button'  => $button,
            'comment' => $comment,
            'form'    => $form,
            'image'   => $image,
            'born'    => $date,
            'init'    => $init,
            'age'     => $number,
        );
    }
}