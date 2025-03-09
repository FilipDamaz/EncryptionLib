<?php

use PHPUnit\Framework\TestCase;
use EncryptionLib\Ciphers\CaesarCipher;

class CaesarCipherTest extends TestCase
{
    public function testEncrypt()
    {
        $cipher = new CaesarCipher(3);
        $this->assertEquals("Khoor", $cipher->encrypt("Hello"));
    }

    public function testDecrypt()
    {
        $cipher = new CaesarCipher(3);
        $this->assertEquals("Hello", $cipher->decrypt("Khoor"));
    }
}
