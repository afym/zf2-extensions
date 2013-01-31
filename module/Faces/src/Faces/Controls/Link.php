<?php
namespace Faces\Controls;

use Faces\Controls\ControlBase;

final class Link extends ControlBase
{
    public function __invoke(array $data)
    {
        $this->setElement('<a %attr>%content</a>');

        return $this->bind($data);
    }
}