<?php
namespace Faces\Standar;

use Faces\Base\Element;

class Multiple extends Element
{
   private $options;
   private $values;
   private $optionsArray;

   public function __construct()
   {
       $this->element  = '<select %id %name %attr multiple="multiple">%options</select>';
       $this->options  = '';
       $this->values   = array();
       $this->optionsArray = array();
   }

   public function setValues(array $values)
   {
       $this->values = $values;

       return $this;
   }

   public function setOption($value, $name)
   {
       $this->optionsArray[$value] = $name;

       return $this;
   }

   public function setOptions(array $options)
   {
       $this->optionsArray += $options;

       return $this;
   }

   private function getOptions()
   {
       foreach ($this->optionsArray as $value => $name) {
           $option = '<option %selected %value>%name</option>' . "\n";
           $optionsReplace = str_replace('%value', $this->getAttr('value', $value), $option);
           $nameReplace = str_replace('%name', $name, $optionsReplace);

           if (in_array($value, $this->values)) {
               $selectedReplace = str_replace('%selected', 'selected="selected"', $nameReplace);
           }else {
               $selectedReplace = str_replace('%selected', '', $nameReplace);
           }

           $this->options .= $selectedReplace;
       }
   }

   private function build()
   {
        $this->getOptions();
        $this->replacePattern('%id', $this->getAttr('id', $this->id));
        $this->replacePattern('%name', $this->getAttr('name', $this->name));
        $this->replacePattern('%options', $this->options);
        $this->replacePattern('%attr', '');
   }

   public function __toString()
   {
       $this->build();

       return $this->element;
   }
}