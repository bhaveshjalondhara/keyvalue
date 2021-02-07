<?php
/**
 * Copyright © Magento, Inc. All rights reserved.
 * See COPYING.txt for license details.
 */
namespace TechnicalTest\KeyValue\Model\Data;

class UpdateKeyValueData extends \Magento\Framework\Model\AbstractExtensibleModel implements \TechnicalTest\KeyValue\Api\Data\UpdateKeyValueInterface
{
	/**
	 * Constants
	 */
    const KEY_ID ='id';
    const KEY_CODE ='code';
    const KEY_VALUE ='value';

   
   /**
    * getId
    *
    * @return string $this this
    */
    public function getId()
    {
        return $this->getData(self::KEY_ID);
    }

    /**
     * setId
     *
     * @param int $id id
     *
     * @return $this
     */
    public function setId($id)
    {
        return $this->setData(self::KEY_ID, $id);
    } 

    /**
    * getcode
    *
    * @return string $this this
    */
    public function getCode()
    {
        return $this->getData(self::KEY_CODE);
    }

     /**
     * setcode
     *
     * @param string $code code
     *
     * @return $this
     */
    public function setCode($code)
    {
        return $this->setData(self::KEY_CODE, $code);
    } 



    /**
    * getvalue
    *
    * @return string $this this
    */
    public function getValue()
    {
        return $this->getData(self::KEY_VALUE);
    }

     /**
     * setvalue
     *
     * @param string $value value
     *
     * @return $this
     */
    public function setValue($value)
    {
        return $this->setData(self::KEY_VALUE, $value);
    } 
}