<?php
/**
 * @category   Amconnector
 * @package    Kensium_Amconnector
 * @copyright  Copyright (c) 2016 Kensium Solution Pvt.Ltd. (http://www.kensiumsolutions.com/)
 */
namespace Kensium\Amconnector\Controller\Adminhtml\Log;

use Magento\Backend\App\Action;
use Magento\Backend\App\Action\Context;
use Magento\Framework\View\Result\PageFactory;
use Magento\Framework\App\Config\ScopeConfigInterface;
use Kensium\Amconnector\Helper\Data;
class FailedOrder extends \Kensium\Amconnector\Controller\Adminhtml\Log\AbstractLog
{
    /**
     * Index action
     *
     * @return \Magento\Backend\Model\View\Result\Page
     */
    public function execute()
    {
        $data['logUrl'] = $this->createLogFile();
        $data['logPath'] = $this->getLogPath();
        $data['ajaxLogUrl'] = $this->getUrl('amconnector/log/ajaxLog');
        $data['syncStop']= $this->scopeConfigInterface->getValue('amconnectorsync/ordersync/syncstop');
        $data['path'] = "amconnectorsync/ordersync/syncstop";
        $data['pubStaticUrl']=$this->storeManager->getStore()
            ->getBaseUrl(\Magento\Framework\UrlInterface::URL_TYPE_STATIC);
        $data['stopSyncUrl']= $this->backendHelper->getUrl('amconnector/sync/sync');

        $resultPage = $this->resultPageFactory->create();
        $blockInstance = $resultPage->getLayout()->createBlock(
            '\Magento\Framework\View\Element\Template',
            'orderlogview',
            array()

        )->setTemplate('Kensium_Amconnector::amconnector/logtail.phtml')->assign('data', $data);
        echo $blockInstance->toHtml();
    }

}