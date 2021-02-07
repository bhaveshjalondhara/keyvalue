<?php
/**
 * Copyright © Magento, Inc. All rights reserved.
 * See COPYING.txt for license details.
 */
namespace TechnicalTest\KeyValue\Model\Data;
use TechnicalTest\KeyValue\Api\Keyvalue as KeyvalueApi;
use TechnicalTest\KeyValue\Model\Keyvalue as KeyvalueModel;
use TechnicalTest\KeyValue\Model\KeyvalueFactory;
use Magento\Store\Model\StoreManagerInterface;
class Keyvalue implements KeyvalueApi
{
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
    public function getAllData()
    {
        try 
        {
            $keyvalueCollection = $this->_keyvalueModel->getCollection();
            $responseData = array();
            $keyvalueCollectionData = $keyvalueCollection->getData();

            if (!empty($keyvalueCollectionData) && count($keyvalueCollectionData))
            { 
                $responseData['data'] = $keyvalueCollectionData;
                $responseData['message'] = 'Data fetched successfully';
                $responseData['result_type'] = 'success';
               
            } else {
                $notAvail = array();
                $notAvail['message'] = 'Data not available';
                $notAvail['result_type'] = 'failure';
                $responseData['data'] = $notAvail;            
            }
        } catch (Exception $e) {
                return ['result_type' => 'failure','message'=>$e->getMessage()];
        }  
        return [$responseData]; 
    }

    public function getByCodeData(string $code = NULL)
    {
        try 
        {
            $keyvalueCollection = $this->_keyvalueModel->getCollection();
            if($code){
                $keyvalueCollection->addFieldToFilter('code',$code);            
            }
            $responseData = array();
            $keyvalueCollectionData = $keyvalueCollection->getData();
            if (!empty($keyvalueCollectionData) && count($keyvalueCollectionData)) {
                $responseData['data'] = $keyvalueCollectionData;
                $responseData['message'] = 'Data fetched successfully';
                $responseData['result_type'] = 'success';
            } else {
                $notAvail = array();
                $notAvail['message'] = 'Data not available or data with given code is not available';
                $notAvail['result_type'] = 'failure';
                $responseData['data'] = $notAvail;   
            }
        } catch (Exception $e) {
                return ['result_type' => 'failure','message'=>$e->getMessage()];
        }  
       return [$responseData]; 
    }

    public function deleteData(string $code = NULL)
    {
      
        try 
        {
            $keyvalueCollection = $this->_keyvalueModel->getCollection();
            if($code){
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
                        $model->delete();
                    } catch (\Exception $e) {
                        $this->messageManager->addError($e->getMessage());
                    }
            
                }
                $responseData['message'] = 'Data Deleted Successfully';
                $responseData['result_type'] = 'success';
            } else {
                $notAvail = array();
                $notAvail['message'] = 'Record not found.';
                $notAvail['result_type'] = 'failure';
                $responseData['data'] = $notAvail;   
            }
        } catch (Exception $e) {
                return ['result_type' => 'failure','message'=>$e->getMessage()];
        }  
       return [$responseData]; 
    }
}
