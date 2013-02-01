<?php
namespace Faces\Standar;

use Faces\Standar\Base\Element;

class Select extends Element
{
   private $options;
   private $selected;
   private $optionsArray;

   public function __construct()
   {
       $this->element  = '<select %id %name %attr>%options</select>';
       $this->options  = '';
       $this->selected = '';
       $this->optionsArray = array();
   }

   public function setSelected($value)
   {
       $this->selected = $value;
   }

   public function setOption($value, $name)
   {
       $this->optionsArray[$value] = $name;

       return $this;
   }

   public function setOptions(array $options)
   {
       $this->optionsArray += $options;
   }

   private function getOptions()
   {
       foreach ($this->optionsArray as $value => $name) {
           $option = '<option %selected %value>%name</option>' . "\n";
           $optionsReplace = str_replace('%value', $this->getAttr('value', $value), $option);
           $nameReplace = str_replace('%name', $name, $optionsReplace);

           if ($value == $this->selected) {
               $selectedReplace = str_replace('%selected', 'selected="selected"', $nameReplace);
           } else {
               $selectedReplace = str_replace('%selected', '', $nameReplace);
           }

           $this->options .= $selectedReplace;
       }
   }

   public function build()
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