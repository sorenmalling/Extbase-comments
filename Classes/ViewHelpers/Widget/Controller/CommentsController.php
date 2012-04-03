<?php

class Tx_Comments_ViewHelpers_Widget_Controller_CommentsController extends Tx_Fluid_Core_Widget_AbstractWidgetController {

	/**
	 * @var Tx_Comments_Domain_Repository_CommentRepository
	 */
	protected $commentRepository;

	/**
	 * @var Tx_Extbase_Persistence_ManagerInterface
	 */
	protected $persistenceManager;

	/**
	 * @var array
	 */
	protected $settings;

	/**
	 * @var string
	 */
	protected $targetObjectType;

	/**
	 * @var string
	 */
	protected $targetObjectIdentifier;

	/**
	 * Inject comment repository
	 *
	 * @param Tx_Comments_Domain_Repository_CommentRepository $commentRepository
	 */
	public function injectCommentRepository(Tx_Comments_Domain_Repository_CommentRepository $commentRepository) {
		$this->commentRepository = $commentRepository;
	}

	/**
	 * Inject persistence manager
	 *
	 * @param Tx_Extbase_Persistence_ManagerInterface $persistenceManager
	 */
	public function injectPersistenceManager(Tx_Extbase_Persistence_ManagerInterface $persistenceManager) {
		$this->persistenceManager = $persistenceManager;
	}

	/**
	 * @param array $settings
	 */
	public function injectSettings(array $settings) {
		$this->settings = $settings;
	}

	/**
	 * @return void
	 */
	protected function initializeAction() {
		$this->targetObjectType = $this->widgetConfiguration['targetObjectType'];
		$this->targetObjectIdentifier = $this->widgetConfiguration['targetObjectIdentifier'];
	}

	/**
	 * @return void
	 */
	public function indexAction() {
		$comments = $this->commentRepository->findByTargetObjectTypeAndIdentifier($this->targetObjectType, $this->targetObjectIdentifier);
		$this->view->assign('comments', $comments);
	}

	/**
	 * In case newComment.author is an array, it's assumed to be intended as TYPO3.Party\Domain\Model\Person
	 * which should automatically be property-mapped.
	 * The other case might be a string, hence an object identifier that would be mapped anyways.
	 *
	 * @return void
	 */
	public function initializeCreateAction() {
		/*$genericCommentArgument = $this->request->getArgument('newComment');
		if (is_array($genericCommentArgument['author'])) {
			$this->arguments['newComment']->getPropertyMappingConfiguration()->setTargetTypeForSubProperty('author', 'TYPO3\Party\Domain\Model\Person');
			$this->arguments['newComment']->getPropertyMappingConfiguration()->allowCreationForSubProperty('author');
			$this->arguments['newComment']->getPropertyMappingConfiguration()->allowCreationForSubProperty('author.name');
			$this->arguments['newComment']->getPropertyMappingConfiguration()->allowCreationForSubProperty('author.primaryElectronicAddress');
		}*/
	}

	/**
	 * Adds the given new comment object to the comment repository.
	 * The author of the new comment can be supplied with two variants:
	 * either as array containing name.firstName and
	 * primaryElectronicAddress.identifier, .type and .usage; or as string representing
	 * an existing party. In both cases the property mapper already did its work
	 * providing a correct author property in $newComment.
	 *
	 * @param Tx_Comments_Domain_Model_Comment $newComment A new comment to add
	 * @return void
	 */
	public function createAction(Tx_Comments_Domain_Model_Comment $newComment) {
		$newComment->setTargetObjectType($this->targetObjectType);
		$newComment->setTargetObjectIdentifier($this->targetObjectIdentifier);

		$this->commentRepository->add($newComment);
		$this->view->assign('newComment', $newComment);

		$this->persistenceManager->persistAll();

		$comments = $this->commentRepository->findByTargetObjectTypeAndIdentifier($this->targetObjectType, $this->targetObjectIdentifier);
		$this->view->assign('comments', $comments);
	}
}
?>