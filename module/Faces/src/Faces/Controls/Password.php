<?php
namespace Faces\Controls;

use Faces\Controls\ControlBase;

final class Password extends ControlBase
{
    public function __invoke(array $data)
    {
        $this->setElement('<input %attr type="password"/>');

        return $this->bind($data);
    }
}