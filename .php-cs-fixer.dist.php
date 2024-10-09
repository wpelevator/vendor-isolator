<?php

$config = new PhpCsFixer\Config();

return $config->setUsingCache(false)
    ->setRules([
        '@PSR2' => true,
        '@Symfony' => true,
        'array_syntax' => ['syntax' => 'short'],
        'binary_operator_spaces' => ['operators' => ['=>' => 'align']],
        'concat_space' => ['spacing' => 'one'],
        'ordered_imports' => true,

        // Overrides
        'phpdoc_summary' => false,
    ])
    ->setFinder(PhpCsFixer\Finder::create()
        ->in(['.'])
        ->exclude('vendor')
    );
