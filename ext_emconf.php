<?php
$EM_CONF[$_EXTKEY] = [
    'title' => 'TemplaVoilà! Plus - Yoast SEO',
    'description' => 'Integration of TYPO3 Yoast SEO into TemplaVoilà! Plus page layout module.',
    'category' => 'misc',
    'version' => '1.0.0',
    'state' => 'stable',
    'uploadfolder' => 0,
    'clearCacheOnLoad' => 0,
    'author' => 'Alexander Opitz',
    'author_email' => 'opitz@extrameile-gehen.de',
    'author_company' => 'Extrameile GmbH',
    'constraints' => [
        'depends' => [
            'php' => '5.5.0-7.4.99',
            'typo3' => '7.6.0-9.5.99',
            'templavoilaplus' => '7.1.3-7.99.99',
            'yoast_seo' => '1.1.0-5.99.99',
        ],
        'conflicts' => [
            'ppi_templavoilaplus_yoast' => ''
        ],
    ],
];
