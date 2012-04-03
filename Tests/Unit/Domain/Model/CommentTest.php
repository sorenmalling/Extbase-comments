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
 *  the Free Software Foundation; either version 2 of the License, or
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
 * Test case for class Tx_Comments_Domain_Model_Comment.
 *
 * @version $Id$
 * @copyright Copyright belongs to the respective authors
 * @license http://www.gnu.org/licenses/gpl.html GNU General Public License, version 3 or later
 *
 * @package TYPO3
 * @subpackage Comments
 *
 */
class Tx_Comments_Domain_Model_CommentTest extends Tx_Extbase_Tests_Unit_BaseTestCase {
	/**
	 * @var Tx_Comments_Domain_Model_Comment
	 */
	protected $fixture;

	public function setUp() {
		$this->fixture = new Tx_Comments_Domain_Model_Comment();
	}

	public function tearDown() {
		unset($this->fixture);
	}

	/**
	 * @test
	 */
	public function getSubjectReturnsInitialValueForString() { }

	/**
	 * @test
	 */
	public function setSubjectForStringSetsSubject() { 
		$this->fixture->setSubject('Conceived at T3CON10');

		$this->assertSame(
			'Conceived at T3CON10',
			$this->fixture->getSubject()
		);
	}
	
	/**
	 * @test
	 */
	public function getMessageReturnsInitialValueForString() { }

	/**
	 * @test
	 */
	public function setMessageForStringSetsMessage() { 
		$this->fixture->setMessage('Conceived at T3CON10');

		$this->assertSame(
			'Conceived at T3CON10',
			$this->fixture->getMessage()
		);
	}
	
	/**
	 * @test
	 */
	public function getTargetObjectTypeReturnsInitialValueForString() { }

	/**
	 * @test
	 */
	public function setTargetObjectTypeForStringSetsTargetObjectType() { 
		$this->fixture->setTargetObjectType('Conceived at T3CON10');

		$this->assertSame(
			'Conceived at T3CON10',
			$this->fixture->getTargetObjectType()
		);
	}
	
	/**
	 * @test
	 */
	public function getTargetObjectIdentifierReturnsInitialValueForInteger() { 
		$this->assertSame(
			0,
			$this->fixture->getTargetObjectIdentifier()
		);
	}

	/**
	 * @test
	 */
	public function setTargetObjectIdentifierForIntegerSetsTargetObjectIdentifier() { 
		$this->fixture->setTargetObjectIdentifier(12);

		$this->assertSame(
			12,
			$this->fixture->getTargetObjectIdentifier()
		);
	}
	
}
?>