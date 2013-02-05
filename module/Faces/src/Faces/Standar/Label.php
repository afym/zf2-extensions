<?php
namespace Faces\Standar;

use Faces\Base\Element;

class Label extends Element
{
   private $body;
   private $for;

   public function __construct()
   {
       $this->element = '<label %id %for %attr>%body</label>';
       $this->body = 'Label';
       $this->for  = '';
   }

   public function setBody($body)
   {
       $this->body = $body;

       return $this;
   }

   public function setFor($for)
   {
       $this->for = $for;

       return $this;
   }

   private function build()
   {
        $this->replacePattern('%id', $this->getAttr('id', $this->id));
        $this->replacePattern('%body', $this->body);
        $this->replacePattern('%for', $this->getAttr('for', $this->for));
        $this->replacePattern('%attr', '');
   }

   public function __toString()
   {
       $this->build();

       return $this->element;
   }
}