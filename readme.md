# CakePHP Inline CSS

[![License](https://poser.pugx.org/drmonkeyninja/cakephp-inline-css/license.png)](https://packagist.org/packages/drmonkeyninja/cakephp-inline-css)

This plugin provides a CakePHP helper that uses [CssToInlineStyles](https://github.com/tijsverkoyen/CssToInlineStyles) to convert HTML style blocks to inline CSS on a View template. Its intended use is with generating email templates where many email clients often require styles applied directly to the elements.

## Requirements

* CakePHP 2.x

## Installation

This plugin should be installed using Composer:-

```
composer require drmonkeyninja/cakephp-inline-css
```

Then add the following line to your bootstrap.php to load the plugin.

```php
CakePlugin::load('InlineCss');
```
