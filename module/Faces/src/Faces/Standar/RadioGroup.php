<?php
namespace Faces\Standar;

use Faces\Standar\Radio;

class RadioGroup
{
   private $name;

   public function setName($name)
   {
       $this->name = $name;

       return $this;
   }

   public function setOptions(array $options)
   {
       $id = 1;

       foreach ($options as $value => $label) {
           $radio = new Radio();
           $radio->setId($this->name . $id)
                 ->setName($this->name)
                 ->setValue($value)
                 ->setLabel($label);

           $this->element .= $radio . '<br/>';

           $id++;
       }

       return $this;
   }

   public function __toString()
   {
        return $this->element;
   }
}