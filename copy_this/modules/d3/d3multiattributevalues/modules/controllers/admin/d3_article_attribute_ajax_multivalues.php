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
 * @copyright © D³ Data Development, Thomas Dartsch
 * @author    D³ Data Development - Daniel Seifert <ds@shopmodule.com>
 * @link      http://www.oxidmodule.com
 */

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

        $sArtId = oxRegistry::getConfig()->getRequestParameter('oxid');

        if (false == $sArtId) {
            $sAttrViewName = $this->_getViewName('oxattribute');
            $sQAdd = " from {$sAttrViewName} where {$sAttrViewName}.oxid ";
        }

        return $sQAdd;
    }

    /**
     * Saves attribute value
     */
    public function saveAttributeValue()
    {
        $oDb = oxDb::getDb();

        $soxId = oxRegistry::getConfig()->getRequestParameter("oxid");
        $sAttributeId = oxRegistry::getConfig()->getRequestParameter("attr_oxid");

        $sAttributeValue = oxRegistry::getConfig()->getRequestParameter("attr_value");
        $sO2AttributeValue = $oDb->quote(oxRegistry::getConfig()->getRequestParameter("o2attr_oxid"));

        if (!$this->getConfig()->isUtf()) {
            $sAttributeValue = iconv('UTF-8', oxRegistry::getLang()->translateString("charset"), $sAttributeValue);
        }

        $oArticle = oxNew("oxarticle");
        if ($oArticle->load($soxId)) {
            if (isset($sAttributeId) && ("" != $sAttributeId)) {
                $sViewName = $this->_getViewName("oxobject2attribute");
                $sSelect = "select * from {$sViewName} where {$sViewName}.oxid= {$sO2AttributeValue}";
                $oO2A = oxNew("oxi18n");
                $oO2A->setLanguage(oxRegistry::getConfig()->getRequestParameter('editlanguage'));
                $oO2A->init("oxobject2attribute");
                if ($oO2A->assignRecord($sSelect)) {
                    $oO2A->oxobject2attribute__oxvalue->setValue($sAttributeValue);
                    $oO2A->save();
                }
            }
        }
    }
}
