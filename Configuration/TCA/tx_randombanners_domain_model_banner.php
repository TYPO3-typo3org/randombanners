<?php
defined('TYPO3_MODE') or die();

return [
    'ctrl' => [
        'title' => 'LLL:EXT:randombanners/Resources/Private/Language/locallang_db.xlf:tx_randombanners_domain_model_banner',
        'label' => 'name',
        'tstamp' => 'tstamp',
        'crdate' => 'crdate',
        'cruser_id' => 'cruser_id',
        'dividers2tabs' => true,
        'versioningWS' => 2,
        'versioning_followPages' => TRUE,
        'origUid' => 't3_origuid',
        'languageField' => 'sys_language_uid',
        'transOrigPointerField' => 'l10n_parent',
        'transOrigDiffSourceField' => 'l10n_diffsource',
        'delete' => 'deleted',
        'enablecolumns' => [
            'disabled' => 'hidden',
            'starttime' => 'starttime',
            'endtime' => 'endtime',
        ],
        'iconfile' => 'EXT:randombanners/Resources/Public/Icons/tx_randombanners_domain_model_banner.gif'
    ],
    'interface' => [
        'showRecordFieldList' => 'cruser_id, pid, sys_language_uid, l10n_parent, l10n_diffsource, hidden, name, link, email, logo, clicked_this_month, clicked_last_month',
    ],
    'types' => [
        '1' => ['showitem' => 'sys_language_uid;;;;1-1-1, l10n_parent, l10n_diffsource, hidden;;1, name, link, email, logo, clicked_this_month, clicked_last_month,--div--;LLL:EXT:cms/locallang_ttc.xml:tabs.access,starttime, endtime'],
    ],
    'palettes' => [
        '1' => ['showitem' => ''],
    ],
    'columns' => [
        'sys_language_uid' => [
            'exclude' => true,
            'label' => 'LLL:EXT:lang/Resources/Private/Language/locallang_general.xlf:LGL.language',
            'config' => [
                'type' => 'select',
                'renderType' => 'selectSingle',
                'foreign_table' => 'sys_language',
                'foreign_table_where' => 'ORDER BY sys_language.title',
                'items' => [
                    ['LLL:EXT:lang/Resources/Private/Language/locallang_general.xlf:LGL.allLanguages', '-1'],
                    ['LLL:EXT:lang/Resources/Private/Language/locallang_general.xlf:LGL.default_value', '0']
                ],
                'default' => 0,
                'fieldWizard' => [
                    'selectIcons' => [
                        'disabled' => false,
                    ],
                ],
            ]
        ],
        'l10n_parent' => [
            'displayCond' => 'FIELD:sys_language_uid:>:0',
            'exclude' => true,
            'label' => 'LLL:EXT:lang/locallang_general.xlf:LGL.l18n_parent',
            'config' => [
                'type' => 'select',
                'renderType' => 'selectSingle',
                'items' => [
                    ['', 0],
                ],
                'foreign_table' => 'tx_randombanners_domain_model_banner',
                'foreign_table_where' => 'AND tx_randombanners_domain_model_banner.pid=###CURRENT_PID### AND tx_randombanners_domain_model_banner.sys_language_uid IN (-1,0)',
                'showIconTable' => false
            ]
        ],
        'l10n_diffsource' => [
            'config' => [
                'type' => 'passthrough',
                'default' => ''
            ]
        ],
        't3ver_label' => [
            'label' => 'LLL:EXT:lang/locallang_general.xml:LGL.versionLabel',
            'config' => [
                'type' => 'input',
                'size' => 30,
                'max' => 30,
            ]
        ],
        'hidden' => [
            'exclude' => true,
            'label' => 'LLL:EXT:lang/locallang_general.xlf:LGL.hidden',
            'config' => [
                'type' => 'check',
                'default' => 0
            ]
        ],
        'starttime' => [
            'exclude' => true,
            'l10n_mode' => 'mergeIfNotBlank',
            'label' => 'LLL:EXT:frontend/Resources/Private/Language/locallang_ttc.xlf:starttime_formlabel',
            'config' => [
                'type' => 'input',
                'size' => 16,
                'max' => 20,
                'eval' => 'datetime',
                'default' => 0,
            ]
        ],
        'endtime' => [
            'exclude' => true,
            'l10n_mode' => 'mergeIfNotBlank',
            'label' => 'LLL:EXT:frontend/Resources/Private/Language/locallang_ttc.xlf:endtime_formlabel',
            'config' => [
                'type' => 'input',
                'size' => 16,
                'max' => 20,
                'eval' => 'datetime',
                'default' => 0,
            ]
        ],
        'name' => [
            'exclude' => false,
            'label' => 'LLL:EXT:randombanners/Resources/Private/Language/locallang_db.xlf:tx_randombanners_domain_model_banner.name',
            'config' => [
                'type' => 'input',
                'size' => 20,
                'max' => 255,
                'eval' => 'trim,required',
            ]
        ],
        'link' => [
            'exclude' => false,
            'label' => 'LLL:EXT:randombanners/Resources/Private/Language/locallang_db.xlf:tx_randombanners_domain_model_banner.link',
            'config' => [
                'type' => 'input',
                'size' => 20,
                'max' => 255,
                'eval' => 'trim,required',
            ]
        ],
        'email' => [
            'exclude' => true,
            'label' => 'LLL:EXT:randombanners/Resources/Private/Language/locallang_db.xlf:tx_randombanners_domain_model_banner.email',
            'config' => [
                'type' => 'input',
                'size' => 20,
                'max' => 255,
                'eval' => 'trim',
            ]
        ],
        'logo' => [
            'exclude' => true,
            'l10n_mode' => 'mergeIfNotBlank',
            'label' => 'LLL:EXT:randombanners/Resources/Private/Language/locallang_db.xlf:tx_randombanners_domain_model_banner.logo',
            'config' => \TYPO3\CMS\Core\Utility\ExtensionManagementUtility::getFileFieldTCAConfig(
                'logo',
                [
                    'minitems' => 1,
                    'maxitems' => 1,
                ],
                $GLOBALS['TYPO3_CONF_VARS']['GFX']['imagefile_ext']
            ),
        ],
        'clicked_this_month' => [
            'exclude' => false,
            'label' => 'LLL:EXT:randombanners/Resources/Private/Language/locallang_db.xlf:tx_randombanners_domain_model_banner.clicked_this_month',
            'config' => [
                'type' => 'input',
                'size' => 4,
                'eval' => 'int',
                'readOnly' => 1,
            ],
        ],
        'clicked_last_month' => [
            'exclude' => false,
            'label' => 'LLL:EXT:randombanners/Resources/Private/Language/locallang_db.xlf:tx_randombanners_domain_model_banner.clicked_last_month',
            'config' => [
                'type' => 'input',
                'size' => 4,
                'eval' => 'trim',
                'readOnly' => 1,
            ],
        ],
    ],
];