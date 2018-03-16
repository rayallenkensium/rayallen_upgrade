<?php
/**
 * @category   Amconnector
 * @package    Kensium_Amconnector
 * @copyright  Copyright (c) 2016 Kensium Solution Pvt.Ltd. (http://www.kensiumsolutions.com/)
 */
namespace Kensium\Amconnector\Controller\Adminhtml\Sync;

use Magento\Backend\App\Action;
use Magento\Backend\App\Action\Context;
use Magento\Framework\View\Result\PageFactory;
use Magento\Framework\App\Config\ScopeConfigInterface;

class OrderShipment extends \Magento\Backend\App\Action
{
    /**
     * @var \Magento\Backend\Model\Session
     */
    protected $session;

    /**
     * @var \Magento\Framework\Filesystem\DirectoryList
     */
    protected $dir;

    /**
     * @var \Magento\Framework\Filesystem\Io\File
     */
    protected $file;

    /**
     * @var ScopeConfigInterface
     */
    protected $scopeConfig;

    /**
     * @var \Kensium\Amconnector\Helper\Data
     */
    protected $dataHelper;

    /**
     * @var \Kensium\Amconnector\Helper\ShipmentSync
     */
    protected $amconnectorShipmentHelper;


    /**
     * @var PageFactory
     */
    protected $resultPageFactory;


    /**
     * @param Context $context
     * @param \Magento\Backend\Model\Session $session
     * @param \Magento\Framework\Filesystem\DirectoryList $dir
     * @param \Magento\Framework\Filesystem\Io\File $file
     * @param ScopeConfigInterface $scopeConfig
     * @param \Kensium\Amconnector\Helper\Data $dataHelper
     * @param PageFactory $resultPageFactory
     */
    public function __construct(
        Context $context,
        PageFactory $resultPageFactory,
        \Magento\Framework\Filesystem\DirectoryList $dir,
        \Magento\Framework\Filesystem\Io\File $file,
        ScopeConfigInterface $scopeConfig,
        \Kensium\Amconnector\Helper\Data $dataHelper,
        \Kensium\Amconnector\Helper\ShipmentSync $amconnectorShipmentHelper

    )
    {
        parent::__construct($context);
        $this->session = $context->getSession();
        $this->dir = $dir;
        $this->file = $file;
        $this->scopeConfig = $scopeConfig;
        $this->dataHelper = $dataHelper;
        $this->amconnectorShipmentHelper = $amconnectorShipmentHelper;
        $this->resultPageFactory = $resultPageFactory;

    }

    /**
     * Index action
     *
     * @return \Magento\Backend\Model\View\Result\Page
     */
    public function execute()
    {
        $syncId = $this->getRequest()->getParam('id', NULL);
        $session = $this->session->getData();

        if (isset($session['storeId']) && $session['storeId']) {
            $gridSessionStoreId = $session['storeId'];
        }
        if(empty($gridSessionStoreId))
            $gridSessionStoreId = 1;

        $syncDirectory = BP . "/var/amconnector/";
        $this->file->checkAndCreateFolder($syncDirectory);
       // chmod($syncDirectory, 0777);
        $lockDirectory = $syncDirectory . "lock/";
        $this->file->checkAndCreateFolder($lockDirectory);
        $entity = "orderShipment";
        $lockFile = $lockDirectory . $entity . ".lock";
        $backGroundSync = $this->scopeConfig->getValue('amconnectorsync/background_sync/background_sync');
        
        $out = array();
        if ($backGroundSync) {
            $isLock = $this->dataHelper->chkforDuplicateJob($entity);
            if ($isLock) {
                $this->messageManager->addError("Shipment sync already running");
            } else {
                try{
                    exec("php ".BP."/bin/magento kensium:sync orderShipment " . $syncId . " " . $gridSessionStoreId . " COMPLETE MANUAL NULL NULL> /dev/null & 1 & echo $!", $out);
                    if (isset($out[0])) {
                        $pid = $out[0] - 1;
                        file_put_contents($lockFile, $pid . "\n");
                    }
                }catch (Exception $e){
                    echo $e->getMessage();
                }

            }
        } elseif($orderId){
            $this->amconnectorShipmentHelper->getShipmentSync( 'COMPLETE','MANUAL', $syncId,$gridSessionStoreId, $orderId, NULL);
        }else {
            $this->amconnectorShipmentHelper->getShipmentSync( 'COMPLETE','MANUAL', $syncId,$gridSessionStoreId, NULL, NULL);
        }
        $resultRedirect = $this->resultRedirectFactory->create();
        return $resultRedirect->setRefererOrBaseUrl();
    }
}
