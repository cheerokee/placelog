<?php
namespace Base\View\Helper;

use Zend\View\Helper\AbstractHelper;

class FormatCpfCnpj extends AbstractHelper
{
    public function __invoke($numero)
    {
        // limpar tudo que não for digito
        $numero = preg_replace('/[^0-9]/', '', trim($numero));
        if(strlen($numero) == 11) {
            // formata cpf
            $cpf_formatado = substr($numero, 0, 3) . '.';
            $cpf_formatado .= substr($numero, 3, 3) . '.';
            $cpf_formatado .= substr($numero, 6, 3) . '-';
            $cpf_formatado .= substr($numero, 9, 3);
            return $cpf_formatado;
             
        } else if(strlen($numero) == 14) {
            // formata cnpj
            $cnpj_formatado = substr($numero, 0, 2) . '.';
            $cnpj_formatado .= substr($numero, 2, 3) . '.';
            $cnpj_formatado .= substr($numero, 5, 3) . '/';
            $cnpj_formatado .= substr($numero, 8, 4) . '-';
            $cnpj_formatado .= substr($numero, 12, 2);
            return $cnpj_formatado;
        } else {
            // quantidade de numeros inválidos para cpf ou cnpj
            return null;
        }
    }
}