<?php
namespace T3o\Randombanners\Eid;

/*
 * This file is part of the TYPO3 CMS project.
 *
 * It is free software; you can redistribute it and/or modify it under
 * the terms of the GNU General Public License, either version 2
 * of the License, or any later version.
 *
 * For the full copyright and license information, please read the
 * LICENSE.txt file that was distributed with this source code.
 *
 * The TYPO3 project - inspiring people to share!
 */

use TYPO3\CMS\Core\Utility\GeneralUtility;

$gp = GeneralUtility::_POST();

$t3Version = \TYPO3\CMS\Core\Utility\VersionNumberUtility::convertVersionNumberToInteger(\TYPO3\CMS\Core\Utility\VersionNumberUtility::getNumericTypo3Version());
if($t3Version >= 8000000) {
    /* @var \TYPO3\CMS\Core\Database\Query\QueryBuilder $queryBuilder */
    $queryBuilder = GeneralUtility::makeInstance(\TYPO3\CMS\Core\Database\ConnectionPool::class)->getQueryBuilderForTable('tx_randombanners_domain_model_banner');
    $queryBuilder
        ->update('tx_randombanners_domain_model_banner')
        ->where($queryBuilder->expr()->eq('uid', (int)$gp['banner']))
        ->set('clicked_this_month', 'clicked_this_month + 1', FALSE)
        ->execute();
} else {
    $GLOBALS['TYPO3_DB']->exec_UPDATEquery(
        'tx_randombanners_domain_model_banner',
        sprintf('uid = %d', (int)$gp['banner']),
        ['clicked_this_month' => 'clicked_this_month + 1'],
        ['clicked_this_month']
    );
}