<?php
/**
 * Created by PhpStorm.
 * User: Usuario
 * Date: 12/05/2018
 * Time: 14:48
 */

namespace Base\Controller;


class BaseFunctions
{
    public function __construct()
    {
        
    }

    public function formatarTexto($string,$tirarAcento = 0){

        $string = (trim($string));

        if($tirarAcento){
            $string = preg_replace(array("/(á|à|ã|â|ä)/","/(Á|À|Ã|Â|Ä)/","/(é|è|ê|ë)/","/(É|È|Ê|Ë)/","/(í|ì|î|ï)/","/(Í|Ì|Î|Ï)/","/(ó|ò|õ|ô|ö)/","/(Ó|Ò|Õ|Ô|Ö)/","/(ú|ù|û|ü)/","/(Ú|Ù|Û|Ü)/","/(ñ)/","/(Ñ)/","/(ç)/","/(Ç)/"),explode(" ","a A e E i I o O u U n N c C"),$string);
        }

        return $string;
    }

    public function moedaToFloat($value){
        return str_replace(',','.',str_replace('.','',$value))*1;
    }

    public function floatToMoeda($value){
        return  number_format($value, 2, ',', '.');
    }

    public function toCamelCase($str, $capitaliseFirstChar = false)
    {
        if ($capitaliseFirstChar) {
            $str[0] = strtoupper($str[0]);
        }
        return preg_replace('/_([a-z])/e', "strtoupper('\\1')", $str);
    }

    function strToFriendlyUrl($str){
        $str = mb_strtolower($str);
        $i=1;
        $arr_a = array('à','á','â','ã','ä','å','æ','ç','è','é','ê','ë','ì','í','î','ï','ñ','ò','ó','ô','õ','ö','ø','ù','ú','û','ý','ý','ÿ');
        $arr_b = array('a','a','a','a','a','a','æ','c','e','e','e','e','i','i','i','i','n','o','o','o','o','o','o','u','u','u','y','y','y');

        $str = str_replace($arr_a, $arr_b,$str);

        $str = strtr($str, utf8_decode('àáâãäåæçèéêëìíîïñòóôõöøùúûýýÿ'), 'aaaaaaaceeeeiiiinoooooouuuyyy');
        $str = preg_replace("/([^a-z0-9])/",'-',utf8_encode($str));
        while($i>0) $str = str_replace('--','-',$str,$i);
        if (substr($str, -1) == '-') $str = substr($str, 0, -1);
        return $str;
    }

    function camel2dashed($str) {
        return strtolower(preg_replace('/([^A-Z-])([A-Z])/', '$1-$2', $str));
    }
}