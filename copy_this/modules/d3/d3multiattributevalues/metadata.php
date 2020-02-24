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

/**
 * Metadata version
 */
$sMetadataVersion = '1.1';

/**
 * Module information
 */
$aModule = array(
    'id'          => 'd3multiattributevalues',
    'title'       => (class_exists('d3utils') ? d3utils::getInstance()->getD3Logo() : 'D&sup3;') . ' Mehrfachzuordnungen bei Attributen',
    'description' => array(
        'de' => '',
        'en' => '',
    ),
    'thumbnail'   => 'picture.png',
    'version'     => 'indiv.',
    'author'      => 'D&sup3; Data Development (Inh.: Thomas Dartsch)',
    'email'       => 'support@shopmodule.com',
    'url'         => 'http://www.oxidmodule.com/',
    'extend'      => array(
        'article_attribute_ajax'     => 'd3/d3multiattributevalues/modules/controllers/admin/d3_article_attribute_ajax_multivalues',
        'article_attribute'         => 'd3/d3multiattributevalues/modules/controllers/admin/d3_article_attribute_multivalues',
        'oxattributelist'         => 'd3/d3multiattributevalues/modules/models/d3_oxattributelist_multivalues',
    ),
    'files'       => array(
    ),
    'templates'   => array(
        'd3_article_attribute_multivalues.tpl' => 'd3/d3multiattributevalues/views/admin/tpl/d3_article_attribute_multivalues.tpl',
    ),
    'events'      => array(
        'onActivate' => 'd3install::checkUpdateStart',
    ),
    'settings'    => array(
    ),
    'blocks'      => array(
    ),
    'd3FileRegister'    => array(
        'd3/d3multilang/IntelliSenseHelper.php',
        'd3/d3multilang/metadata.php',
        'd3/d3multilang/views/admin/de/d3_multilang_lang.php',
        'd3/d3multilang/views/admin/en/d3_multilang_lang.php',
        'd3/d3multilang/views/admin/tpl/modcfg-pattern/oxid_lang_file.tpl',
    ),
);