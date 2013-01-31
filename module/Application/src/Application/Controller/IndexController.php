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

class IndexController extends AbstractActionController
{
    public function indexAction()
    {
        $userLabel = array('id' => 'userLabel', 'content' => 'User : ');
        $passwordLabel = array('id' => 'passwordLabel', 'content' => 'Password : ');
        $userText = array('id' => 'usuario', 'name' => 'usuario');
        $password = array('id' => 'usuario', 'name' => 'password');
        $forgot = array('id' => 'forgot', 'name' => 'forgot', 'href' => '#', 'content' => 'Forgot your password?');

        return array(
            'userText'      => $userText,
            'password'      => $password,
            'userLabel'     => $userLabel,
            'passwordLabel' => $passwordLabel,
            'forgot'        => $forgot,
        );
    }
}
