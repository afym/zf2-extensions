<?php
namespace Faces;

use Zend\ModuleManager\Feature\AutoloaderProviderInterface;

class Module implements AutoloaderProviderInterface
{
    public function getConfig()
    {
        return include __DIR__ . '/config/module.config.php';
    }

    public function getServiceConfig()
    {
        return include __DIR__ . '/config/service.config.php';
    }

    public function getViewHelperConfig()
    {
        return array(
            'invokables' => array(
                'text'     => 'Faces\Controls\Text',
                'password' => 'Faces\Controls\Password',
                'label'    => 'Faces\Controls\Label',
                'link'     => 'Faces\Controls\Link',
            ),
        );
    }

    public function getAutoloaderConfig()
    {
        return array(
            'Zend\Loader\StandardAutoloader' => array(
                'namespaces' => array(
                    __NAMESPACE__ => __DIR__ . '/src/' . __NAMESPACE__,
                ),
            ),
        );
    }
}