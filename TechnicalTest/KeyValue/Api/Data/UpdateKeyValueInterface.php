<?php
/**
 * Copyright © Magento, Inc. All rights reserved.
 * See COPYING.txt for license details.
 */

namespace TechnicalTest\KeyValue\Api\Data;

interface UpdateKeyValueInterface extends \Magento\Framework\Api\ExtensibleDataInterface
{
   /**
    * Set role
    *
    * @param string $code code
    *
    * @return string
    */
    public function setCode($code);
    /**
    * Get page
    *
    * @return string|null
    */
    public function getCode();

   /**
    * Set role
    *
    * @param string $value value
    *
    * @return string
    */
    public function setValue($value);
    /**
    * Get page
    *
    * @return string|null
    */
    public function getValue();
   /**
    * Set Id
    *
    * @param int $id id
    *
    * @return int
    */
    public function setId($id);
    /**
    * Get Id
    *
    * @return int|null
    */
    public function getId(); 
}
