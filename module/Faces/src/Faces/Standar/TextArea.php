<?php
namespace Faces\Standar;

use Faces\Base\Element;

class TextArea extends Element
{
   private $body;
   private $rows;
   private $cols;

   public function __construct()
   {
       $this->element = '<textarea %id %name %rows %cols>%body</textarea>';
   }

   public function setRows($rows)
   {
       $this->rows = $rows;

       return $this;
   }

   public function setCols($cols)
   {
       $this->cols = $cols;

       return $this;
   }

   public function setBody($body)
   {
       $this->body = $body;

       return $this;
   }

   private function build()
   {
        $this->replacePattern('%id', $this->getAttr('id', $this->id));
        $this->replacePattern('%name', $this->getAttr('name', $this->name));
        $this->replacePattern('%body', $this->getAttr('body', $this->body));
        $this->replacePattern('%rows', $this->getAttr('rows', $this->rows));
        $this->replacePattern('%cols', $this->getAttr('cols', $this->cols));
        $this->replacePattern('%attr', '');
   }

   public function __toString()
   {
       $this->build();

       return $this->element;
   }
}