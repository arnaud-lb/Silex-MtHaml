<?php

namespace SilexMtHaml;

use MtHaml\Environment;
use \Twig_Source;

class Lexer implements \Twig_LexerInterface
{
    private $environment;
    private $lexer;

    public function __construct(Environment $environment, \Twig_LexerInterface $lexer)
    {
        $this->environment = $environment;
        $this->lexer = $lexer;
    }

    public function tokenize($code, $filename = null)
    {
        if ($code instanceof Twig_Source) {
            if ($filename === null)
                $filename = $code->getName();
            $code = $code->getCode();
        }
        
        if (null !== $filename && preg_match('/\.haml$/', $filename)) {
            $code = $this->environment->compileString($code, $filename);
        }
        return $this->lexer->tokenize($code, $filename);
    }
}

