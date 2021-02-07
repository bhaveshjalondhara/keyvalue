<?php
/**
 * Copyright © Magento, Inc. All rights reserved.
 * See COPYING.txt for license details.
 */

namespace TechnicalTest\KeyValue\Api;
interface Keyvalue
{
	/**
     * @api
     * @return array
     */
    public function getAllData();

    /**
     * @api
     * @param string $code
     * @return array
     */
    public function getByCodeData(string $code = NULL);

    /**
     * @api
     * @param string $code
     * @return array
     */
    public function deleteData(string $code = NULL);
}