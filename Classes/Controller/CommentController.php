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
class Tx_Comments_Controller_CommentController extends Tx_Extbase_MVC_Controller_ActionController {

	/**
	 * commentRepository
	 *
	 * @var Tx_Comments_Domain_Repository_CommentRepository
	 */
	protected $commentRepository;

	/**
	 * injectCommentRepository
	 *
	 * @param Tx_Comments_Domain_Repository_CommentRepository $commentRepository
	 * @return void
	 */
	public function injectCommentRepository(Tx_Comments_Domain_Repository_CommentRepository $commentRepository) {
		$this->commentRepository = $commentRepository;
	}

	/**
	 * action list
	 *
	 * @return void
	 */
	public function listAction() {
		$comments = $this->commentRepository->findAll();
		$this->view->assign('comments', $comments);
	}

	/**
	 * action show
	 *
	 * @param $comment
	 * @return void
	 */
	public function showAction(Tx_Comments_Domain_Model_Comment $comment) {
		$this->view->assign('comment', $comment);
	}

	/**
	 * action new
	 *
	 * @param $newComment
	 * @dontvalidate $newComment
	 * @return void
	 */
	public function newAction(Tx_Comments_Domain_Model_Comment $newComment = NULL) {
		$this->view->assign('newComment', $newComment);
	}

	/**
	 * action create
	 *
	 * @param $newComment
	 * @return void
	 */
	public function createAction(Tx_Comments_Domain_Model_Comment $newComment) {
		$this->commentRepository->add($newComment);
		$this->flashMessageContainer->add('Your new Comment was created.');
		$this->redirect('list');
	}

	/**
	 * action edit
	 *
	 * @param $comment
	 * @return void
	 */
	public function editAction(Tx_Comments_Domain_Model_Comment $comment) {
		$this->view->assign('comment', $comment);
	}

	/**
	 * action update
	 *
	 * @param $comment
	 * @return void
	 */
	public function updateAction(Tx_Comments_Domain_Model_Comment $comment) {
		$this->commentRepository->update($comment);
		$this->flashMessageContainer->add('Your Comment was updated.');
		$this->redirect('list');
	}

	/**
	 * action delete
	 *
	 * @param $comment
	 * @return void
	 */
	public function deleteAction(Tx_Comments_Domain_Model_Comment $comment) {
		$this->commentRepository->remove($comment);
		$this->flashMessageContainer->add('Your Comment was removed.');
		$this->redirect('list');
	}

}
?>