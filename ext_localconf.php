<?php
defined('TYPO3_MODE') or die();

\TYPO3\CMS\Extbase\Utility\ExtensionUtility::configurePlugin(
    'FamousWolf.matomoapi',
    'Matomo',
    [
        \FamousWolf\Matomoapi\Controller\MatomoController::class => 'show'
    ],
    [
        \FamousWolf\Matomoapi\Controller\MatomoController::class => 'show'
    ]
);