
# Silex-MtHaml

[HAML][haml] templating for Silex using the [MtHaml PHP HAML parser][mthaml].

## Features

- **Acts as a Twig preprocessor**: Supports Twig functions, filters, macros, blocks, inheritance, expressions and every Twig features
- **Mix Twig and HAML templates**: You can include, extend, use and import Twig templates from HAML templates, and vice versa.
- **High performance**: Templates are compiled to PHP code and cached, no parsing or runtime overhead.
- **HAML syntax** supported by editors

## Installation

Install using composer:

```
$ composer require mthaml/silex-mthaml:*
```

Then register the service provider:

``` php
<?php

// after $app->register(new Silex\Provider\TwigServiceProvider() [...]
$app->register(new SilexMtHaml\MtHamlServiceProvider());
```

## Usage

Name your template with a `.haml` suffix, and call `render` as usual.

## Syntax

See [MtHaml][mthaml] docs

[haml]: http://haml-lang.com/
[mthaml]: https://github.com/arnaud-lb/MtHaml

