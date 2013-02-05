<?php
namespace Faces\Standar;

use Faces\Base\Element;

class Button extends Element
{
   private $body;
   private $type;

   public function __construct()
   {
       $this->element = '<button %id %name %type>%body</button>';
       $this->type    = 'button';
       $this->body    = 'Button';
   }

   public function setBody($body)
   {
       $this->body = $body;

       return $this;
   }

   public function setButtonType()
   {
       $this->type = 'button';

       return $this;
   }

   public function setSubmitType()
   {
       $this->type = 'submit';

       return $this;
   }

   public function setResetType()
   {
       $this->type = 'reset';

       return $this;      
   }

   private function build()
   {
        $this->replacePattern('%id', $this->getAttr('id', $this->id));
        $this->replacePattern('%name', $this->getAttr('name', $this->name));
        $this->replacePattern('%body', $this->body);
        $this->replacePattern('%type', $this->getAttr('type', $this->type));
        $this->replacePattern('%attr', '');
   }

   public function __toString()
   {
       $this->build();

       return $this->element;
   }
}