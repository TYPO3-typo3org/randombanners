<?php
namespace T3o\Randombanners\Utility;

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

class StandaloneViewUtility {

    /**
     * @var \TYPO3\CMS\Extbase\Configuration\ConfigurationManagerInterface
     * @inject
     */
    protected $configurationManager;

    /**
     * objectManager
     *
     * @var \TYPO3\CMS\Extbase\Object\ObjectManager
     * @inject
     */
    protected $objectManager;

    /**
     * Creates a stand-alone instance of the Fluid view to render a plain text template
     *
     * @param string $templateName: the name of the template to use
     * @return \TYPO3\CMS\Fluid\View\StandaloneView: the Fluid instance
     */
    public function getPlainTextView($templateName) {
        $configuration = $this->configurationManager->getConfiguration(\TYPO3\CMS\Extbase\Configuration\ConfigurationManagerInterface::CONFIGURATION_TYPE_FRAMEWORK);
        $standaloneView = $this->objectManager->get(\TYPO3\CMS\Fluid\View\StandaloneView::class);
        $standaloneView->getRequest()->setControllerExtensionName($configuration['extensionName']);
        $standaloneView->setLayoutRootPaths($configuration['view']['layoutRootPaths']);
        $standaloneView->setPartialRootPaths($configuration['view']['partialRootPaths']);
        $standaloneView->setTemplateRootPaths($configuration['view']['templateRootPaths']);
        $standaloneView->setTemplate($templateName);
        return $standaloneView;
    }

}