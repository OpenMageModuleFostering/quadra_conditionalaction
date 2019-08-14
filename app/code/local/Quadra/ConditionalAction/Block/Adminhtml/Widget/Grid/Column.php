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
 * Grid column block
 *
 * @category   Quadra
 * @package    Quadra_ConditionalAction
 * @author     Nicolas Fischer <nicolas.fischer@quadra-informatique.fr>
 */
class Quadra_ConditionalAction_Block_Adminhtml_Widget_Grid_Column extends Mage_Adminhtml_Block_Widget_Grid_Column
{
 
    protected function _getRendererByType()
    {
        switch (strtolower($this->getType())) {
            case 'multipleaction':
                $rendererClass = 'conditionalaction/adminhtml_widget_grid_column_renderer_multipleAction';
                break;
            default:
                $rendererClass = parent::_getRendererByType();
                break;
        }
        return $rendererClass;
    }

}
