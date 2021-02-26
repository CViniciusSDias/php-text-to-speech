<?php

namespace CViniciusSDias\TextToSpeech\Platforms\Mac;

use CViniciusSDias\TextToSpeech\Speaker;

class SayMacSpeaker implements Speaker
{

    public function speak(string $text): void
    {
        exec('say ' . escapeshellarg($text), result_code: $resultCode);

        if ($resultCode !== 0) {
            throw new \RuntimeException('Error executing spd-say command');
        }
    }
}