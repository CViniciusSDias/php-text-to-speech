<?php

namespace CViniciusSDias\TextToSpeech;

interface Speaker
{
    public function speak(string $text): void;
}