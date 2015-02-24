<?php
namespace Datec\DatecLosungen\Controller;

/***************************************************************
 *  Copyright notice
 *
 *  (c) 2014
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
 * @package datec_losungen
 * @license http://www.gnu.org/licenses/gpl.html GNU General Public License, version 3 or later
 */
class LosungenController extends \TYPO3\CMS\Extbase\Mvc\Controller\ActionController {
	
	/**
	 * $extKey
	 */
	protected $extKey;
	
	/**
	 * $losungenFileService
	 *
	 * @var \Datec\DatecLosungen\Services\LosungenFileService
	 * @inject
	 */
	protected $losungenFileService;
	
	/**
	 * initialize current action
	 * @return void
	 */
	public function initializeAction() {
		$this->extKey = $this->request->getControllerExtensionKey();
		
	}
	
	/**
	 * action showLosung
	 * 
	 * @return void
	 */
	public function showLosungAction() {		
		$losungResult = $this->losungenFileService->getCurrentLosung();
		if ($losungResult->code == 'OK' && isset($losungResult->losung)) {
			$this->view->assign('losung', $losungResult->losung);
		} else {
			if (empty($losungResult->message)) {				
				$this->flashMessageContainer->add(\TYPO3\CMS\Extbase\Utility\LocalizationUtility::translate('tx_dateclosungen.errors.unknown', $this->extKey), '', \TYPO3\CMS\Core\Messaging\FlashMessage::ERROR);
			} else {
				$this->flashMessageContainer->add($losungResult->message, '', \TYPO3\CMS\Core\Messaging\FlashMessage::ERROR);
			}
				
		}
		
		$this->view->assign('settings', $this->settings);
	}
	
}
?>