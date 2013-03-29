<?php

namespace SilexMtHaml;

use Silex\ServiceProviderInterface;
use SilexMtHaml\Lexer;
use Silex\Application;
use MtHaml\Environment;

class MtHamlServiceProvider implements ServiceProviderInterface
{
    public function register(Application $app)
    {
        $app['mthaml'] = $app->share(function ($app) {
            return new Environment('twig', array(
                'enable_escaper' => false,
            ));
        });

        $app['twig'] = $app->share($app->extend('twig', function ($twig, $app) {
            $lexer = new Lexer($app['mthaml'], $twig->getLexer());
            $twig->setLexer($lexer);
            return $twig;
        }));
    }

    public function boot(Application $app)
    {
    }
}

