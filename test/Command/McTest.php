<?php

namespace MoceanTest\Command;

use Mocean\Command\CommandMc;
use Mocean\Command\Mc;
use Mocean\Command\Mc\SendSMS;
use Mocean\Command\Mc\TgRequestContact;
use Mocean\Command\Mc\TgSendAnimation;
use Mocean\Command\Mc\TgSendAudio;
use Mocean\Command\Mc\TgSendDocument;
use Mocean\Command\Mc\TgSendPhoto;
use Mocean\Command\Mc\TgSendText;
use Mocean\Command\Mc\TgSendVideo;
use Mocean\Command\Mc\WaSendAudio;
use Mocean\Command\Mc\WaSendContact;
use Mocean\Command\Mc\WaSendDocument;
use Mocean\Command\Mc\WaSendLocation;
use Mocean\Command\Mc\WaSendPhoto;
use Mocean\Command\Mc\WaSendSticker;
use Mocean\Command\Mc\WaSendText;
use Mocean\Command\Mc\WaSendVideo;
use Mocean\Command\Mc\WaSendWithTemplate;
use MoceanTest\AbstractTesting;

class McTest extends AbstractTesting
{
    public function testTgSendText()
    {
        $this->assertInstanceOf(TgSendText::class, Mc::tgSendText());
    }

    public function testTgSendAudio()
    {
        $this->assertInstanceOf(TgSendAudio::class, Mc::tgSendAudio());
    }

    public function testTgSendAnimation()
    {
        $this->assertInstanceOf(TgSendAnimation::class, Mc::tgSendAnimation());
    }

    public function testTgSendDocument()
    {
        $this->assertInstanceOf(TgSendDocument::class, Mc::tgSendDocument());
    }

    public function testTgSendVideo()
    {
        $this->assertInstanceOf(TgSendVideo::class, Mc::tgSendVideo());
    }

    public function testTgRequestContact()
    {
        $this->assertInstanceOf(TgRequestContact::class, Mc::tgRequestContact());
    }
    public function testTgSendPhoto()
    {
        $this->assertInstanceOf(TgSendPhoto::class,Mc::tgSendPhoto());
    }

    public function testSendSMS()
    {
        $this->assertInstanceOf(SendSMS::class,Mc::sendSMS());
    }

    public function testWaSendText()
    {
        $this->assertInstanceOf(WaSendText::class,Mc::waSendText());
    }

    public function testWaSendAudio()
    {
        $this->assertInstanceOf(WaSendAudio::class,Mc::waSendAudio());
    }

    public function testWaSendDocument()
    {
        $this->assertInstanceOf(WaSendDocument::class,Mc::waSendDocument());
    }

    public function testWaSendPhoto()
    {
        $this->assertInstanceOf(WaSendPhoto::class,Mc::waSendPhoto());
    }

    public function testWaSendVideo()
    {
        $this->assertInstanceOf(WaSendVideo::class,Mc::waSendVideo());
    }

    public function testWaSendSticker()
    {
        $this->assertInstanceOf(WaSendSticker::class,Mc::waSendSticker());
    }

    public function testWaSendContact()
    {
        $this->assertInstanceOf(WaSendContact::class,Mc::waSendContact());
    }

    public function testWaSendLocation()
    {
        $this->assertInstanceOf(WaSendLocation::class,Mc::waSendLocation());
    }

    public function testWaSendWithTemplate()
    {
        $this->assertInstanceOf(WaSendWithTemplate::class,Mc::waSendWithTemplate());
    }
}