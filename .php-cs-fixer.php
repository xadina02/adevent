<?php

$finder = PhpCsFixer\Finder::create()
    ->exclude('tests/Fixtures')
    ->in(__DIR__);

$config = PhpCsFixer\Config::create()
    ->setRiskyAllowed(true)
    ->setRules([
        '@PSR2' => true,
        'array_indentation' => true,
        'trailing_comma_in_multiline_array' => true,
        'method_chaining_indentation' => true,
        'binary_operator_spaces' => true,
        'strict_comparison' => true,
        'standardize_not_equals' => true,
        'strict_param' => true,
        'concat_space' => ['spacing' => 'one'],
        'array_syntax' => ['syntax' => 'short'],
        'no_unused_imports' => true,
        'no_useless_else' => true,
        'blank_line_before_statement' => true,
        'whitespace_after_comma_in_array' => true,
    ])
    ->setFinder($finder);

return $config;