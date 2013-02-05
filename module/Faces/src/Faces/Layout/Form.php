<?php
namespace Faces\Layout;

use Faces\Base\Element;

class Form extends Element
{
   private $method;
   private $action;
   private $enctype;

   public function __construct()
   {
       $this->element = '<form %id %name %method %action %enctype %attr>';
       $this->method  = '';
       $this->action  = '';
       $this->enctype = 'application/x-www-form-urlencoded';
   }

   public function setEnctypeApplication()
   {
       $this->enctype = 'application/x-www-form-urlencoded';

       return $this;
   }

   public function setEnctypeText()
   {
       $this->enctype = 'text/plain';

       return $this;  
   }

   public function setEnctypeMultipart()
   {
       $this->enctype = 'multipart/form-data';

       return $this;
   }
   
   public function setValue($value)
   {
       $this->value = $value;

       return $this;
   }

   private function build()
   {
        $this->replacePattern('%id', $this->getAttr('id', $this->id));
        $this->replacePattern('%name', $this->getAttr('name', $this->name));
        $this->replacePattern('%method', $this->getAttr('method', $this->method));
        $this->replacePattern('%action', $this->getAttr('action', $this->action));
        $this->replacePattern('%enctype', $this->getAttr('enctype', $this->enctype));
        $this->replacePattern('%attr', '');
   }

   public function getOpenTag()
   {
       $this->build();

       return $this->element;
   }
   
   public function getCloseTag()
   {
       return '</form>';
   }
}