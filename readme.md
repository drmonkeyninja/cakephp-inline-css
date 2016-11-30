# CakePHP Inline CSS

[![License](https://poser.pugx.org/drmonkeyninja/cakephp-inline-css/license.svg)](https://packagist.org/packages/drmonkeyninja/cakephp-inline-css) [![Build Status](https://travis-ci.org/drmonkeyninja/cakephp-inline-css.svg)](https://travis-ci.org/drmonkeyninja/cakephp-inline-css)

This plugin provides a CakePHP helper that uses [CssToInlineStyles](https://github.com/tijsverkoyen/CssToInlineStyles) to convert HTML style blocks to inline CSS on a View template. Its intended use is with generating email templates where many email clients often require styles applied directly to the elements.

## Requirements

* CakePHP 3.x

## Installation

This plugin should be installed using Composer:-

```
composer require drmonkeyninja/cakephp-inline-css:3.0.*
```

Then add the following line to your bootstrap.php to load the plugin.

```php
Plugin::load('InlineCss');
```

## Usage

To use this plugin you want to load the `InlineCss` helper to use with your email's HTML template:-

```php
$email = new Email();
$email->template('welcome', 'fancy')
    ->emailFormat('html')
    ->helpers(['InlineCss.InlineCss'])
    ->to('bob@example.com')
    ->from('app@domain.com')
    ->send();
```

When rendering your email template the plugin will then convert any CSS defined in an inline `<style>` block in your template to inline CSS. So, if your email view template looks like this:-

```php
<style type="text/css">
	.link {color: red;}
</style>
<p><a href="http://andy-carter.com" class="link">Link</a></p>
```

It will be rendered as:-

```html
<p><a href="http://andy-carter.com" class="link" style="color: red;">Link</a></p>
```

This makes generating HTML emails a lot simpler as you can write your CSS in a more DRY approach.

I recommend you look consider deferring the sending of emails using something like the excellent [Queue plugin](https://github.com/dereuromark/cakephp-queue) to improve your app's response time for users when using this plugin.
