<?php
namespace Faces\Standar;

use Faces\Base\Element;

class Date extends Element
{
   private $value;
   private $format;
   private $changeYear;
   private $changeMonth;
   private $minDate;
   private $maxDate;
   private $yearRange;

   const FORMAT_DEFAULT  = "'mm/dd/yy'";
   const FORMAT_ISO_8601 = "'yy-mm-dd'";
   const FORMAT_SHORT    = "'d M, y'";
   const FORMAT_MEDIUM   = "'d MM, y'";
   const FORMAT_FULL     = "'DD, d MM, yy'";

   public function __construct()
   {
       $this->element = '<input %id %name %value %attr type="date"/>';
       $this->format = self::FORMAT_DEFAULT;
       $this->changeYear = 'false';
       $this->changeMonth = 'false';
       $this->maxDate = 0;
       $this->minDate = 0;
       $this->yearRange = '';
   }

   public function setValue($value)
   {
       $this->value = $value;

       return $this;
   }

   public function changeYear()
   {
       $this->changeYear = 'true';

       return $this;
   }

   public function changeMonth()
   {
       $this->changeMonth = 'true';

       return $this;
   }

   public function setFormat($format)
   {
       $this->format = $format;

       return $this;
   }
   
   public function setMaxDate($max)
   {
       $this->maxDate = $max;

       return $this;
   }

   public function setMinDate($min)
   {
       $this->minDate = $min;

       return $this;
   }
   
   public function setYearRange($min, $max)
   {
       $this->yearRange = "'{$min}:{$max}'";
       $this->changeYear = 'true';
       $this->changeMonth = 'true';
       return $this;
   }

   private function getJavaScript()
   {
       $script  = '<script type="text/javascript">';
       $script .= '$(function(){';
       $script .= '$("input#' . $this->id . '").datepicker(';
       $script .= '{';
       $script .= 'dateFormat: "' . $this->format . '",';
       $script .= 'changeYear: ' . $this->changeYear . ',';

       if ($this->maxDate != 0 ) {
           $script .= 'maxDate: ' . $this->maxDate. ',';   
       }

       if ($this->minDate != 0 ) {
           $script .= 'minDate: ' . $this->minDate. ',';   
       }
       
       if ($this->yearRange != '') {
           $script .= 'yearRange: ' . $this->yearRange . ',';   
       }

       $script .= 'changeMonth: ' . $this->changeMonth;
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