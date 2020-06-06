<?php
namespace FamousWolf\Matomoapi\Controller;

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

use FamousWolf\Matomoapi\Utility\MatomoApi;
use TYPO3\CMS\Extbase\Mvc\Controller\ActionController;

/**
 * Matomo Controller
 */
class MatomoController extends ActionController
{
    /**
     * Show action
     */
    public function showAction(): void
    {
        $parameters = [
            'token_auth' => $this->settings['tokenAuth'],
            'method' => $this->settings['method'],
        ];

        if (!empty($this->settings['parameters']) && is_array($this->settings['parameters'])) {
            foreach ($this->settings['parameters'] as $key => $parameter) {
                if (!is_array($parameter)) {
                    $parameter = [
                        'key' => $key,
                        'value' => $parameter,
                    ];
		}

                $parameters[(string)$parameter['key']] = (string)$parameter['value'];
            }
        }

        $this->view->assign('data', MatomoApi::executeCall($this->settings['apiUrl'], $parameters));
    }
}
