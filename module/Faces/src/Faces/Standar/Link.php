<?php
namespace Faces\Standar;

use Faces\Base\Element;

class Link extends Element
{
   private $body;
   private $href;
   private $target;

   public function __construct()
   {
       $this->element = '<a %id %href %target %attr>%body</a>';
       $this->body = 'link';
       $this->href = '#';
       $this->target = '_self';
   }

   public function setNewTab()
   {
       $this->target = '_blank';

       return $this;
   }

   public function setBody($body)
   {
       $this->body = $body;

       return $this;
   }

   public function setHref($href)
   {
       $this->href = $href;

       return $this;
   }

   private function build()
   {
        $this->replacePattern('%id', $this->getAttr('id', $this->id));
        $this->replacePattern('%href', $this->getAttr('href', $this->href));
        $this->replacePattern('%target', $this->getAttr('target', $this->target));
        $this->replacePattern('%body', $this->body);
        $this->replacePattern('%attr', '');
   }

   public function __toString()
   {
       $this->build();

       return $this->element;
   }
}