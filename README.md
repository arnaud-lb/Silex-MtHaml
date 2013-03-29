
# Silex-MtHaml

HAML templating for Silex

## Installation

Install using composer:

```
composer require mthaml/silex-mthaml:*
```

Then register the service provider:

``` php
<?php

// after $app->register(new Silex\Provider\TwigServiceProvider() [...]
$app->register(new SilexMtHaml\MtHamlServiceProvider());
```

## Usage

Just name your template with a `.haml` suffix, and call `render` as usual:

