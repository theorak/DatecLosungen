<?php
namespace Datec\DatecLosungen\Services;

/**
 *
 * @package datec_losungen
 * @license http://www.gnu.org/licenses/gpl.html GNU General Public License, version 3 or later
 *
 */
class LosungenFileService implements \TYPO3\CMS\Core\SingletonInterface  {
	
	/**
	 * settings
	 */
	protected $settings;
	
	/**
	 * @var \TYPO3\CMS\Extbase\Configuration\ConfigurationManagerInterface
	 * @inject
	 */
	protected $configurationManager;
	
	/**
	 * @return void
	 */
	public function initializeObject() {
		$this->settings = $this->configurationManager->getConfiguration(\TYPO3\CMS\Extbase\Configuration\ConfigurationManagerInterface::CONFIGURATION_TYPE_SETTINGS,'DatecLosungen','Losungen');
		
	}
	
	/**
	 * @return \stdClass $result
	 */
	public function getCurrentLosung() {
		$result = new \stdClass();
		$result->code = 'OK';
		
		$today = getdate();
		$result = $this->setupLosungenFile($result, $today['year']);
		
		if ($result->code == 'OK' && isset($result->xmlData)) {
			if (isset($this->settings['xmlConf']['xmlTree']) && array_search("", $this->settings['xmlConf']['xmlTree']) === FALSE) {				
				$rootNode = $this->settings['xmlConf']['xmlTree']['rootNode'];
				$treeNode = $this->settings['xmlConf']['xmlTree']['treeNode'];	
				$branchDate = $this->settings['xmlConf']['xmlTree']['branchDate'];				
				$branchWeekday = $this->settings['xmlConf']['xmlTree']['branchWeekday'];
				$branchSunday = $this->settings['xmlConf']['xmlTree']['branchSunday'];
				$branchWatchwordText = $this->settings['xmlConf']['xmlTree']['branchWatchwordText'];
				$branchWatchwordVerse = $this->settings['xmlConf']['xmlTree']['branchWatchwordVerse'];			
				$branchDidactictextText = $this->settings['xmlConf']['xmlTree']['branchDidactictextText'];
				$branchDidactictextVerse = $this->settings['xmlConf']['xmlTree']['branchDidactictextVerse'];
				
				$losungData = $result->xmlData[$rootNode]['0']['ch'][$treeNode][$today['yday']]['ch'];
				if ($losungData) {					
					$losung = new \stdClass();
					$losung->date = $losungData[$branchDate]['0']['values']['0'];					
					$losung->weekday = $losungData[$branchWeekday]['0']['values']['0'];					
					$losung->sunday = $losungData[$branchSunday]['0']['values']['0'];
					$losung->watchwordText = $this->charset_handling($losungData[$branchWatchwordText]['0']['values']['0']);
					$losung->watchwordVerse = $this->charset_handling($losungData[$branchWatchwordVerse]['0']['values']['0']);
					$losung->didactictextText = $this->charset_handling($losungData[$branchDidactictextText]['0']['values']['0']);
					$losung->didactictextVerse = $this->charset_handling($losungData[$branchDidactictextVerse]['0']['values']['0']);
					
					$result->losung = $losung;
				} else {
					$result->code = 'ERROR';
					$result->message = \TYPO3\CMS\Extbase\Utility\LocalizationUtility::translate('tx_dateclosungen.errors.watchwordNotLoaded', 'datec_losungen');
				}
			} else {
				$result->code = 'ERROR';
				$result->message = \TYPO3\CMS\Extbase\Utility\LocalizationUtility::translate('tx_dateclosungen.errors.configurationError', 'datec_losungen');
			}
		}
		
		
		return $result;
	}
	
	/**
	 * loads watchwords XML file from temp or downloads zip with current information
	 * 
	 * @param \stdClass $result the object to put results in
	 * @param string|int $year the year the file is for
	 * 
	 * return \stdClass $result
	 */
	public function setupLosungenFile($result, $year) {		
		if (isset($this->settings['xmlConf']) && array_search("", $this->settings['xmlConf']) === FALSE) {		
			$zipFileName = str_ireplace('YEAR', $year, $this->settings['xmlConf']['zipName']);
			$zipPath = PATH_site.'typo3temp/tx_dateclosungen/'.$zipFileName;
			$xmlFileName = str_ireplace('YEAR', $year, $this->settings['xmlConf']['xmlName']);
			$xmlPath = PATH_site.'typo3temp/tx_dateclosungen/'.$xmlFileName;
			
			if (!file_exists($xmlPath)) { // the file is not in temp, request zip download
				$zipUrl = $this->settings['xmlConf']['serverUrl'].$zipFileName;
				
				$zipContent = \TYPO3\CMS\Core\Utility\GeneralUtility::getUrl($zipUrl);
				if ($zipContent) {
					$save = \TYPO3\CMS\Core\Utility\GeneralUtility::writeFileToTypo3tempDir($zipPath, $zipContent);
					if ($save === NULL) {						
						$zip = new \ZipArchive();
						$res = $zip->open($zipPath);
						if ($res) {
							$unzip = $zip->extractTo(PATH_site.'typo3temp/tx_dateclosungen/');
							if (!$unzip) {
								$result->code = 'ERROR';
								$result->message = \TYPO3\CMS\Extbase\Utility\LocalizationUtility::translate('tx_dateclosungen.errors.fileErrors.zipFileNotUnpacked', 'datec_losungen');
								return $result;
							}
							$zip->close();
						} else {
							$result->code = 'ERROR';
							$result->message = \TYPO3\CMS\Extbase\Utility\LocalizationUtility::translate('tx_dateclosungen.errors.fileErrors.zipFileNotReadable', 'datec_losungen');
							return $result;
						}
					} else {						
						\TYPO3\CMS\Core\Utility\GeneralUtility::devLog($save, 'datec_losungen', 2);
						$result->code = 'ERROR';
						$result->message = \TYPO3\CMS\Extbase\Utility\LocalizationUtility::translate('tx_dateclosungen.errors.fileErrors.zipFileNotSaved', 'datec_losungen');
						return $result;
					}
				} else {
					$result->code = 'ERROR';
					$result->message = \TYPO3\CMS\Extbase\Utility\LocalizationUtility::translate('tx_dateclosungen.errors.fileErrors.zipFileNotFound', 'datec_losungen');
					return $result;
				}
			}
			
			if (file_exists($xmlPath)) {
				$xmlFile = \TYPO3\CMS\Core\Utility\GeneralUtility::getURL($xmlPath);
				$result->xmlData = \TYPO3\CMS\Core\Utility\GeneralUtility::xml2tree($xmlFile);
				// that's the success case		
			} else {
				$result->code = 'ERROR';
				$result->message = \TYPO3\CMS\Extbase\Utility\LocalizationUtility::translate('tx_dateclosungen.errors.fileErrors.xmlFileNotFound', 'datec_losungen');
			}			
		} else {
			$result->code = 'ERROR';
			$result->message = \TYPO3\CMS\Extbase\Utility\LocalizationUtility::translate('tx_dateclosungen.errors.configurationError', 'datec_losungen');
		}		
		
		return $result;
	}
	
	/**
	 * decodes string based on encoding setting
	 * 
	 * @param string $string
	 */
	private function charset_handling($string) {
		if ($this->settings['encoding'] == 'iso')
			return utf8_decode($string);
		else
			return $string;
	}	
	
}
?>