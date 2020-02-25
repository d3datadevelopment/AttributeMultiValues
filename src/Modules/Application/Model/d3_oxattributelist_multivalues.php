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

namespace D3\Modules\AttributeMultiValues\Application\Model;

class d3_oxattributelist_multivalues extends d3_oxattributelist_multivalues_parent
{
    /**
     * Assign data from array to list
     *
     * @param array $aData data for list
     */
    public function assignArray($aData)
    {
        $this->clear();
        if (count($aData)) {

            $oSaved = clone $this->getBaseObject();

            foreach ($aData as $aItem) {
                $oListObject = clone $oSaved;
                $this->_assignElement($oListObject, $aItem);
                $this->_aArray[] = $oListObject;
            }
        }
    }
}
