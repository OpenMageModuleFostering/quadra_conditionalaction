<?php
/**
 * Magento
 *
 * NOTICE OF LICENSE
 *
 * This source file is subject to the Open Software License (OSL 3.0)
 * that is bundled with this package in the file LICENSE.txt.
 * It is also available through the world-wide-web at this URL:
 * http://opensource.org/licenses/osl-3.0.php
 * If you did not receive a copy of the license and are unable to
 * obtain it through the world-wide-web, please send an email
 * to license@magentocommerce.com so we can send you a copy immediately.
 *
 * DISCLAIMER
 *
 * Do not edit or add to this file if you wish to upgrade Magento to newer
 * versions in the future. If you wish to customize Magento for your
 * needs please refer to http://www.magentocommerce.com for more information.
 *
 * @category   Quadra
 * @package    Quadra_ConditionalAction
 * @copyright  Copyright (c) 2009 Quadra Informatique (http://www.quadra-informatique.fr/)
 * @license    http://opensource.org/licenses/osl-3.0.php  Open Software License (OSL 3.0)
 */

/**
 * Grid column widget for rendering conditional action grid cells
 *
 * @category   Quadra
 * @package    Quadra_ConditionalAction
 * @author     Nicolas Fischer <nicolas.fischer@quadra-informatique.fr>
 */
class Quadra_ConditionalAction_Block_Adminhtml_Widget_Grid_Column_Renderer_MultipleAction extends Quadra_ConditionalAction_Block_Adminhtml_Widget_Grid_Column_Renderer_Action
{

    /**
     * Renders column
     *
     * @param Varien_Object $row
     * @return string
     */
    public function render(Varien_Object $row)
    {
		$actions = $this->getColumn()->getActions();
		if ( empty($actions) || !is_array($actions) ) {
		    return '&nbsp';
		}

		if(sizeof($actions)==1 && !$this->getColumn()->getNoLink()) {
		    foreach ($actions as $action){
                if ( is_array($action) ) {
                    return $this->_toLinkHtml($action, $row);
            	}
            }
		}

		$out = '';
		$i = 0;
        foreach ($actions as $action){
            $i++;
        	if ( is_array($action) ) {
				$display = true;
				if (array_key_exists('condition', $action)) {
					$conditions = $action['condition'];
					foreach ($conditions as $condition) {
						if (is_array($condition)) {
							$display = $display && $this->_checkCondition($row, $condition);
						} else {
							$display = $this->_checkCondition($row, $conditions);
							break;
						}
					}
				}

				if ($display) {
	                $out .= $this->_toLinkHtml($action, $row).'<br>';
				}
        	}
        }

		return $out;
    }

}
