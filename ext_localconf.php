<?php
defined('TYPO3_MODE') or die();

if (TYPO3_MODE === 'BE') {
    $GLOBALS['TYPO3_CONF_VARS']['SC_OPTIONS']['templavoilaplus']['PageLayout']['renderHeaderFunctionHook']['t3voila_tvplus_yoast']
        = \T3voila\TvplusYoast\RenderHook::class . '->renderHeaderFunctionHook';
}
