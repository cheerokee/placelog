<?php
namespace Base\Form\Element;

use Zend\Form\Element;
use Zend\InputFilter\InputProviderInterface;
use Zend\Validator\Regex as RegexValidator;
use Zend\Validator\ValidatorInterface;

class Peso extends Element implements InputProviderInterface
{
    /**
     * @var ValidatorInterface
     */
    protected $validator;

    
    /**
     * Obter um validador se nenhum tiver sido definida.
     *
     * @return ValidatorInterface
     */
    public function getValidator()
    {
        if (null === $this->validator) {
            $validator = new RegexValidator('/^[\d\.,]*$/');
            $validator->setMessage('Por favor digite um valor do tipo moeda válido',
                RegexValidator::NOT_MATCH);
    
            $this->validator = $validator;
        }
    
        return $this->validator;
    }
    
    public function setValue($value)
    {
        if(is_float($value)){
            $formatter = new \NumberFormatter('pt_BR', \NumberFormatter::DECIMAL);
            $formatter->setAttribute(\NumberFormatter::MIN_FRACTION_DIGITS, 3);
            $value = $formatter->formatCurrency($value, "BRL");
        } else {
        
        }/**/
        
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
        // TODO Auto-generated method stub
        return array(
            'name' => $this->getName(),
            'required' => false,
            'allow_zero' => true,
            'allow_empty' => true,
            'filters' => array(
                array(
                    'name' => 'NumberFormat',
                    'locale' => 'pt_BR',
                    'style' => \NumberFormatter::DECIMAL,
                    'type' => \NumberFormatter::TYPE_DEFAULT,
                ),
            ),
            'validators' => array(
                $this->getValidator(),
            ),
        );
    }

    
}