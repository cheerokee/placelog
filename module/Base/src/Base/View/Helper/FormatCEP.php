<?php
namespace Base\View\Helper;

use Zend\View\Helper\AbstractHelper;

class FormatCEP extends AbstractHelper
{
    public function __invoke($cep)
    {
        $prefix = substr($cep, 0,-3);
        $suffix = substr($cep, -3);
        return "$prefix-$suffix";
    }
}