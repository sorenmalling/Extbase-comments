<?php

/***************************************************************
 *  Copyright notice
 *
 *  (c) 2012 
 *  All rights reserved
 *
 *  This script is part of the TYPO3 project. The TYPO3 project is
 *  free software; you can redistribute it and/or modify
 *  it under the terms of the GNU General Public License as published by
 *  the Free Software Foundation; either version 3 of the License, or
 *  (at your option) any later version.
 *
 *  The GNU General Public License can be found at
 *  http://www.gnu.org/copyleft/gpl.html.
 *
 *  This script is distributed in the hope that it will be useful,
 *  but WITHOUT ANY WARRANTY; without even the implied warranty of
 *  MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
 *  GNU General Public License for more details.
 *
 *  This copyright notice MUST APPEAR in all copies of the script!
 ***************************************************************/

/**
 *
 *
 * @package comments
 * @license http://www.gnu.org/licenses/gpl.html GNU General Public License, version 3 or later
 *
 */
class Tx_Comments_Domain_Model_Comment extends Tx_Extbase_DomainObject_AbstractEntity {

	/**
	 * subject
	 *
	 * @var string
	 */
	protected $subject;

	/**
	 * message
	 *
	 * @var string
	 * @validate NotEmpty
	 */
	protected $message;

	/**
	 * targetObjectType
	 *
	 * @var string
	 * @validate NotEmpty
	 */
	protected $targetObjectType;

	/**
	 * targetObjectIdentifier
	 *
	 * @var integer
	 * @validate NotEmpty
	 */
	protected $targetObjectIdentifier;

	/**
	 * Returns the subject
	 *
	 * @return string $subject
	 */
	public function getSubject() {
		return $this->subject;
	}

	/**
	 * Sets the subject
	 *
	 * @param string $subject
	 * @return void
	 */
	public function setSubject($subject) {
		$this->subject = $subject;
	}

	/**
	 * Returns the message
	 *
	 * @return string $message
	 */
	public function getMessage() {
		return $this->message;
	}

	/**
	 * Sets the message
	 *
	 * @param string $message
	 * @return void
	 */
	public function setMessage($message) {
		$this->message = $message;
	}

	/**
	 * Returns the targetObjectType
	 *
	 * @return string $targetObjectType
	 */
	public function getTargetObjectType() {
		return $this->targetObjectType;
	}

	/**
	 * Sets the targetObjectType
	 *
	 * @param string $targetObjectType
	 * @return void
	 */
	public function setTargetObjectType($targetObjectType) {
		$this->targetObjectType = $targetObjectType;
	}

	/**
	 * Returns the targetObjectIdentifier
	 *
	 * @return integer $targetObjectIdentifier
	 */
	public function getTargetObjectIdentifier() {
		return $this->targetObjectIdentifier;
	}

	/**
	 * Sets the targetObjectIdentifier
	 *
	 * @param integer $targetObjectIdentifier
	 * @return void
	 */
	public function setTargetObjectIdentifier($targetObjectIdentifier) {
		$this->targetObjectIdentifier = $targetObjectIdentifier;
	}

}
?>