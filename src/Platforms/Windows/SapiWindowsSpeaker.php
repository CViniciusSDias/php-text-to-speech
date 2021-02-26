<?php

namespace CViniciusSDias\TextToSpeech\Platforms\Windows;

use CViniciusSDias\TextToSpeech\Speaker;

class SapiWindowsSpeaker implements Speaker
{
    public function speak(string $text): void
    {
        $voice = new \com("SAPI.SpVoice");
        $voice->Speak($text);
    }
}