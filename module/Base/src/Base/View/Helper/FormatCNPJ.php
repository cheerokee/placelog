<?php
namespace Base\View\Helper;

use Zend\View\Helper\AbstractHelper;

class FormatCNPJ extends AbstractHelper
{
    public function __invoke($cnpj)
    {
        $cnpj = preg_replace('/[^0-9]/', '', trim($cnpj));
        if(strlen($cnpj) != 14) {
            // quantidade de numeros inválidos para cnpj
            return null;
        }
         
        $cnpj_formatado = substr($cnpj, 0, 2) . '.';
        $cnpj_formatado .= substr($cnpj, 2, 3) . '.';
        $cnpj_formatado .= substr($cnpj, 5, 3) . '/';
        $cnpj_formatado .= substr($cnpj, 8, 4) . '-';
        $cnpj_formatado .= substr($cnpj, 12, 2);
        return $cnpj_formatado;
    }
}