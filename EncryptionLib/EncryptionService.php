<?php

namespace EncryptionLib;

use EncryptionLib\Ciphers\CipherInterface;
use InvalidArgumentException;

class EncryptionService
{
    private array $ciphers;

    public function __construct()
    {
        $this->ciphers = [];
    }

    public function registerCipher(string $name, CipherInterface $cipher): void
    {
        $this->ciphers[strtolower($name)] = $cipher;
    }

    public function encrypt(string $text, string $method): string
    {
        $cipher = $this->getCipher($method);
        return $cipher->encrypt($text);
    }

    public function decrypt(string $text, string $method): string
    {
        $cipher = $this->getCipher($method);
        return $cipher->decrypt($text);
    }

    private function getCipher(string $method): CipherInterface
    {
        $method = strtolower($method);
        if (!isset($this->ciphers[$method])) {
            throw new InvalidArgumentException("Unknown encryption method: $method");
        }
        return $this->ciphers[$method];
    }
}
