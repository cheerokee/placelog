<?php
namespace Base\Form\View\Helper;

use Zend\Form\View\Helper\FormMultiCheckbox;
use Zend\Form\ElementInterface;
use Zend\Form\Element\MultiCheckbox;

class TwbBundleFormMultiCheckbox extends FormMultiCheckbox
{
    /**
     * @see FormMultiCheckbox::render()
     * @param ElementInterface $oElement
     * @return string
     */
    public function render(ElementInterface $oElement)
    {
        $aElementOptions = $oElement->getOptions();

        // For inline multi-checkbox
        if (isset($aElementOptions['inline']) && $aElementOptions['inline'] == true) {
            $this->setSeparator('');
            $oElement->setLabelAttributes(array('class' => 'checkbox-inline'));

            return sprintf('%s', parent::render($oElement));
        }

        $this->setSeparator('</div><div class="checkbox">');
        $oElement->setLabelAttributes(array('class' => 'checkbox'));

        if (isset($aElementOptions['btn-group']) && $aElementOptions['btn-group'] == true) {
            $this->setSeparator('');
            $oElement->setLabelAttributes(array('class' => 'btn btn-primary'));

            return sprintf('<div class="btn-group" data-toggle="buttons">%s</div>', parent::render($oElement));
        }

        return sprintf('<div class="checkbox">%s</div>', parent::render($oElement));
    }

    /**
     * @see \Zend\Form\View\Helper\FormMultiCheckbox::renderOptions()
     * @param \Zend\Form\Element\MultiCheckbox $oElement
     * @param array $aOptions
     * @param array $aSelectedOptions
     * @param array $aAttributes
     * @return string
     */
    protected function renderOptions(
        MultiCheckbox $oElement,
        array $aOptions,
        array $aSelectedOptions,
        array $aAttributes
        ) {
            $iIterator = 0;
            $aGlobalLabelAttributes = $oElement->getLabelAttributes()? : $this->labelAttributes;
            $sMarkup = '';
            $oLabelHelper = $this->getLabelHelper();
            $aElementOptions = $oElement->getOptions();
            foreach ($aOptions as $key => $aOptionspec) {
                if (is_scalar($aOptionspec)) {
                    $aOptionspec = array('label' => $aOptionspec, 'value' => $key);
                }

                $iIterator++;
                if ($iIterator > 1 && array_key_exists('id', $aAttributes)) {
                    unset($aAttributes['id']);
                }

                //Option attributes
                $aInputAttributes = $aAttributes;
                if (isset($aOptionspec['attributes'])) {
                    $aInputAttributes = \Zend\Stdlib\ArrayUtils::merge($aInputAttributes, $aOptionspec['attributes']);
                }

                //Option value
                $aInputAttributes['value'] = isset($aOptionspec['value']) ? $aOptionspec['value'] : '';

                //Selected option
                if (in_array($aInputAttributes['value'], $aSelectedOptions)) {
                    $aInputAttributes['checked'] = true;
                } elseif (isset($aOptionspec['selected'])) {
                    $aInputAttributes['checked'] = !!$aOptionspec['selected'];
                } else {
                    $aInputAttributes['checked'] = isset($aInputAttributes['selected']) && $aInputAttributes['type'] !== 'radio' && $aInputAttributes['selected'] != false;
                }

                //Disabled option
                if (isset($aOptionspec['disabled'])) {
                    $aInputAttributes['disabled'] = !!$aOptionspec['disabled'];
                } else {
                    $aInputAttributes['disabled'] = isset($aInputAttributes['disabled']) && $aInputAttributes['disabled'] != false;
                }

                //Render option
                $sOptionMarkup = sprintf('<input %s%s', $this->createAttributesString($aInputAttributes), $this->getInlineClosingBracket());

                //Option label
                $sLabel = isset($aOptionspec['label']) ? $aOptionspec['label'] : '';
                if ($sLabel) {
                    $aLabelAttributes = $aGlobalLabelAttributes;
                    if (isset($aElementOptions['btn-group']) && $aElementOptions['btn-group'] == true) {
                        if ($aInputAttributes['checked']) {
                            $aLabelAttributes['class'] = ((isset($aLabelAttributes['class'])) ? $aLabelAttributes['class'] : '') . ' active';
                        }
                    }

                    if (isset($aOptionspec['label_attributes'])) {
                        $aLabelAttributes = isset($aLabelAttributes) ? array_merge($aLabelAttributes, $aOptionspec['label_attributes']) : $aOptionspec['label_attributes'];
                    }

                    if (null !== ($oTranslator = $this->getTranslator())) {
                        $sLabel = $oTranslator->translate($sLabel, $this->getTranslatorTextDomain());
                    }

                    if (!($oElement instanceof \Zend\Form\LabelAwareInterface) || !$oElement->getLabelOption('disable_html_escape')) {
                        $sLabel = $this->getEscapeHtmlHelper()->__invoke($sLabel);
                    }

                    switch ($this->getLabelPosition()) {
                        case self::LABEL_PREPEND:
                            $sOptionMarkup = sprintf($oLabelHelper->openTag($aLabelAttributes) . '%s%s' . $oLabelHelper->closeTag(), $sLabel, $sOptionMarkup);
                            break;
                        case self::LABEL_APPEND:
                        default:
                            $sOptionMarkup = sprintf($oLabelHelper->openTag($aLabelAttributes) . '%s%s' . $oLabelHelper->closeTag(), $sOptionMarkup, $sLabel);
                            break;
                    }
                }
                $sMarkup .= ($sMarkup ? $this->getSeparator() : '') . $sOptionMarkup;
            }
            return $sMarkup;
    }
}
