<?php
/**
 * Copyright © Magento, Inc. All rights reserved.
 * See COPYING.txt for license details.
 */
namespace TechnicalTest\KeyValue\Api;
/**
* UpdateKeyValueInterface
*
* @category Interface
* @package  UpdateKeyValueInterface
*/
interface UpdateKeyValueInterface
{
   /**
    * Gets the json.
    * 
    * @api
    * @param \TechnicalTest\KeyValue\Api\Data\UpdateKeyValueInterface $parameters parameters
    *
    * @return array
    */
    public function update(\TechnicalTest\KeyValue\Api\Data\UpdateKeyValueInterface $parameters);
}