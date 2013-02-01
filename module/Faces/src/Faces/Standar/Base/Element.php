<?php
namespace Faces\Standar\Base;

abstract class Element
{
   protected $id;
   protected $name;
   protected $element;

   abstract public function build();

   public function setId($id)
   {
       $this->id = $id;

       return $this;
   }

   public function setName($name)
   {
       $this->name = $name;

       return $this;
   }

   public function setAttr($key, $value)
   {
       $attr = $this->getAttr($key, $value) . ' %attr';
       $this->replacePattern('%attr', $attr);

       return $this;
   }

   public function getAttr($key, $value)
   {
       return $key . '="' . $value . '"';
   }

   public function replacePattern($pattern, $replace = '')
   {
       $this->element = str_replace($pattern, $replace, $this->element);
   }
}