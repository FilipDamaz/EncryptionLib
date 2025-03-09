<?php

namespace EncryptionLib;

use EncryptionLib\Ciphers\CaesarCipher;
use EncryptionLib\Ciphers\AtBashCipher;
use EncryptionLib\Ciphers\BaconCipher;

class EncryptionFacade
{
    private static ?EncryptionService $service = null;

    private static function getService(): EncryptionService
    {
        if (self::$service === null) {
            self::$service = new EncryptionService();
            self::$service->registerCipher('caesar', new CaesarCipher(3));
            self::$service->registerCipher('atbash', new AtBashCipher());
            self::$service->registerCipher('bacon', new BaconCipher());
        }
        return self::$service;
    }

    public static function encrypt(string $text, string $method): string
    {
        return self::getService()->encrypt($text, $method);
    }

    public static function decrypt(string $text, string $method): string
    {
        return self::getService()->decrypt($text, $method);
    }
}
