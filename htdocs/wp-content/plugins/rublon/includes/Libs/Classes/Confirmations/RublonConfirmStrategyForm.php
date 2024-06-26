<?php

namespace Rublon_WordPress\Libs\Classes\Confirmations;

abstract class RublonConfirmStrategyForm extends RublonConfirmStrategy
{

    protected $formSelector = '';
    const FORM_CLASS = 'rublon-confirmation-form';

    /**
     * @param null $selector
     */
    function appendScript($selector = null)
    {
        if (empty($selector)) {
            $selector = $this->formSelector;
        }

        if ($this->isThePage() && $this->isConfirmationRequired()) {
            echo self::getScript($selector, self::FORM_CLASS);
        }
    }

    /**
     * @param $selector
     * @param $formClass
     * @return string
     */
    static function getScript($selector, $formClass)
    {
        return '<script type="text/javascript">//<![CDATA[
				document.addEventListener(\'DOMContentLoaded\', function() {
					var initRublonConfirmation = function() {
						jQuery(' . json_encode($selector) . ')
							.filter(":not(.' . $formClass . ')")
							.addClass("' . $formClass . '")
							.each(function() {
								if (RublonSDK) {
									RublonSDK.initConfirmationForm(this);							         
								}
							});
					}
 					initRublonConfirmation();							    
					// Repeat initialization since the buttons can be added dynamically:
					// setInterval(initRublonConfirmation, 1000);
				}, false);
			//]]></script>';
    }

    function checkForAction()
    {
        if ($this->isTheAction() && !empty($_POST)) {
            RublonConfirmations::handleConfirmation($this->getAction(), $this->getInitialContext());
        }
    }

    /**
     * @return mixed
     */
    function getInitialContext()
    {
        return $_POST;
    }

    /**
     * @param $data
     */
    function restoreContext($data)
    {
        $_POST = $data;
    }

    function pluginsLoaded()
    {
        parent::pluginsLoaded();

        if ($this->isTheAction()) {
            if ($data = RublonConfirmations::popStoredData($this->getAction())) {
                $this->restoreContext($data['context']);
                RublonConfirmations::$dataRestored = true;
            }
        }
    }
}