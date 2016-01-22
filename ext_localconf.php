<?php

defined('TYPO3_MODE') or die;

/**
 * List calendar events
 */
\TYPO3\CMS\Extbase\Utility\ExtensionUtility::configurePlugin(
	'B13.Amazingcalendar',
	'List',
	array('Calendar' => 'listUpcomingEvents'),
	array('Calendar' => 'listUpcomingEvents'),
	\TYPO3\CMS\Extbase\Utility\ExtensionUtility::PLUGIN_TYPE_CONTENT_ELEMENT
);