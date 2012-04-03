<?php
	/**
	 * Usage:
	 * <c:widget.comments object="{object}">
	 */
	class Tx_Comments_ViewHelpers_Widget_CommentsViewHelper extends Tx_Fluid_Core_Widget_AbstractWidgetViewHelper {
		/**
		 * @var bool
		 */
		protected $ajaxWidget = TRUE;

		/**
		 * @var bool
		 */
		protected $storeConfigurationInSession = FALSE;

		/**
		 * @var Tx_Comments_ViewHelpers_Widget_Controller_CommentsController
		 */
		protected $controller;

		/**
		 * @var Tx_Extbase_Persistence_IdentityMap
		 */
		protected $identityMap;

		/**
		 * Inject comments controller
		 *
		 * @param Tx_Comments_ViewHelpers_Widget_Controller_CommentsController $commentsController
		 */
		public function injectCommentsController(Tx_Comments_ViewHelpers_Widget_Controller_CommentsController $commentsController) {
			$this->controller = $commentsController;
		}

		/**
		 * Inject persistence manager
		 *
		 * @param Tx_Extbase_Persistence_IdentityMap $identityMap
		 */
		public function injectIdentityMap(Tx_Extbase_Persistence_IdentityMap $identityMap) {
			$this->identityMap = $identityMap;
		}

		/**
		 * Only store target object type and identifier in the configuration
		 *
		 * @return array
		 */
		protected function getWidgetConfiguration() {
			$widgetConfiguration = array();
			if (isset($this->arguments['object'])) {
				$targetObject = $this->arguments['object'];
				$widgetConfiguration['targetObjectType'] = get_class($targetObject);
				$widgetConfiguration['targetObjectIdentifier'] = $this->identityMap->getIdentifierByObject($targetObject);
			} else {
				$widgetConfiguration['targetObjectType'] = $this->arguments['targetObjectType'];
				$widgetConfiguration['targetObjectIdentifier'] = $this->arguments['targetObjectIdentifier'];
			}
			return $widgetConfiguration;
		}

		/**
		 * @param object $object
		 * @param string $targetObjectType
		 * @param string $targetObjectIdentifier
		 * @return string
		 */
		public function render($object = NULL, $targetObjectType = NULL, $targetObjectIdentifier = NULL) {
			if ($object === NULL && ($targetObjectType === NULL || $targetObjectIdentifier === NULL)) {
				throw new Tx_Fluid_Core_Exception('If you don\'t set the "object" argument, you have to specify "targetObjectType" AND "targetObjectIdentifier".' , 1319546528);
			}
			return $this->initiateSubRequest();
		}
	}
?>
