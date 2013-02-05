<?php
namespace Faces\Standar;

use Faces\Base\Element;

class Number extends Element
{
   private $value;
   private $max;
   private $min;
   private $step;
   private $format;

   const FORMAT_DECIMAL = "'n'";

   public function __construct()
   {
       $this->element = '<input %id %name %value %attr type="number"/>';
       $this->max = 0;
       $this->min = 0;
       $this->step = 1;
       $this->format = '';
   }

   public function setValue($value)
   {
       $this->value = $value;

       return $this;
   }

   public function setMax($max)
   {
       $this->max = $max;

       return $this;
   }

   public function setMin($min)
   {
       $this->min = $min;

       return $this;
   }

   public function setStep($step)
   {
       $this->step = $step;
       
       return $this;
   }

   public function setFormat($format)
   {
       $this->format = $format;

       return $this;
   }

   private function getJavaScript()
   {
       $script  = '<script type="text/javascript">';
       $script .= '$(function(){';
       $script .= '$("input#' . $this->id . '").spinner(';
       $script .= '{';

       if ($this->max != 0) {
           $script .= 'max: ' . $this->max . ',';
       }

       if ($this->min != 0) {
           $script .= 'min: ' . $this->min . ',';
       }

       if ($this->format != '') {
           $script .= 'numberFormat: ' . $this->format . ',';
       }

       $script .= 'step: ' . $this->step;
       $script .= '}';
       $script .= ');';
       $script .= '});';
       $script .= '</script>';

       return $script;
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

       return $this->element . $this->getJavaScript();
   }
}