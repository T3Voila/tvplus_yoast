<?php

declare(strict_types=1);

namespace T3voila\TvplusYoast;

use Tvp\TemplaVoilaPlus\Controller\Backend\PageLayoutController;
use TYPO3\CMS\Backend\Controller\PageLayoutController as CorePageLayoutController;
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
    public function renderHeaderFunctionHook(array $params, PageLayoutController $parentObject)
    {
        /** @var CorePageLayoutController $pageLayoutController */
        $pageLayout = GeneralUtility::makeInstance(CorePageLayoutController::class);
        $pageLayout->id = $parentObject->getCurrentPageUid();
        $pageLayout->pageinfo = $parentObject->getCurrentPageInfo();
        $pageLayout->MOD_SETTINGS = [
            'function' => 1,
            'language' => $parentObject->getCurrentLanguageUid(),
        ];
        $this->getBackendUserAuthentication()->pushModuleData('web_layout', ['language' => $parentObject->getCurrentLanguageUid()], 1);

        /** @var \YoastSeoForTypo3\YoastSeo\Backend\PageLayoutHeader $yoast */
        $yoast = GeneralUtility::makeInstance(\YoastSeoForTypo3\YoastSeo\Backend\PageLayoutHeader::class);
        $output = $yoast->render([], $pageLayout);

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
