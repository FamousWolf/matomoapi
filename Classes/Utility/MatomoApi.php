<?php
namespace FamousWolf\Matomoapi\Utility;

/*
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

use TYPO3\CMS\Core\Utility\GeneralUtility;
use TYPO3\CMS\Core\Utility\HttpUtility;

/**
 * Matomo API Utility
 */
class MatomoApi
{
    /**
     * Execute API call
     *
     * @param string $baseUrl
     * @param array $parameters
     * @return mixed
     */
    static public function executeCall(string $baseUrl, array $parameters)
    {
        $parameters['module'] = 'API';
        $parameters['format'] = 'json';

        $url = rtrim($baseUrl, '?') . '?' . HttpUtility::buildQueryString($parameters);

        return @json_decode(GeneralUtility::getUrl($url));
    }
}
