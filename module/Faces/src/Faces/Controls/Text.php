<?php
namespace Faces\Controls;

use Faces\Controls\ControlBase;

final class Text extends ControlBase
{
    public function __invoke(array $data)
    {
        $this->setElement('<input %attr type="text"/>');

        return $this->bind($data);
    }
}