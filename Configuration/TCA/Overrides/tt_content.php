<?php


/*
 * This file is part of the package ku_accordions.
 *
 * For the full copyright and license information, please read the
 * LICENSE file that was distributed with this source code.
 */

 defined('TYPO3') or die('Access denied.');

 // Add Content Element
 if (!is_array($GLOBALS['TCA']['tt_content']['types']['ku-accordions'] ?? false)) {
     $GLOBALS['TCA']['tt_content']['types']['ku-accordions'] = [];
 }

// KU accordions
\TYPO3\CMS\Core\Utility\GeneralUtility::makeInstance(\B13\Container\Tca\Registry::class)->configureContainer(
    (
        new \B13\Container\Tca\ContainerConfiguration(
            'ku_accordions', // CType
            'LLL:EXT:ku_accordions/Resources/Private/Language/locallang_be.xlf:label', // label
            'LLL:EXT:ku_accordions/Resources/Private/Language/locallang_be.xlf:description', // description
            [
                [
                    ['name' => 'LLL:EXT:ku_accordions/Resources/Private/Language/locallang_be.xlf:add_content', 'colPos' => 203, 'allowed' => ['CType' => 'text, textmedia, textpic, image']]
                ]
            ] // grid configuration
        )
    )
    ->setIcon('ku-accordions-icon')
);

// Configure element type
$GLOBALS['TCA']['tt_content']['types']['ku_accordions'] = array_replace_recursive(
    $GLOBALS['TCA']['tt_content']['types']['ku_accordions'],
    [
        'showitem' => '
            --div--;LLL:EXT:core/Resources/Private/Language/Form/locallang_tabs.xlf:general,
                --palette--;LLL:EXT:frontend/Resources/Private/Language/locallang_ttc.xlf:palette.general;general,
                --palette--;LLL:EXT:frontend/Resources/Private/Language/locallang_ttc.xlf:palette.headers;headers,
            --div--;LLL:EXT:ku_accordions/Resources/Private/Language/locallang_be.xlf:options,
                pi_flexform;LLL:EXT:bootstrap_package/Resources/Private/Language/Backend.xlf:advanced,
            --div--;LLL:EXT:frontend/Resources/Private/Language/locallang_ttc.xlf:tabs.appearance,
                --palette--;LLL:EXT:frontend/Resources/Private/Language/locallang_ttc.xlf:palette.frames;frames,
                --palette--;LLL:EXT:frontend/Resources/Private/Language/locallang_ttc.xlf:palette.appearanceLinks;appearanceLinks,
            --div--;LLL:EXT:core/Resources/Private/Language/Form/locallang_tabs.xlf:language,
                --palette--;;language,
            --div--;LLL:EXT:core/Resources/Private/Language/Form/locallang_tabs.xlf:access,
                --palette--;;hidden,
                --palette--;LLL:EXT:frontend/Resources/Private/Language/locallang_ttc.xlf:palette.access;access,
            --div--;LLL:EXT:core/Resources/Private/Language/Form/locallang_tabs.xlf:categories,
                categories,
            --div--;LLL:EXT:core/Resources/Private/Language/Form/locallang_tabs.xlf:notes,
                rowDescription,
            --div--;LLL:EXT:core/Resources/Private/Language/Form/locallang_tabs.xlf:extended,
        '
    ]
);

// Add flexForms for content element configuration
\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addPiFlexFormValue(
    '*',
    'FILE:EXT:ku_accordions/Configuration/FlexForms/KuAccordions.xml',
    'ku_accordions' // CType
);
