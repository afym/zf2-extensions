<?php
namespace Faces\Controls;

use Faces\Controls\ControlBase;

final class Label extends ControlBase
{
    public function __invoke(array $data)
    {
        $this->setElement('<label %attr>%content</label>');

        return $this->bind($data);
    }
}