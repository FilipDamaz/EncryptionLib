<?php

namespace EncryptionLib\Ciphers;

class CaesarCipher implements CipherInterface
{
    private $shift;

    public function __construct(int $shift = 3)
    {
        $this->shift = $shift;
    }

    public function encrypt(string $text): string
    {
        return $this->caesarShift($text, $this->shift);
    }

    public function decrypt(string $text): string
    {
        return $this->caesarShift($text, 26 - $this->shift);
    }

    private function caesarShift(string $text, int $shift): string
    {
        return preg_replace_callback('/[a-z]/i', function ($matches) use ($shift) {
            $char = $matches[0];
            $ascii = ord($char);
            $base = ctype_upper($char) ? ord('A') : ord('a');
            return chr(($ascii - $base + $shift) % 26 + $base);
        }, $text);
    }
}
