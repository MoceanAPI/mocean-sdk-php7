<?php

namespace Mocean\Command;

use Mocean\Command\Mc\SendSMS;
use Mocean\Command\Mc\TgSendPhoto;
use Mocean\Command\Mc\TgSendText;
use Mocean\Command\Mc\TgSendAudio;
use Mocean\Command\Mc\TgSendAnimation;
use Mocean\Command\Mc\TgSendDocument;
use Mocean\Command\Mc\TgSendVideo;
use Mocean\Command\Mc\TgRequestContact;
use Mocean\Command\Mc\WaSendAudio;
use Mocean\Command\Mc\WaSendContact;
use Mocean\Command\Mc\WaSendDocument;
use Mocean\Command\Mc\WaSendLocation;
use Mocean\Command\Mc\WaSendPhoto;
use Mocean\Command\Mc\WaSendSticker;
use Mocean\Command\Mc\WaSendText;
use Mocean\Command\Mc\WaSendVideo;
use Mocean\Command\Mc\WaSendWithTemplate;


class Mc
{
    public static function tgSendText()
    {
        return new TgSendText();
    }

    public static function tgSendAudio()
    {
        return new TgSendAudio();
    }

    public static function tgSendAnimation()
    {
        return new TgSendAnimation();
    }

    public static function tgSendDocument()
    {
        return new TgSendDocument();
    }

    public static function tgSendVideo()
    {
        return new TgSendVideo();
    }

    public static function tgSendPhoto()
    {
        return new TgSendPhoto();
    }

    public static function tgRequestContact()
    {
        return new TgRequestContact();
    }

    public static function sendSMS()
    {
        return new SendSMS();
    }

    public static function waSendLocation()
    {
        return new WaSendLocation();
    }

    public static function waSendText()
    {
        return new WaSendText();
    }

    public static function waSendAudio()
    {
        return new WaSendAudio();
    }

    public static function waSendDocument()
    {
        return new WaSendDocument();
    }

    public static function waSendPhoto()
    {
        return new WaSendPhoto();
    }

    public static function waSendVideo()
    {
        return new WaSendVideo();
    }

    public static function waSendSticker()
    {
        return new WaSendSticker();
    }

    public static function waSendWithTemplate()
    {
        return new WaSendWithTemplate();
    }

    public static function waSendContact()
    {
        return new WaSendContact();
    }
}