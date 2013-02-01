<?php
namespace Faces\Standar;

use Faces\Standar\CheckBox;

class CheckBoxGroup
{
   private $name;
   private $options;
   private $merge;

   public function __construct()
   {
       $this->merge = array();
   }

   public function setName($name)
   {
       $this->name = $name;

       return $this;
   }

   public function mergeOptions(array $merge)
   {
       $this->merge = $merge;

       return $this;
   }

   public function setOptions(array $options)
   {

       $this->options = $options;

       return $this;
   }

   private function build()
   {
       $id = 1;

       foreach ($this->options as $value => $label) {
           $radio = new CheckBox();
           $radio->setId($this->name . $id)
                 ->setName($this->name . '[]')
                 ->setValue($value)
                 ->setLabel($label);

           if (in_array($value, $this->merge)) {
               $radio->setChecked();
           }

           $this->element .= $radio . '<br/>';

           $id++;
       }
   }

   public function __toString()
   {
       $this->build();
       return $this->element;
   }
}