<?php

namespace Magentowizard\Geomaps\Controller\Adminhtml\Grid;

class Save extends \Magento\Backend\App\Action
{
    /**
     * @var \Magentowizard\Geomaps\Model\GridFactory
     */
    private $gridFactory;

    /**
     * @param \Magento\Backend\App\Action\Context $context
     * @param \Magentowizard\Geomaps\Model\GridFactory $gridFactory
     */
    public function __construct(
        \Magento\Store\Model\StoreManagerInterface $storeManager,
        \Magento\Backend\App\Action\Context $context,
        \Magentowizard\Geomaps\Model\GridFactory $gridFactory
    ) {
        parent::__construct($context);
        $this->gridFactory = $gridFactory;
        $this->_storeManager = $storeManager;
    }

    /**
     * @SuppressWarnings(PHPMD.CyclomaticComplexity)
     * @SuppressWarnings(PHPMD.NPathComplexity)
     */
    public function execute()
    {
        $data = $this->getRequest()->getPostValue();
        if (!$data) {
            $this->_redirect('grid/grid/addrow');
            return;
        }
        try {
            $rowData = $this->gridFactory->create();
            if (isset($data['store_select'])) {
                $stores = $data['store_select'];
                $oldStores = $data['stores'];
                if ($stores != "") {
                    $data['stores'] = $this->getStoreNames($stores);
                    $data['stores_ids'] = $this->getStoreNames($stores);
                }
            }
            $rowData->setData($data);

            if (isset($data['entity_id'])) {
                $rowData->setEntityId($data['entity_id']);
            }
            $rowData->save();
            $this->messageManager->addSuccess(__('Row data has been successfully saved.'));
        } catch (\Exception $e) {
            $this->messageManager->addError(__($e->getMessage()));
        }
        $this->_redirect('grid/grid/index');
    }

    /**
     * Associate selected stores names to be stored
     */
    public function getStoreNames($stores)
    {
        $options = "";
        $storeManagerDataList = $this->_storeManager->getStores();
        foreach ($storeManagerDataList as $key => $value) {
            foreach ($stores as $store) {
                if ($store == $key) {
                    $options .= $value['name'].", ";
                }
            }
        }
        $options = substr($options, 0, -2);
        return $options;
    }

    /**
     * Associate selected stores IDs to be stored
     */
    public function getStoreIds($stores)
    {
        $options = "";
        $storeManagerDataList = $this->_storeManager->getStores();
        foreach ($storeManagerDataList as $key => $value) {
            foreach ($stores as $store) {
                if ($store == $key) {
                    $options .= $key.", ";
                }
            }
        }
        $options = substr($options, 0, -2);
        return $options;
    }

    /**
     * Associate selected stores IDs by name to be stored
     */
    public function getStoreByName($stores)
    {
        $options = "";
        $storeManagerDataList = $this->_storeManager->getStores();
        foreach ($storeManagerDataList as $key => $value) {
            foreach ($stores as $store) {
                if ($store == $key) {
                    $options .= $key.", ";
                }
            }
        }
        $options = substr($options, 0, -2);
        return $options;
    }

    /**
     * @return bool
     */
    protected function _isAllowed()
    {
        return $this->_authorization->isAllowed('Magentowizard\Geomaps::save');
    }
}
