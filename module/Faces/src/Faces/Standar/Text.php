<?php
namespace Faces\Standar;

use Faces\Base\Element;

class Text extends Element
{
   private $value;

   public function __construct()
   {
       $this->element = '<input %id %name %value %attr type="text"/>';
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
        $this->replacePattern('%value', $this->getAttr('value', $this->value));
        $this->replacePattern('%attr', '');
   }

   public function __toString()
   {
       $this->build();

       return $this->element;
   }
}