<?php

/**
 * This Software is the property of Data Development and is protected
 * by copyright law - it is NOT Freeware.
 * Any unauthorized use of this software without a valid license
 * is a violation of the license agreement and will be prosecuted by
 * civil and criminal law.
 * http://www.shopmodule.com
 *
 * @copyright (C) D3 Data Development (Inh. Thomas Dartsch)
 * @author    D3 Data Development - Daniel Seifert <support@shopmodule.com>
 * @link      http://www.oxidmodule.com
 */

use D3\AttributeMultiValues\Modules\Application\Controllers\Admin\d3_article_attribute_ajax_multivalues;
use D3\AttributeMultiValues\Modules\Application\Model\d3_oxattributelist_multivalues;
use OxidEsales\Eshop\Application\Controller\Admin\ArticleAttributeAjax;
use OxidEsales\Eshop\Application\Model\AttributeList;

/**
 * Metadata version
 */
$sMetadataVersion = '2.1';

/**
 * Module information
 */
$aModule = array(
    'id'          => 'd3attributemultivalues',
    'title'       => 'D&sup3; mehrfache Wertezuordnung zu Attributen',
    'version'     => '0.0.0.1',
    'author'      => 'D&sup3; Data Development (Inh.: Thomas Dartsch)',
    'email'       => 'support@shopmodule.com',
    'url'         => 'http://www.oxidmodule.com/',
    'extend'      => [
        ArticleAttributeAjax::class     => d3_article_attribute_ajax_multivalues::class,
        AttributeList::class            => d3_oxattributelist_multivalues::class,
    ]
);