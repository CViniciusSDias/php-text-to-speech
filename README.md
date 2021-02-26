# PHP Text-to-speech

This library is a simple tool to make your computer speak whatever you want.

The tool uses the CLI tool for Linux and Mac, and COM object SAPI.SpVoice for Windows.

## Usage

To simply make your computer speak, you can directly run:
```bash
$ php vendor/bin/speak "Text you want it to speak"
```

If you want to use this library in your code, it's as simple as:
```php
<?php

require 'vendor/autoload.php';

$speaker = createSpeaker();
$speaker->speak('Text you want it to speak');
```

## Requirements

### Windows

[COM extension](https://www.php.net/manual/en/book.com.php). Just add `extension=com_dotnet` to your `php.ini` file and you should be good.

### Mac

None (`say` command is installed by default)

### Linux

You will need `spd-say` or `espeak` installed. In most distros one of these are already installed, so you should be good.

### Docker

#### Linux

When using Docker you need to make sure you have an audio device linked from you host machine to your container.

You can add the `device` flag with `/dev/snd`. Example:

```shell
$ docker rum --rm -itv $(pwd):/app -w /app --device /dev/snd php:latest php example.php
```

#### Mac
On Mac you would need pulseaudio. Check instructions here: https://devops.datenkollektiv.de/running-a-docker-soundbox-on-mac.html

#### Windows

This was not tested with Docker for Windows. Maybe this can be helpful:
https://stackoverflow.com/questions/52890474/how-to-get-docker-audio-and-input-with-windows-or-mac-host
