<?php

namespace EncryptionLib\Ciphers;

class AtBashCipher implements CipherInterface
{
    public function encrypt(string $text): string
    {
        return $this->atbash($text);
    }

    public function decrypt(string $text): string
    {
        return $this->atbash($text); // AtBash działa symetrycznie
    }

    private function atbash(string $text): string
    {
        return preg_replace_callback('/[a-z]/i', function ($matches) {
            $char = $matches[0];
            $base = ctype_upper($char) ? ord('A') : ord('a');
            return chr($base + (25 - (ord($char) - $base)));
        }, $text);
    }
}
