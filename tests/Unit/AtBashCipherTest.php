<?php

use PHPUnit\Framework\TestCase;
use EncryptionLib\Ciphers\AtBashCipher;

class AtBashCipherTest extends TestCase
{
    public function testEncrypt()
    {
        $cipher = new AtBashCipher();
        $this->assertEquals("Svool", $cipher->encrypt("Hello"));
    }

    public function testDecrypt()
    {
        $cipher = new AtBashCipher();
        $this->assertEquals("Hello", $cipher->decrypt("Svool"));
    }
}
