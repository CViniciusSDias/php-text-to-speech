<?php

use CViniciusSDias\TextToSpeech\Platforms\Linux\{EspeakLinuxSpeaker, SpdSayLinuxSpeaker};
use CViniciusSDias\TextToSpeech\Platforms\Mac\SayMacSpeaker;
use CViniciusSDias\TextToSpeech\Platforms\Windows\SapiWindowsSpeaker;
use CViniciusSDias\TextToSpeech\Speaker;

function createSpeaker(): Speaker
{
    $createLinuxSpeaker = function(): Speaker
    {
        if (is_executable(exec("which spd-say"))) {
            return new SpdSayLinuxSpeaker();
        }

        if (is_executable(exec("which espeak"))) {
            return new EspeakLinuxSpeaker();
        }

        throw new RuntimeException('Linux needs spd-say or espeak installed');
    };

    return match (PHP_OS_FAMILY) {
        "Linux" => $createLinuxSpeaker(),
        "Darwin" => new SayMacSpeaker(),
        "Windows" => new SapiWindowsSpeaker(),
    };
}