<?php
namespace Faces\Base;

class JavaScript
{
    private $scriptOpenTag;
    private $scriptCloseTag;
    private $src;
    
    public function __construct()
    {
        $this->scriptOpenTag = '<script type';
    }

    public function setSrc($src)
    {
        $this->src = $src;
    }

    
}