<?php

use PHPUnit\Framework\TestCase;
use EncryptionLib\Ciphers\BaconCipher;

class BaconCipherTest extends TestCase
{
    public function testEncrypt()
    {
        $cipher = new BaconCipher();
        $this->assertEquals("AABBB AABAA ABABA ABABA ABBAB", $cipher->encrypt("Hello"));
    }

    public function testDecrypt()
    {
        $cipher = new BaconCipher();
        $this->assertEquals("HELLO", $cipher->decrypt("AABBB AABAA ABABA ABABA ABBAB"));
    }
}
