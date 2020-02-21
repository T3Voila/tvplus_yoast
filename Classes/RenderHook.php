<?php

declare(strict_types=1);

namespace Extrameile\EmTvplusYoast;

use Ppi\TemplaVoilaPlus\Controller\BackendLayoutController;
use TYPO3\CMS\Backend\Utility\BackendUtility;
use TYPO3\CMS\Core\Utility\GeneralUtility;

/**
 * Class to add Yoast SEO to the templavoila page module
 * Uses the renderHeaderFunctionHook hook
 */
class RenderHook
{
    /**
     * @SuppressWarnings(PHPMD.UnusedFormalParameter)
     * @return string
     */
    public function renderHeaderFunctionHook(array $params, BackendLayoutController $parentObject)
    {
        /** @var \TYPO3\CMS\Backend\Controller\PageLayoutController $pageLayoutController */
        $GLOBALS['SOBE'] = GeneralUtility::makeInstance(\TYPO3\CMS\Backend\Controller\PageLayoutController::class);
        $GLOBALS['SOBE']->id = $parentObject->id;
        $GLOBALS['SOBE']->current_sys_language = $parentObject->currentLanguageUid;
        $this->getBackendUserAuthentication()->pushModuleData('web_layout', ['language' => $parentObject->currentLanguageUid], 1);

        /** @var \YoastSeoForTypo3\YoastSeo\Backend\PageLayoutHeader $yoast */
        $yoast = GeneralUtility::makeInstance(\YoastSeoForTypo3\YoastSeo\Backend\PageLayoutHeader::class);
        $output = $yoast->render();

        $returnUrlFalse = BackendUtility::getModuleUrl(
            'web_layout',
            ['id' => (int)$parentObject->id]
        );

        $returnUrlTemplaVoila = BackendUtility::getModuleUrl(
            'web_txtemplavoilaplusLayout',
            ['id' => (int)$parentObject->id]
        );

        $returnUrlFalse = \rawurlencode($returnUrlFalse);
        $returnUrlTemplaVoila = \rawurlencode($returnUrlTemplaVoila);

        $output = \str_replace($returnUrlFalse, $returnUrlTemplaVoila, $output);

        return $output;
    }

    /*
     * @return BackendUserAuthentication
     */
    protected static function getBackendUserAuthentication()
    {
        return $GLOBALS['BE_USER'] ?? null;
    }
}
