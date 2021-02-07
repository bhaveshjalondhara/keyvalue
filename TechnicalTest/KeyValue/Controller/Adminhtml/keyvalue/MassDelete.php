<?php
/**
 * Copyright © Magento, Inc. All rights reserved.
 * See COPYING.txt for license details.
 */
namespace TechnicalTest\KeyValue\Controller\Adminhtml\keyvalue;

use Magento\Backend\App\Action\Context;
use Magento\Ui\Component\MassAction\Filter;
use TechnicalTest\KeyValue\Model\ResourceModel\Keyvalue\CollectionFactory;

class MassDelete extends \Magento\Backend\App\Action
{
    /**
     * @var Filter
     */
    protected $_filter;

    /**
     * @var CollectionFactory
     */
    protected $_collectionFactory;

    public function __construct(
        Context $context,
        Filter $filter,
        CollectionFactory $collectionFactory
    ) {
        $this->_filter = $filter;
        $this->_collectionFactory = $collectionFactory;
        parent::__construct($context);
    }

    /*
     * Check permission via ACL resource
     */
    protected function _isAllowed()
    {
        return $this->_authorization->isAllowed('TechnicalTest_KeyValue::keyvalue');
    }

    /**
     * @return \Magento\Framework\Controller\ResultInterface
     */
    public function execute()
    {
        $gridIds = [];
        $collection = $this->_filter->getCollection($this->_collectionFactory->create());
        foreach ($collection as $grid) {
            $gridIds[] = $grid->getId();
            $this->removeItem($grid);
        }

        $this->messageManager->addSuccess(__('All Records deleted succesfully'));
        $resultRedirect = $this->resultRedirectFactory->create();
        return $resultRedirect->setPath('*/*/');
    }

    public function removeItem($item)
    {
        $item->delete();
    }
}
