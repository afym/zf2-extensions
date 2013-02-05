<?php
namespace Faces\Helper;

use Zend\View\Helper\AbstractHelper; 

class facesCommonLoad extends AbstractHelper
{
    public function __invoke()
    {
        $head = $this->view->headLink()
                     ->appendStylesheet($this->view->basePath('js/jquery/ui/css/jquery.ui.all.css'))
              . $this->view->headScript()->appendFile($this->view->basePath('js/jquery/jquery-1.9.0.js'))
                     ->appendFile($this->view->basePath('js/jquery/ui/jquery.ui.core.js'))
                     ->appendFile($this->view->basePath('js/jquery/ui/jquery.ui.widget.js'));

        return $head;
    }
}