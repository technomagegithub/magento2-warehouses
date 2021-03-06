<?php
/**
 * EaDesgin
 *
 * NOTICE OF LICENSE
 *
 * This source file is subject to the Academic Free License (AFL 3.0)
 * that is bundled with this package in the file LICENSE_AFL.txt.
 * It is also available through the world-wide-web at this URL:
 * http://opensource.org/licenses/afl-3.0.php
 * If you did not receive a copy of the license and are unable to
 * obtain it through the world-wide-web, please send an email
 * to license@eadesign.ro so we can send you a copy immediately.
 *
 * @category    eadesigndev_pdfgenerator
 * @copyright   Copyright (c) 2008-2016 EaDesign by Eco Active S.R.L.
 * @license     http://opensource.org/licenses/afl-3.0.php  Academic Free License (AFL 3.0)
 */

namespace Eadesigndev\Warehouses\Block\Adminhtml\Warehouses\Edit;

use Magento\Framework\View\Element\UiComponent\Control\ButtonProviderInterface;

/**
 * Class DeleteButton
 */
class DeleteButton extends GenericButton implements ButtonProviderInterface
{

    /**
     * @return array
     */
    public function getButtonData()
    {
        if ($this->_isAllowedAction(\Eadesigndev\Warehouses\Controller\Adminhtml\Warehouses::ADMIN_RESOURCE_SAVE)) {
            $data = [];
            if ($this->getWarehousesId()) {
                $data = [
                    'label' => __('Delete Warehouse'),
                    'class' => 'delete',
                    'on_click' => 'deleteConfirm(\'' . __(
                            'Are you sure you want to do this?'
                        ) . '\', \'' . $this->getDeleteUrl() . '\')',
                    'sort_order' => 20,
                ];
            }
            return $data;
        }
    }

    /**
     * @return string
     */
    public function getDeleteUrl()
    {
        return $this->getUrl('*/*/delete', ['Warehouses_id' => $this->getTemplateId()]);
    }
}
