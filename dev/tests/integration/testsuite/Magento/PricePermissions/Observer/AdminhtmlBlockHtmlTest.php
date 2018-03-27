<?php
/**
 * Copyright © 2015 Magento. All rights reserved.
 * See COPYING.txt for license details.
 */
namespace Magento\PricePermissions\Observer;

/**
 * @magentoAppArea adminhtml
 */
class AdminhtmlBlockHtmlTest extends \PHPUnit_Framework_TestCase
{
    /** @var \Magento\Framework\View\LayoutInterface */
    protected $_layout = null;

    protected function setUp()
    {
        parent::setUp();
        \Magento\TestFramework\Helper\Bootstrap::getObjectManager()->get(
            'Magento\Framework\Config\ScopeInterface'
        )->setCurrentScope(
            \Magento\Backend\App\Area\FrontNameResolver::AREA_CODE
        );
        $this->_layout = \Magento\TestFramework\Helper\Bootstrap::getObjectManager()->get(
            'Magento\Framework\View\LayoutInterface'
        );
    }

    public function testAdminhtmlBlockHtmlBeforeProductOpt()
    {
        $parentBlock = $this->_layout->createBlock('Magento\Backend\Block\Template', 'admin.product.options');
        $optionsBlock = $this->_layout->addBlock(
            'Magento\Backend\Block\Template',
            'options_box',
            'admin.product.options'
        );

        $this->_initSession();
        $this->_runAdminhtmlBlockHtmlBefore($parentBlock);

        $this->assertFalse($optionsBlock->getCanEditPrice());
        $this->assertFalse($optionsBlock->getCanReadPrice());
    }

    public function testAdminhtmlBlockHtmlBeforeBundleOpt()
    {
        $parentBlock = $this->_layout->createBlock(
            'Magento\Backend\Block\Template',
            'adminhtml.catalog.product.edit.tab.bundle.option'
        );
        $selectionBlock = $this->_layout->addBlock(
            'Magento\Backend\Block\Template',
            'selection_template',
            'adminhtml.catalog.product.edit.tab.bundle.option'
        );

        $this->_initSession();
        $this->_runAdminhtmlBlockHtmlBefore($parentBlock);

        $this->assertFalse($parentBlock->getCanReadPrice());
        $this->assertFalse($selectionBlock->getCanReadPrice());
        $this->assertFalse($parentBlock->getCanEditPrice());
        $this->assertFalse($selectionBlock->getCanEditPrice());
    }

    /**
     * Prepare event and run \Magento\PricePermissions\Observer\AdminhtmlBlockHtmlBeforeObserver::execute and
     * \Magento\PricePermissions\Observer\AdminControllerPredispatchObserver::execute
     *
     * @param \Magento\Framework\View\Element\AbstractBlock $block
     */
    protected function _runAdminhtmlBlockHtmlBefore(\Magento\Framework\View\Element\AbstractBlock $block)
    {
        $event = new \Magento\Framework\Event\Observer();
        $event->setBlock($block);

        $adminControllerPredispatchObserver = \Magento\TestFramework\Helper\Bootstrap::getObjectManager()->create(
            'Magento\PricePermissions\Observer\AdminControllerPredispatchObserver'
        );
        $adminControllerPredispatchObserver->execute($event);

        $adminhtmlBlockHtmlBeforeObserver = \Magento\TestFramework\Helper\Bootstrap::getObjectManager()->create(
            'Magento\PricePermissions\Observer\AdminhtmlBlockHtmlBeforeObserver'
        );
        $adminhtmlBlockHtmlBeforeObserver->execute($event);
    }

    /**
     * Prepare session
     */
    protected function _initSession()
    {
        $user = \Magento\TestFramework\Helper\Bootstrap::getObjectManager()->create('Magento\User\Model\User');
        $user->setId(2)->setRole(true);
        $session = \Magento\TestFramework\Helper\Bootstrap::getObjectManager()->create(
            'Magento\Backend\Model\Auth\Session'
        );
        $session->setUpdatedAt(time())->setUser($user);
    }
}