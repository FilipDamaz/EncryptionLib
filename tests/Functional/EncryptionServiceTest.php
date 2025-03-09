<?php

use PHPUnit\Framework\TestCase;
use EncryptionLib\EncryptionService;
use EncryptionLib\Ciphers\CaesarCipher;
use EncryptionLib\Ciphers\AtBashCipher;
use EncryptionLib\Ciphers\BaconCipher;

class EncryptionServiceTest extends TestCase
{
    private EncryptionService $service;

    protected function setUp(): void
    {
        $this->service = new EncryptionService();
        $this->service->registerCipher('caesar', new CaesarCipher(3));
        $this->service->registerCipher('atbash', new AtBashCipher());
        $this->service->registerCipher('bacon', new BaconCipher());
    }

    public function testCaesarCipher()
    {
        $text = "Hello";
        $encrypted = $this->service->encrypt($text, 'caesar');
        $decrypted = $this->service->decrypt($encrypted, 'caesar');

        $this->assertEquals("Khoor", $encrypted);
        $this->assertEquals($text, $decrypted);
    }

    public function testAtBashCipher()
    {
        $text = "Hello";
        $encrypted = $this->service->encrypt($text, 'atbash');
        $decrypted = $this->service->decrypt($encrypted, 'atbash');

        $this->assertEquals("Svool", $encrypted);
        $this->assertEquals($text, $decrypted);
    }

    public function testBaconCipher()
    {
        $text = "Hello";
        $encrypted = $this->service->encrypt($text, 'bacon');
        $decrypted = $this->service->decrypt($encrypted, 'bacon');

        $this->assertEquals("AABBB AABAA ABABA ABABA ABBAB", $encrypted);
        $this->assertEquals("HELLO", $decrypted);
    }

    public function testUnknownCipher()
    {
        $this->expectException(InvalidArgumentException::class);
        $this->service->encrypt("Hello", "unknown");
    }
}
