<?php
if(!defined('TYPO3_MODE')){
    die('Access denied.');
}

\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addStaticFile($_EXTKEY, 'Configuration/TypoScript', 'Datec Losungen');

\TYPO3\CMS\Extbase\Utility\ExtensionUtility::registerPlugin(
	'Datec.' . $_EXTKEY,
	'Losungen',
	'Datec Losungen'
);

?>