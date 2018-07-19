<?php
namespace Base\Controller\Plugin;

use Zend\Mvc\Controller\Plugin\AbstractPlugin;
use Zend\I18n\Translator\Translator;

/**
 * Translate
 *
 */
class Translate extends AbstractPlugin
{

    /**
     *
     * @var Translator
     */
    private $translator;

    public function __construct(Translator $translator)
    {
        $this->translator = $translator;
    }

    /**
     * Translate message
     * @param string $message
     * @param string $textDomain
     * @param string $locale
     * @return string
     */
    public function __invoke($message, $textDomain = 'default', $locale = null)
    {
        return $this->translator->translate($message, $textDomain, $locale);
    }

    /**
     *
     * @return Translator
     */
    function getTranslator()
    {
        return $this->translator;
    }

}