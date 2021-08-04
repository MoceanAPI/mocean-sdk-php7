<?php

namespace Mocean\Command\Template;

use Mocean\Command\ContentBuilder\WaRichMediaContentBuilder;
use Mocean\Command\Button\BaseWaButton;

abstract class BaseWaTemplate extends AbstractTemplate
{
    /**
     * @return string type for the template
     */
    abstract protected function type();

    protected function requiredKey()
    {
        return ["name", "language", "type", "body_params"];
    }

    public function build()
    {
        $this->requestData["type"] = $this->type();
        return parent::build();
    }

    public function setName($name)
    {
        $this->requestData["name"] = $name;
        return $this;
    }

    public function setLanguage($language)
    {
        $this->requestData["language"] = $language;
        return $this;
    }

    public function setBodyParams($params = [])
    {
        $this->requestData["body_params"] = $params;
        return $this;
    }

    public function setHeaderParams($params = [])
    {
        $this->requestData["header_params"] = $params;
        return $this;
    }

    public function setWaButton($buttons = [])
    {
        if (!is_array($buttons)) {
            throw new \InvalidArgumentException("buttons must list of BaseWaButton instance");
        }
        $arrayButtons = [];

        foreach($buttons as $button) {
            if ($button instanceof BaseWaButton === false ) {
                throw new \InvalidArgumentException("buttons must list of BaseWaButton instance");
            }
            $arrayButtons[] = $button->build();
        }

        $this->requestData["wa_buttons"] = $arrayButtons;
        return $this;
    }
}