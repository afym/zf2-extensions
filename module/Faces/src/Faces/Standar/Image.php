<?php
namespace Faces\Standar;

use Faces\Base\Element;

class Image extends Element
{
   private $src;
   private $alt;
   private $width;
   private $height;

   public function __construct()
   {
       $this->element = '<img %src %alt %width %height %attr />';
       $this->src    = '';
       $this->height = '';
       $this->width  = '';
       $this->alt    = '';
   }

   public function setSrc($src)
   {
       $this->src = $src;

       return $this;
   }

   public function setAlt($alt)
   {
       $this->alt = $alt;

       return $this;
   }

   public function setWidth($width)
   {
       $this->width = $width;

       return $this;
   }

   public function setHeight($height)
   {
       $this->height = $height;

       return $this;
   }

   private function build()
   {
        $this->replacePattern('%id', $this->getAttr('id', $this->id));
        $this->replacePattern('%name', $this->getAttr('name', $this->name));
        $this->replacePattern('%src', $this->getAttr('src', $this->src));
        $this->replacePattern('%alt', $this->getAttr('alt', $this->alt));
        $this->replacePattern('%height', $this->getAttr('height', $this->height));
        $this->replacePattern('%width', $this->getAttr('width', $this->width));
        $this->replacePattern('%attr', '');
   }

   public function __toString()
   {
       $this->build();

       return $this->element;
   }
}