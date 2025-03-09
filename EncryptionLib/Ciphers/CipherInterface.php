<?php

namespace EncryptionLib\Ciphers;

interface CipherInterface
{
    public function encrypt(string $text): string;
    public function decrypt(string $text): string;
}
