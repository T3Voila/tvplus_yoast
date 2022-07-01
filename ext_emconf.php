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
    'author_email' => 'opitz.alexander@googlemail.com',
    'author_company' => 'T3Voila Team',
    'constraints' => [
        'depends' => [
            'php' => '7.2.0-8.1.99',
            'typo3' => '9.5.0-11.5.99',
            'templavoilaplus' => '8.1.0-8.2.99',
            'yoast_seo' => '7.2.3-8.99.99',
        ],
    ],
];
