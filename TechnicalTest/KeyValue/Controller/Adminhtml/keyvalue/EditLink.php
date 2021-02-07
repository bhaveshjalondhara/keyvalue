<?php
/**
 * Copyright © Magento, Inc. All rights reserved.
 * See COPYING.txt for license details.
 */
namespace TechnicalTest\KeyValue\Controller\Adminhtml\keyvalue;

use Magento\Framework\Escaper;
use Magento\Ui\Component\Listing\Columns\Column;
use Magento\Framework\View\Element\UiComponent\ContextInterface;
use Magento\Framework\View\Element\UiComponentFactory;
use Magento\Framework\UrlInterface;

class EditLink extends Column {
    protected $escaper;

    /**
     * @var UrlInterface
     */
    private $urlBuilder;
    /** Url Path */
    const EDIT_URL = 'keyvalue/keyvalue/edit';

    public function __construct(
        ContextInterface $context,
        UiComponentFactory $uiComponentFactory,
        Escaper $escaper,
        array $components = [],
        UrlInterface $urlBuilder,
        array $data = []
    ) {
        $this->escaper = $escaper;
        $this->urlBuilder = $urlBuilder;
        parent::__construct($context, $uiComponentFactory, $components, $data);
    }

    public function prepareDataSource(array $dataSource) {
        if (isset($dataSource['data']['items'])) {
            foreach ($dataSource['data']['items'] as & $item) {
                $name = $this->getData('name');                
                if (isset($item['id'])) {                    
                    $item[$name] = html_entity_decode('<a href="'.$this->urlBuilder->getUrl(self::EDIT_URL, ['id' => $item['id']]).'">Edit</a>');
                }
            }
        }
        return $dataSource;
    }

}
