<?php

namespace CViniciusSDias\TextToSpeech\Platforms\Linux;

use CViniciusSDias\TextToSpeech\Speaker;

class EspeakLinuxSpeaker implements Speaker
{
    public function speak(string $text): void
    {
        exec('espeak ' . escapeshellarg($text), $output, $resultCode);

        if ($resultCode !== 0) {
            throw new \RuntimeException('Error executing espeak command');
        }
    }
}