# Speech Shortcode for WordPress

[![Build Status](https://travis-ci.org/miya0001/speech-shortcode.svg?branch=master)](https://travis-ci.org/miya0001/speech-shortcode)

Implementation of HTML5 Text Speech API as a WordPress Shortcode.

Demo: https://miya.io/2017/02/10/html5-web-speech-api/

## How to Use

```
* [speech]He has a very relaxed attitude towards work.[/speech]
* [speech]Charles Darwin developed the theory of Evolution.[/speech]
```

### Arguments

* lang - Language that you want it to speak. Default value is "en-US".
* voice - Voice. Default value is "".
* rate - Default value is 1.

Example:

```
[speech lang="ja-JP" voice="Alex"]Hello[/speech]
```

### Filter Hooks

* speech_shortcode_default_lang
* speech_shortcode_default_voice
* speech_shortcode_default_rate

## Screenshots

![](https://www.evernote.com/l/ABVNqusBPvRFRarP7qRnbM2TYk_56MObz-sB/image.png)

![](https://www.evernote.com/l/ABVWarzrZ_lBp4yIIMYwP1hONrHnI8vTYMMB/image.png)
