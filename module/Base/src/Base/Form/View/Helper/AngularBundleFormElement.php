<?php

namespace Base\Form\View\Helper;

use Zend\Form\ElementInterface;
use Zend\Form\Element\Collection;
use Zend\Form\View\Helper\FormElement;

//class AngularBundleFormElement extends \TwbBundle\Form\View\Helper\TwbBundleFormElement
class AngularBundleFormElement extends FormElement
{
    
    /**
     * Render an element
     * @param ElementInterface $oElement
     * @return string
     */
    public function render(ElementInterface $oElement)
    {
        
        // Add form-controll class
        $sElementType = $oElement->getAttribute('type');
        
        if (/*!in_array($sElementType, $this->options->getIgnoredViewHelpers()) &&*/
            !($oElement instanceof Collection)
        ) {
            $sElementClass = $oElement->getAttribute('class');
            if ($sElementClass) {
                if (!preg_match('/(\s|^)form-control(\s|$)/', $sElementClass)) {
                    $oElement->setAttribute('class', trim($sElementClass . ' form-control'));
                }
            } else {
                $oElement->setAttribute('class', 'form-control');
            }
        }
        
        $sMarkup = parent::render($oElement);
        

        // Addon prepend
        $aAddOnPrepend = $oElement->getOption('add-on-prepend');
        if ($aAddOnPrepend) {
            $sMarkup = $this->renderAddOn($aAddOnPrepend) . $sMarkup;
        }

        // Addon append
        $aAddOnAppend = $oElement->getOption('add-on-append');
        if ($aAddOnAppend) {
            $sMarkup .= $this->renderAddOn($aAddOnAppend);
        }

        if ($aAddOnAppend || $aAddOnPrepend) {
            $sSpecialClass = '';
            // Input size
            $sElementClass = $oElement->getAttribute('class');
            if ($sElementClass) {
                if (preg_match('/(\s|^)input-lg(\s|$)/', $sElementClass)) {
                    $sSpecialClass .= ' input-group-lg';
                } elseif (preg_match('/(\s|^)input-sm(\s|$)/', $sElementClass)) {
                    $sSpecialClass .= ' input-group-sm';
                }
            }
            return sprintf(
                self::$inputGroupFormat,
                trim($sSpecialClass),
                $sMarkup
            );
        }
        
        $name = $oElement->getName();
        
        $sMarkup = $sMarkup."Angular Element*";
        
        $sMarkup.= '<md-autocomplete required md-input-name="'.$name.'" md-selected-item="selectedItem" md-search-text="searchText" md-items="item in getMatches(searchText)" md-item-text="item.display">';
        $sMarkup.= '<md-item-template>';
        $sMarkup.= '<span md-highlight-text="searchText">{{item.display}}</span>';
        $sMarkup.= '</md-item-template>';
        $sMarkup.= '<div ng-messages="autocompleteForm.autocomplete.$error">';
        $sMarkup.= '<div ng-message="required">This field is required</div>';
        $sMarkup.= '</div>';
        $sMarkup.= '</md-autocomplete>';
        
        return $sMarkup;
    }
}
