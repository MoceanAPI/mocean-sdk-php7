<?php


namespace Mocean\Command\Mc;

use Mocean\Command\ContentBuilder\WaAudioContentBuilder;

class WaSendAudio extends BaseWa
{
    /**
     * @param WaAudioContentBuilder $contentBuilder
     * @return $this
     */
    public function setContent($contentBuilder)
    {
        if ($contentBuilder instanceof WaAudioContentBuilder === false) {
            throw new \InvalidArgumentException("contentBuilder must be instance of WaAudioContentBuilder");
        }

        $this->requestData["content"] = $contentBuilder->build();
        $this->requestData["content"]["type"] = "audio";
        return $this;
    }

}