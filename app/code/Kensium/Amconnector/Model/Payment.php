<?php
/**
 * @category   Amconnector
 * @package    Kensium_Amconnector
 * @copyright  Copyright (c) 2016 Kensium Solution Pvt.Ltd. (http://www.kensiumsolutions.com/)
 */

namespace Kensium\Amconnector\Model;

class Payment extends \Magento\Framework\Model\AbstractModel
{
    /**
     * constructor
     */
    public function _construct()
    {
        parent::_construct();
        $this->_init('Kensium\Amconnector\Model\ResourceModel\Payment');
    }

    public function authorizenetPayments($paymentCode)
    {

        $payments = array($paymentCode . '_VI', $paymentCode . '_AE', $paymentCode . '_MC', $paymentCode . '_DI');
        return $payments;

    }
}