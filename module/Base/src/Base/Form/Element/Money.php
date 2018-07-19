<?php
namespace Base\Form\Element;

use Zend\Form\Element;
use Zend\InputFilter\InputProviderInterface;
use Zend\Validator\Regex as RegexValidator;
use Zend\Validator\ValidatorInterface;

/**
 * Verifique as config. php.ini
 * intl.default_locale = pt_BR
 */
class Money extends Element implements InputProviderInterface
{
    /**
     * @var ValidatorInterface
     */
    protected $validator;
    
    /**
     * @var string
     */
    protected $attributes = [
        'type' => 'text'
    ];
    
    public function __construct($name = null, $options = [])
    {
        parent::__construct($name, $options);
        
        //$this->attributes['data-prefix'] = 'R$';
        //$this->attributes['data-thousands'] = '.';
        //$this->attributes['data-decimal'] = ',';
        $this->attributes['data-affixes-stay'] = 'true';
        
        //$this->attributes['data-prefix'] = '$';
        $this->attributes['data-thousands'] = ',';
        $this->attributes['data-decimal'] = '.';
        $this->attributes['data-precision'] = '2';
        
        $session = new \Zend\Session\Container('Base');
        /**
         * @var \Config\Entity\Setting $setting
         */
        $setting = $session->setting;
        $formatter = new \NumberFormatter($setting->getLanguage(),
            \NumberFormatter::DECIMAL);
        $formatter->setAttribute(\NumberFormatter::FRACTION_DIGITS , $this->attributes['data-precision']);
        $decimal = $formatter->getSymbol(\NumberFormatter::DECIMAL_SEPARATOR_SYMBOL);
        $thousands = $formatter->getSymbol(\NumberFormatter::GROUPING_SEPARATOR_SYMBOL);
        $this->attributes['data-thousands'] = $thousands;
        $this->attributes['data-decimal'] = $decimal;
    }
    
    /**
     * Obter um validador se nenhum tiver sido definida.
     *
     * @return ValidatorInterface
     */
    public function getValidator()
    {
        if (null === $this->validator) {
            $validator = new RegexValidator('/^[\d\.,]*$/');
            $validator->setMessage(gettext('Por favor digite um valor do tipo moeda válido'),
                RegexValidator::NOT_MATCH);
    
            $this->validator = $validator;
        }
    
        return $this->validator;
    }
    
    public function setValue($value)
    {
        $session = new \Zend\Session\Container('Base');
        /**
         * @var \Config\Entity\Setting $setting
         */
        $setting = $session->setting;
        
        if(is_float($value)){
            $formatter = new \NumberFormatter($setting->getLanguage(),
                \NumberFormatter::DECIMAL);
            $formatter->setAttribute(\NumberFormatter::FRACTION_DIGITS , $this->attributes['data-precision']);
            $value = $formatter->format($value);
            
            $decimal = $formatter->getSymbol(\NumberFormatter::DECIMAL_SEPARATOR_SYMBOL);
            $thousands = $formatter->getSymbol(\NumberFormatter::GROUPING_SEPARATOR_SYMBOL);
            
            $this->attributes['data-thousands'] = $thousands;
            $this->attributes['data-decimal'] = $decimal;
        }
                
        $this->value = $value;
        return $this;
    }
    
    /**
     * Sets the validator to use for this element
     *
     * @param  ValidatorInterface $validator
     * @return Application\Form\Element\Phone
     */
    public function setValidator(ValidatorInterface $validator)
    {
        $this->validator = $validator;
        return $this;
    }
    
	/* (non-PHPdoc)
     * @see \Zend\InputFilter\InputProviderInterface::getInputSpecification()
     */
    public function getInputSpecification()
    {
        return array(
            'name' => $this->getName(),
            'required' => false,
            'allow_empty' => true,
            'allow_zero' => true,
            'filters' => array(
                array(
                    'name' => 'NumberFormat',
                    //'locale' => 'pt_BR',
                    //'style' => \NumberFormatter::DECIMAL
                ),
            ),
            'validators' => array(
                $this->getValidator(),
            ),
        );
    }
}