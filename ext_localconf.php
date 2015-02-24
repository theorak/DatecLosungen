<?php
if (!defined('TYPO3_MODE')) {
	die ('Access denied.');
}

$extPath    = \TYPO3\CMS\Core\Utility\ExtensionManagementUtility::extPath($_EXTKEY);
$extRelPath = \TYPO3\CMS\Core\Utility\ExtensionManagementUtility::extRelPath($_EXTKEY);

\TYPO3\CMS\Extbase\Utility\ExtensionUtility::configurePlugin(
	'Datec.' . $_EXTKEY,
	'Losungen',
	array(
		'Losungen' => 'showLosung',
	),
	// non-cacheable actions
	array(
		'Losungen' => 'showLosung',
	)
);


?>