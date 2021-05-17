<?php
$EM_CONF[$_EXTKEY] = [
    'title' => 'Matomo API',
    'description' => 'Connect to Matomo API and display results using a Fluid template',
    'category' => 'fe',
    'author' => 'Rudy Gnodde',
    'author_email' => 'rudy@famouswolf.com',
    'author_company' => 'WIND Internet',
    'state' => 'stable',
    'uploadfolder' => false,
    'clearCacheOnLoad' => false,
    'version' => '1.0.1',
    'constraints' => [
        'depends' => [
            'typo3' => '10.4.0-10.4.99',
        ],
        'conflicts' => [
        ],
        'suggests' => [
        ],
    ],
];
