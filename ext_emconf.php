<?php

/*********************************************************************
 * Extension Manager/Repository config file for ext "datec_losungen".
 *********************************************************************/

$EM_CONF[$_EXTKEY] = [
	'title' => 'Datec Losungen',
	'description' => 'Adds a plugin to display the daily german watchwords (Losungen).',
	'category' => 'plugin',
	'author' => 'Philipp Roensch',
	'author_email' => 'p.roensch@datec-schmidt.de',
	'author_company' => 'Datentechnik Schmidt Software GmbH',
	'createDirs' => '',
	'version' => '1.2.0',
    'constraints' => [
        'depends' => [
            'typo3' => '8.7.0-8.99.99',
        ],
        'conflicts' => [],
    ],
    'autoload' => [
        'psr-4' => [
            'Datec\\DatecLosungen\\' => 'Classes'
        ],
    ],	
    'state' => 'stable',
    'uploadfolder' => 1,
    'createDirs' => '',
    'clearCacheOnLoad' => 1,
];