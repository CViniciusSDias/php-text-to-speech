<?php


namespace CViniciusSDias\TextToSpeech\Platforms\Linux;


use CViniciusSDias\TextToSpeech\Speaker;

class SpdSayLinuxSpeaker implements Speaker
{
    public function speak(string $text): void
    {
        exec('spd-say ' . escapeshellarg($text), $output, $resultCode);

        if ($resultCode !== 0) {
            throw new \RuntimeException('Error executing spd-say command');
        }
    }
}