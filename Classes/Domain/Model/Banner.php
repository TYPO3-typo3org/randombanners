<?php
namespace T3o\Randombanners\Domain\Model;

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

class Banner extends \TYPO3\CMS\Extbase\DomainObject\AbstractEntity
{

	/**
	 * name
	 *
	 * @var string
	 */
	protected $name;

	/**
	 * link
	 *
	 * @var string
	 */
	protected $link;

	/**
	 * email
	 *
	 * @var string
	 */
	protected $email;

	/**
	 * Logo
	 *
     * @var \TYPO3\CMS\Extbase\Persistence\ObjectStorage<\TYPO3\CMS\Extbase\Domain\Model\FileReference>
	 */
	protected $logo;

	/**
	 * clickedThisMonth
	 *
	 * @var integer
	 */
	protected $clickedThisMonth;

	/**
	 * clickedLastMonth
	 *
	 * @var string
	 */
	protected $clickedLastMonth;

	/**
	 * @param string $name
	 * @return void
	 */
	public function setName($name) {
		$this->name = $name;
	}

	/**
	 * @return string
	 */
	public function getName() {
		return $this->name;
	}

	/**
	 * @param string $link
	 * @return void
	 */
	public function setLink($link) {
		$this->link = $link;
	}

	/**
	 * @return string
	 */
	public function getLink() {
		return $this->link;
	}

	/**
	 * @param \TYPO3\CMS\Extbase\Persistence\ObjectStorage $logo
     * @return void
	 */
	public function setLogo(\TYPO3\CMS\Extbase\Persistence\ObjectStorage $logo) {
		$this->logo = $logo;
	}

	/**
	 * Get logo
     *
	 * @return \TYPO3\CMS\Extbase\Persistence\ObjectStorage
	 */
	public function getLogo() {
		return $this->logo;
	}

	/**
	 * @param string $email
	 * @return void
	 */
	public function setEmail($email) {
		$this->email = $email;
	}

	/**
	 * @return string
	 */
	public function getEmail() {
		return $this->email;
	}

	/**
	 * @param integer $clickedThisMonth
	 * @return void
	 */
	public function setClickedThisMonth($clickedThisMonth) {
		$this->clickedThisMonth = $clickedThisMonth;
	}

	/**
	 * @return integer
	 */
	public function getClickedThisMonth() {
		return $this->clickedThisMonth;
	}

	/**
	 * @param string $clickedLastMonth
	 * @return void
	 */
	public function setClickedLastMonth($clickedLastMonth) {
		$this->clickedLastMonth = $clickedLastMonth;
	}

	/**
	 * @return string
	 */
	public function getClickedLastMonth() {
		return $this->clickedLastMonth;
	}

}