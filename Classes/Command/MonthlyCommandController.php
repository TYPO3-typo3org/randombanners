<?php
namespace T3o\Randombanners\Command;

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

/**
 * Handle click statistics and send monthly mails
 */
class MonthlyCommandController extends \TYPO3\CMS\Extbase\Mvc\Controller\CommandController {

    /**
     * @var \T3o\Randombanners\Domain\Repository\BannerRepository
     * @inject
     */
    protected $bannerRepository;

    /**
     * @var \TYPO3\CMS\Extbase\Configuration\ConfigurationManagerInterface
     * @inject
     */
    protected $configurationManager;

    /**
     * @return void
     */
    public function MonthlyCommand() {
        // No storagePid
        $querySettings = $this->objectManager->get(\TYPO3\CMS\Extbase\Persistence\Generic\Typo3QuerySettings::class);
        $querySettings->setRespectStoragePage(FALSE);
        $this->bannerRepository->setDefaultQuerySettings($querySettings);

        $banners = $this->bannerRepository->findAll();
        foreach($banners as $banner) {
            $this->sendReport($banner);
            $this->setStatistics($banner);
        }
        $this->objectManager->get(\TYPO3\CMS\Extbase\Persistence\Generic\PersistenceManager::class)->persistAll();
        return TRUE;
    }

    /**
     * Send monthly report to sponsor
     *
     * @param \T3o\Randombanners\Domain\Model\Banner $banner
     * @return boolean
     */
    protected function sendReport(\T3o\Randombanners\Domain\Model\Banner $banner) {
        if($banner->getEmail()) {
            $mailObject = $this->objectManager->get(\TYPO3\CMS\Core\Mail\MailMessage::class);
            /* @var \TYPO3\CMS\Core\Mail\MailMessage $mailObject */

            // Get email template
            $standaloneViewUtility = $this->objectManager->get(\T3o\Randombanners\Utility\StandaloneViewUtility::class);
            $renderer = $standaloneViewUtility->getPlainTextView('Scheduler/Email');
            $renderer->assign('banner', $banner);
            $message = $renderer->render();
            $firstLinebreak = strpos($message, PHP_EOL);
            $subject = substr($message, 0, $firstLinebreak);
            $message = ltrim(substr($message, $firstLinebreak));

            // Generate and send mail
            $mailObject->setSubject($subject);
            $mailObject->addPart($message, 'text/plain');
            $mailObject->setFrom(['no-reply@typo3.org' => 'typo3.org Banner']);
            if(\TYPO3\CMS\Core\Utility\GeneralUtility::getApplicationContext()->isDevelopment()) {
                $configuration = $this->configurationManager->getConfiguration(\TYPO3\CMS\Extbase\Configuration\ConfigurationManagerInterface::CONFIGURATION_TYPE_FRAMEWORK);
                $mailObject->setTo($configuration['settings']['developmentEmail'], $banner->getName());
            } else {
                $mailObject->setTo($banner->getEmail(), $banner->getName());
            }
            return $mailObject->send();
        }
    }

    /**
     * Set monthly statistics
     *
     * @param \T3o\Randombanners\Domain\Model\Banner $banner
     */
    protected function setStatistics(\T3o\Randombanners\Domain\Model\Banner $banner) {
        $banner->setClickedLastMonth($banner->getClickedThisMonth());
        $banner->setClickedThisMonth(0);
        $this->bannerRepository->update($banner);
    }

}