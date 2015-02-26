<?php

/********************************************************************
 * Extension Manager/Repository config file for ext: "datec_losungen"
 *******************************************************************/

$EM_CONF[$_EXTKEY] = array(
	'title' => 'Datec Losungen',
	'description' => 'Adds a plugin to display the daily german watchwords (Losungen).',
	'category' => 'plugin',
	'author' => 'Philipp Roensch',
	'author_email' => 'p.roensch@datec-schmidt.de',
	'author_company' => 'Datentechnik Schmidt Software GmbH',
	'shy' => 0,
	'priority' => '',
	'module' => '',
	'state' => 'stable',
	'internal' => '',
	'uploadfolder' => 'typo3temp/tx_dateclosungen/',
	'createDirs' => '',
	'modify_tables' => '',
	'clearCacheOnLoad' => 0,
	'lockType' => '',
	'version' => '1.0.2',
	'constraints' => array(
		'depends' => array(
			'typo3' => '6.0.0-6.2.99',
		),
		'conflicts' => array(
		),
		'suggests' => array(
		),
	),
);

?>