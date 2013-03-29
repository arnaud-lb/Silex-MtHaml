<?php

namespace SilexMtHaml;

use Silex\ServiceProviderInterface;
use SilexMtHaml\Lexer;
use Silex\Application;
use MtHaml\Environment;
use MtHaml\Support\Twig\Extension;

class MtHamlServiceProvider implements ServiceProviderInterface
{
    public function register(Application $app)
    {
        $app['mthaml'] = $app->share(function ($app) {
            return new Environment('twig', array(
                'enable_escaper' => false,
            ));
        });

        $app['mthaml.twig.extension'] = $app->share(function ($app) {
            return new Extension();
        });

        $app['twig'] = $app->share($app->extend('twig', function ($twig, $app) {
            $twig->addExtension($app['mthaml.twig.extension']);
            $lexer = new Lexer($app['mthaml'], $twig->getLexer());
            $twig->setLexer($lexer);
            return $twig;
        }));
    }

    public function boot(Application $app)
    {
    }
}

