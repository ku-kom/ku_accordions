<?php

/*
 * This file is part of the package ku_accordions.
 * For the full copyright and license information, please read the
 * LICENSE file that was distributed with this source code.
 * Sep 2022 Nanna Ellegaard, University of Copenhagen.
 */

/**
 * Icon registry
 */

defined('TYPO3_MODE') || die();

return [
    // icon identifier
    'ku-accordions-icon' => [
        'provider' => \TYPO3\CMS\Core\Imaging\IconProvider\SvgIconProvider::class,
        'source' => 'EXT:ku_accordions/Resources/Public/Icons/Extension.svg',
    ],
];
