<?php
/**
 * @category   Amconnector
 * @package    Kensium_Amconnector
 * @copyright  Copyright (c) 2016 Kensium Solution Pvt.Ltd. (http://www.kensiumsolutions.com/)
 */

namespace Kensium\Synclog\Block\Adminhtml\Shipment\Renderer;

use Magento\Framework\DataObject;

class ViewButton extends \Magento\Backend\Block\Widget\Grid\Column\Renderer\AbstractRenderer
{
    /**
     * @var \Magento\Backend\Model\Session
     */
    protected $session;

    /**
     * @var \Magento\Backend\Helper\Data
     */
    protected $backendHelper;

    /**
     * @param \Magento\Backend\Model\Session $session
     * @param \Magento\Backend\Helper\Data $backendHelper
     */
    public function __construct(
        \Magento\Backend\Model\Session $session,
        \Magento\Backend\Helper\Data $backendHelper
    )
    {
        $this->session = $session;
        $this->backendHelper = $backendHelper;
    }


    /**
     * @param Varien_Object $row
     * @return string
     */
    public function render(DataObject $row)
    {
        //var_dump($row->getData());
        $rowData = $row->getData();
        //die(var_dump($rowData));
        $url = 'synclog/shipment/detail/id/' . $rowData['id'];

        $url = $this->backendHelper->getUrl($url); //admintml indicates the admin module, rest is the url
        if ($rowData['message_type'] == 'success') {
            $usermsg = "<span style='color:green'>Success</span>";
        } else {
            $usermsg = "<span style='color:red'>Failure</span>";
        }
        echo "<a href='" . $url . "' style='text-decoration:none'>" . $usermsg . "</a>";
    }
}
