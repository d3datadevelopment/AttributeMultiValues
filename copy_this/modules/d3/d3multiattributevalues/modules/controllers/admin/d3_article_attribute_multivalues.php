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

class d3_article_attribute_multivalues extends d3_article_attribute_multivalues_parent
{
    /**
     * Collects article attributes and selection lists, passes them to Smarty engine,
     * returns name of template file "article_attribute.tpl".
     *
     * @return string
     */
    public function render()
    {
        $sTplName = parent::render();

        $iAoc = oxRegistry::getConfig()->getRequestParameter("aoc");

        if ($iAoc == 1) {
            $sTplName = "d3_article_attribute_multivalues.tpl";
        }

        return $sTplName;
    }
}
