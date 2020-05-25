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

namespace D3\AttributeMultiValues\Modules\Application\Controllers\Admin;

use Exception;
use OxidEsales\Eshop\Application\Model\Article;
use OxidEsales\Eshop\Application\Model\Attribute;
use OxidEsales\Eshop\Core\DatabaseProvider;
use OxidEsales\Eshop\Core\Exception\DatabaseConnectionException;
use OxidEsales\Eshop\Core\Model\MultiLanguageModel;
use OxidEsales\Eshop\Core\Registry;

class d3_article_attribute_ajax_multivalues extends d3_article_attribute_ajax_multivalues_parent
{
    /**
     * Returns SQL query for data to fetc
     *
     * @return string
     */
    protected function _getQuery()
    {
        $sQAdd = parent::_getQuery();

        $sArtId = Registry::getRequest()->getRequestParameter('oxid');

        if (false == $sArtId) {
            /** @var Attribute $attribute */
            $attribute = oxNew(Attribute::class);
            $sAttrViewName = $attribute->getViewName();
            $sQAdd = " from {$sAttrViewName} where {$sAttrViewName}.oxid ";
        }

        return $sQAdd;
    }

    /**
     * Saves attribute value
     *
     * @return void|null
     * @throws DatabaseConnectionException
     * @throws Exception
     */
    public function saveAttributeValue()
    {
        $database = DatabaseProvider::getDb();
        $request = Registry::getRequest();
        $this->resetContentCache();

        $articleId = $request->getRequestParameter("oxid");
        $attributeId = $request->getRequestParameter("attr_oxid");
        $attributeValue = $request->getRequestParameter("attr_value");

        $article = oxNew(Article::class);
        if ($article->load($articleId)) {
            if ($article->isDerived()) {
                return;
            }

            $this->onAttributeValueChange($article);

            if (isset($attributeId) && ("" != $attributeId)) {
                $viewName = $this->_getViewName("oxobject2attribute");
                $quotedArticleId = $database->quote($article->getId());
                // D3: remove unused attrid selection
                $select = "select * from {$viewName} where {$viewName}.oxobjectid= {$quotedArticleId}";
                $objectToAttribute = oxNew(MultiLanguageModel::class);
                $objectToAttribute->setLanguage($request->getRequestParameter('editlanguage'));
                $objectToAttribute->init("oxobject2attribute");
                if ($objectToAttribute->assignRecord($select)) {
                    $objectToAttribute->oxobject2attribute__oxvalue->setValue($attributeValue);
                    $objectToAttribute->save();
                }
            }
        }
    }
}
