<?php

use PHPUnit\Framework\TestCase;
use EncryptionLib\EncryptionFacade;

class EncryptionFacadeTest extends TestCase
{
    public function testCaesarCipherIntegration()
    {
        $text = "Hello";
        $encrypted = EncryptionFacade::encrypt($text, 'caesar');
        $decrypted = EncryptionFacade::decrypt($encrypted, 'caesar');

        $this->assertEquals("Khoor", $encrypted);
        $this->assertEquals($text, $decrypted);
    }

    public function testAtBashCipherIntegration()
    {
        $text = "Hello";
        $encrypted = EncryptionFacade::encrypt($text, 'atbash');
        $decrypted = EncryptionFacade::decrypt($encrypted, 'atbash');

        $this->assertEquals("Svool", $encrypted);
        $this->assertEquals($text, $decrypted);
    }

    public function testBaconCipherIntegration()
    {
        $text = "Hello";
        $encrypted = EncryptionFacade::encrypt($text, 'bacon');
        $decrypted = EncryptionFacade::decrypt($encrypted, 'bacon');

        $this->assertEquals("AABBB AABAA ABABA ABABA ABBAB", $encrypted);
        $this->assertEquals("HELLO", $decrypted);
    }
}
