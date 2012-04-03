<?php
if (!defined('TYPO3_MODE')) {
	die ('Access denied.');
}

t3lib_extMgm::addStaticFile($_EXTKEY, 'Configuration/TypoScript', 'Comments');

			t3lib_extMgm::addLLrefForTCAdescr('tx_comments_domain_model_comment', 'EXT:comments/Resources/Private/Language/locallang_csh_tx_comments_domain_model_comment.xml');
			t3lib_extMgm::allowTableOnStandardPages('tx_comments_domain_model_comment');
			$TCA['tx_comments_domain_model_comment'] = array(
				'ctrl' => array(
					'title'	=> 'LLL:EXT:comments/Resources/Private/Language/locallang_db.xml:tx_comments_domain_model_comment',
					'label' => 'subject',
					'tstamp' => 'tstamp',
					'crdate' => 'crdate',
					'cruser_id' => 'cruser_id',
					'dividers2tabs' => TRUE,
					'versioningWS' => 2,
					'versioning_followPages' => TRUE,
					'origUid' => 't3_origuid',
					'languageField' => 'sys_language_uid',
					'transOrigPointerField' => 'l10n_parent',
					'transOrigDiffSourceField' => 'l10n_diffsource',
					'delete' => 'deleted',
					'enablecolumns' => array(
						'disabled' => 'hidden',
						'starttime' => 'starttime',
						'endtime' => 'endtime',
					),
					'dynamicConfigFile' => t3lib_extMgm::extPath($_EXTKEY) . 'Configuration/TCA/Comment.php',
					'iconfile' => t3lib_extMgm::extRelPath($_EXTKEY) . 'Resources/Public/Icons/tx_comments_domain_model_comment.gif'
				),
			);

?>