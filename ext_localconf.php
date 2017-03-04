<?php
defined('TYPO3_MODE') or die();

\TYPO3\CMS\Extbase\Utility\ExtensionUtility::configurePlugin(
    'T3o.' . $_EXTKEY,
    'Pi1',
    [
        'Banner' => 'index',
    ],
    // non-cacheable actions
    [
    ]
);

// Register scheduler job
$GLOBALS['TYPO3_CONF_VARS']['SC_OPTIONS']['extbase']['commandControllers'][] = 'T3o\\Randombanners\\Command\\MonthlyCommandController';

// AJAX
$GLOBALS['TYPO3_CONF_VARS']['FE']['eID_include']['randombanners'] = 'EXT:' . $_EXTKEY . '/Classes/Eid/Count.php';