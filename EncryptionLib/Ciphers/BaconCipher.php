<?php

namespace EncryptionLib\Ciphers;

class BaconCipher implements CipherInterface
{
    private array $baconMap = [
        'A' => 'AAAAA', 'B' => 'AAAAB', 'C' => 'AAABA', 'D' => 'AAABB', 'E' => 'AABAA',
        'F' => 'AABAB', 'G' => 'AABBA', 'H' => 'AABBB', 'I' => 'ABAAA', 'J' => 'ABAAA',
        'K' => 'ABAAB', 'L' => 'ABABA', 'M' => 'ABABB', 'N' => 'ABBAA', 'O' => 'ABBAB',
        'P' => 'ABBBA', 'Q' => 'ABBBB', 'R' => 'BAAAA', 'S' => 'BAAAB', 'T' => 'BAABA',
        'U' => 'BAABB', 'V' => 'BAABB', 'W' => 'BABAA', 'X' => 'BABAB', 'Y' => 'BABBA',
        'Z' => 'BABBB'
    ];

    private array $reverseBaconMap = [];

    public function __construct()
    {
        // Create a reverse map for decryption
        $this->reverseBaconMap = array_flip($this->baconMap);
    }

    public function encrypt(string $text): string
    {
        $text = strtoupper($text);
        $encoded = [];

        foreach (str_split($text) as $letter) {
            if (isset($this->baconMap[$letter])) {
                $encoded[] = $this->baconMap[$letter];
            }
        }
        return implode(' ', $encoded);
    }

    public function decrypt(string $text): string
    {
        $decoded = '';
        $groups = explode(' ', trim($text));

        foreach ($groups as $group) {
            $decoded .= $this->reverseBaconMap[$group] ?? '?';
        }

        return $decoded;
    }
}
