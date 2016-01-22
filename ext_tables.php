<?php

defined('TYPO3_MODE') or die;

/**
 * Include Plugins
 */
\TYPO3\CMS\Extbase\Utility\ExtensionUtility::registerPlugin(
	'B13.Amazingcalendar',
	'List',
	'Calendar: List'
);

\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addStaticFile(
	'amazingcalendar',
	'Configuration/TypoScript',
	'Main Template'
);

\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addPageTSConfig(
	'<INCLUDE_TYPOSCRIPT: source="FILE:EXT:amazingcalendar/Configuration/PageTs/pageTsConfig.ts">
');
$GLOBALS['TCA']['tt_content']['types']['amazingcalendar_list'] = $GLOBALS['TCA']['tt_content']['types'][1];
\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addToAllTCAtypes('tt_content', 'pi_flexform', 'amazingcalendar_list', 'after:CType');
$GLOBALS['TCA']['tt_content']['columns']['pi_flexform']['config']['ds'][','.'amazingcalendar_list'] = 'FILE:EXT:amazingcalendar/Configuration/FlexForms/calendar.xml';