<?php
/************************************************************************
 * Extension Manager/Repository config file for ext "randombanners".
 ************************************************************************/
$EM_CONF[$_EXTKEY] = array(
    'title' => 'Random banners',
    'description' => 'Random banner with click statistics and monthly report',
    'category' => 'extension',
    'constraints' => array(
        'depends' => array(
            'typo3' => '7.6.0-8.99.99',
            'scheduler' => '7.6.0-8.99.99'
        ),
        'conflicts' => array(
        ),
    ),
    'autoload' => array(
        'psr-4' => array(
            'T3o\\Randombanners\\' => 'Classes'
        ),
    ),
    'state' => 'beta',
    'uploadfolder' => 0,
    'createDirs' => '',
    'clearcacheonload' => 0,
    'author' => 'Sven Burkert',
    'author_email' => 'bedienung@sbtheke.de',
    'author_company' => 'TYPO3',
    'version' => '0.9.1',
);