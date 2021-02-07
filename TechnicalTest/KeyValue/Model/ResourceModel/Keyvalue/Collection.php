<?php
/**
 * Copyright © Magento, Inc. All rights reserved.
 * See COPYING.txt for license details.
 */
declare(strict_types=1);
namespace TechnicalTest\KeyValue\Model\ResourceModel\Keyvalue;

class Collection extends \Magento\Framework\Model\ResourceModel\Db\Collection\AbstractCollection
{

    /**
      * @var string
      */
    protected $_idFieldName = 'id';

    /**
     * Define resource model
     *
     * @return void
     */
    protected function _construct()
    {
        $this->_init(
            \TechnicalTest\KeyValue\Model\Keyvalue::class, 
            \TechnicalTest\KeyValue\Model\ResourceModel\Keyvalue::class
        );
    }

}
?>