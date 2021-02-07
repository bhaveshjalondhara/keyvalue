<?php
/**
 * Copyright © Magento, Inc. All rights reserved.
 * See COPYING.txt for license details.
 */
namespace TechnicalTest\KeyValue\Model\Data;
use TechnicalTest\KeyValue\Model\Keyvalue as KeyvalueModel;
use TechnicalTest\KeyValue\Model\KeyvalueFactory;
use Magento\Store\Model\StoreManagerInterface;
class UpdateKeyValue {
	protected $_keyvalueModel;
    protected $_storeManager;
    protected $_keyvalueFactory;

    public function __construct(
        KeyvalueModel $keyvalueModel,
        StoreManagerInterface $storeManager,
        KeyvalueFactory $keyvalueFactory
    ) {
        $this->_keyvalueModel = $keyvalueModel;
        $this->_storeManager = $storeManager;
        $this->_keyvalueFactory = $keyvalueFactory;
    }

   /**
    * Gets the json.
    *
    * @param \TechnicalTest\KeyValue\Api\Data\UpdateKeyValueInterface $parameters parameters
    *
    * @return []
    */
    public function update(\TechnicalTest\KeyValue\Api\Data\UpdateKeyValueInterface $parameters)
    {
    	$data = $parameters->getData();
        if (isset( $data['code']) && $data['code'] && isset( $data['value']) && $data['value']) 
        {
                try {
                    $code = $data['code'];
                    $keyvalueCollection = $this->_keyvalueModel->getCollection();
                    if($code) {
                        $keyvalueCollection->addFieldToFilter('code',$code);            
                    }
                       $responseData = array();
                       $keyvalueCollectionData = $keyvalueCollection->getData();
                       if (!empty($keyvalueCollectionData) && count($keyvalueCollectionData)) {
                                foreach ($keyvalueCollectionData as $grid) {
                                    $gridId = $grid['id'];
                                    try {
                                        $model = $this->_keyvalueFactory->create();
                                        $model->load($gridId);
                                        $model->setCode($code);
                                        $model->setValue($data['value']);
                                        $model->save();
                                    } catch (\Exception $e) {
                                        $this->messageManager->addError($e->getMessage());
                                    }
                                    $responseData['message'] = 'Data Updated Successfully';
                                    $responseData['result_type'] = 'success';
                                }
                           } else {
                                try {
                                    $model = $this->_keyvalueFactory->create();
                                    $model->addData([
                                        "code" => $code,
                                        "value" => $data['value'],
                                        ]);
                                    $saveData = $model->save();
                                    if($saveData){
                                        $responseData['message'] = 'Insert Record Successfully !';
                                        $responseData['result_type'] = 'success';
                                    }
                                } catch (\Exception $e) {
                                            $this->messageManager->addError($e->getMessage());
                                 }
                           }
                        
                    } catch (\Exception $e) {
                        $this->messageManager->addError($e->getMessage());
                    }
        } else {

             $responseData = array (
                'data' => array (
                        array (
                            'message' => "code or value paremer is missing.",
                            'result_type' => 'failure' 
                        ) 
                ) 
            );
            return [$responseData];
        }
        return [$responseData]; 
    }
}