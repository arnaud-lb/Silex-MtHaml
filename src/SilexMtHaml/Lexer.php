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
        if ($source instanceof Twig_Source) {
            $code = $source->getCode();
            if ($filename === null) {
                $filename = $source->getName();
            }
            $path = $source->getPath();
    
            if (null !== $filename && (preg_match('/\.haml$/', $filename))) {
                $code = $this->environment->compileString($code, $filename);
            }
            
            $new_source = new Twig_Source($code, $filename, $path);
            
            return $this->lexer->tokenize($new_source);
        }
        else {
            $code = $source;
            
            if (null !== $filename && (preg_match('/\.haml$/', $filename))) {
                $code = $this->environment->compileString($code, $filename);
            }

            return $this->lexer->tokenize($code, $filename);
        }
    }

}

