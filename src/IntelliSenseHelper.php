<?php

/**
 * This Software is the property of Data Development and is protected
 * by copyright law - it is NOT Freeware.
 *
 * Any unauthorized use of this software without a valid license
 * is a violation of the license agreement and will be prosecuted by
 * civil and criminal law.
 *
 * http://www.shopmodule.com
 *
 * @copyright � D� Data Development, Thomas Dartsch
 * @author    D� Data Development - Daniel Seifert <ds@shopmodule.com>
 * @link      http://www.oxidmodule.com
 */

namespace D3\Modules\AttributeMultiValues\Application\Controllers\Admin {

    use OxidEsales\Eshop\Application\Controller\Admin\ArticleAttributeAjax;

    class d3_article_attribute_ajax_multivalues_parent extends ArticleAttributeAjax {}
}

namespace D3\Modules\AttributeMultiValues\Application\Model {

    use OxidEsales\Eshop\Application\Model\AttributeList;

    class d3_oxattributelist_multivalues_parent extends AttributeList {}
}
