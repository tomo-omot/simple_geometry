<?php

$finder = PhpCsFixer\Finder::create()
    ->in('app')
    ->in('src')
    ->in('tests');

return PhpCsFixer\Config::create()
    ->setRules([
        '@Symfony'               => true,
        'array_syntax'           => ['syntax' => 'short'],
        'binary_operator_spaces' => [
            'align_double_arrow' => true,
            'align_equals'       => true,
        ],
        'ordered_imports' => true,
        'phpdoc_order'    => true,
    ])
    ->setCacheFile(__DIR__.'/vendor/.php_cs.cache')
    ->setFinder($finder)
    ;
