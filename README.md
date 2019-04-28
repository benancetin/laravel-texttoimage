# Text To Image
Text to image is stamping text on defined image canvas. So you can convert text to images. This package can be used for to hide text in code or search bots, or to hide e-mails from search bots. You define everything in config file like image width, height and colour.

## Installing Text To Image
```bash
composer require benancetin/laravel-texttoimage
```
Note: for Laravel 5.5 below, You should register the service provider.

## Using Text To Image
In any of your blade templates, you just use "@texttoimage(The text to be converted)", that's all! If you want to change width, height or the colours you can change them in vendor/benancetin/texttoimage/config/texttoimage.php file.
