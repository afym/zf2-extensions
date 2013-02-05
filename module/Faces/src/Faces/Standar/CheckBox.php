<?php
namespace Faces\Standar;

use Faces\Base\Element;

class CheckBox extends Element
{
   private $value;
   private $checked;
   private $label;

   public function __construct()
   {
       $this->element = '<input %id %name %value %attr %checked type="checkbox"/> %label';
       $this->checked = '';
       $this->label   = '';
   }

   public function setValue($value)
   {
       $this->value = $value;

       return $this;
   }

   public function setLabel($label)
   {
       $this->label = $label;

       return $this;
   }

   public function setChecked()
   {
       $this->checked = 'checked="checked"';
   }

   private function build()
   {
        $this->replacePattern('%id', $this->getAttr('id', $this->id));
        $this->replacePattern('%name', $this->getAttr('name', $this->name));
        $this->replacePattern('%value', $this->getAttr('value', $this->value));
        $this->replacePattern('%checked', $this->checked);
        $this->replacePattern('%label', $this->label);
        $this->replacePattern('%attr', '');
   }

   public function __toString()
   {
       $this->build();

       return $this->element;
   }
}