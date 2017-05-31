<?php
namespace PSchriner\FalPerformance\Resource;

/**
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
use \TYPO3\CMS\Core\Utility\GeneralUtility;

class ResourceStorage extends \TYPO3\CMS\Core\Resource\ResourceStorage
{

    /**
     * We re-add the parent of the processing folder as it would be listed otherwise
     */
    public function getProcessingFolders()
    {
        if ($this->processingFolders === null) {
            parent::getProcessingFolders();
            if (isset($this->processingFolder)) {
                $this->processingFolders[] = $this->processingFolder->getParentFolder();
            }
        }
        return $this->processingFolders;
    }

    /**
     * For performance reasons this will be a randomized subfolder of the "normal" processing folder
     */
    public function getProcessingFolder()
    {
        if (!isset($this->processingFolder)) {
            $normalProcessingFolder = parent::getProcessingFolder();
            $randomString = substr(md5(microtime()), mt_rand(0, 29), 2);
            try {
                $this->processingFolder = $this->createFolder($randomString, $normalProcessingFolder);
            } catch (\Exception $e) {
                GeneralUtility::sysLog($e->__toString(), 'fal_performance', GeneralUtility::SYSLOG_SEVERITY_ERROR);
            }
        }
        return $this->processingFolder;
    }
}

