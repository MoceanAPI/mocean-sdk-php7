<?php


namespace Mocean\Command\Mc;

use Mocean\Command\ContentBuilder\WaDocumentContentBuilder;

class WaSendDocument extends BaseWa
{
    /**
     * @param WaDocumentContentBuilder $contentBuilder
     * @return $this
     */
    public function setContent($contentBuilder)
    {
        if ($contentBuilder instanceof WaDocumentContentBuilder === false) {
            throw new \InvalidArgumentException("contentBuilder must be instance of WaDocumentContentBuilder");
        }

        $this->requestData["content"] = $contentBuilder->build();
        $this->requestData["content"]["type"] = "document";
        return $this;
    }
}