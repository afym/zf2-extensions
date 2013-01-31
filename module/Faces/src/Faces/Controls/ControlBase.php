<?php
namespace Faces\Controls;

use Zend\View\Helper\AbstractHelper;

class ControlBase extends AbstractHelper
{
    private $element;

    public function setElement($element)
    {
        $this->element = $element;
    }

    public function bind(array $data)
    {
        foreach ($data as $key => $value) {
            $this->iterateOption($key, $value);
        }

        $this->clean();

        return $this->element . "\n";
    }

    private function iterateOption($key, $value)
    {
        if ($key == 'content') {
            $this->setContent($value);
        } else {
            $this->setAttributes($key, $value);
        }
    }

    private function setContent($value)
    {
        $attr = $value;
        $this->element = str_replace("%content", $attr, $this->element);
    }

    private function setAttributes($key, $value)
    {
        $attr = $key . '="' . $value . '" %attr';
        $this->element = str_replace("%attr", $attr, $this->element);
    }

    private function clean()
    {
        $this->element = str_replace("%attr", '', $this->element);
        $this->element = str_replace("%content", '', $this->element);
    }
}