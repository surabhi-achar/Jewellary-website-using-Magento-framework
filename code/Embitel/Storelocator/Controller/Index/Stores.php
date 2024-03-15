<?php

namespace Embitel\Storelocator\Controller\Index;

use Magento\Framework\App\Action\Context;
use Magento\Framework\View\Result\PageFactory;
use Magento\Framework\Controller\Result\JsonFactory;
use Embitel\Storelocator\Model\PostFactory;

class Stores extends \Magento\Framework\App\Action\Action
{
    /**
     * @var \Magento\Framework\View\Result\PageFactory
     */
    protected $resultPageFactory;

    /**
     * @var \Magento\Framework\Controller\Result\JsonFactory
     */
    protected $resultJsonFactory;

    /**
     * @var \Embitel\Storelocator\Model\PostFactory
     */
    protected $postFactory;

    /**
     * Stores constructor.
     *
     * @param Context $context
     * @param PageFactory $resultPageFactory
     * @param JsonFactory $resultJsonFactory
     * @param PostFactory $postFactory
     */
    public function __construct(
        Context $context,
        PageFactory $resultPageFactory,
        JsonFactory $resultJsonFactory,
        PostFactory $postFactory
    ) {
        $this->resultPageFactory = $resultPageFactory;
        $this->resultJsonFactory = $resultJsonFactory;
        $this->postFactory = $postFactory;
        parent::__construct($context);
    }

    /**
     * Stores action.
     *
     * @return \Magento\Framework\Controller\Result\Json
     */
    public function execute()
    {
        $resultJson = $this->resultJsonFactory->create();

        $storeCity = $this->getRequest()->getParam('store_city');

        try {
            $storeLocator = $this->postFactory->create();

            if (empty($storeCity)) {
                $locations = $storeLocator->getCollection();
            } else {
                $locations = $storeLocator->getCollection()
                    ->addFieldToFilter('store_city', $storeCity);
            }

            $locationsData = [];

            foreach ($locations as $location) {
                $locationsData[] = [
                    'name' => $location->getstore_name(),
                    'address' => $location->getstore_address(),
                    'city' => $location->getstore_city(),
                    'state' => $location->getstore_state(),
                    'mobile_number' => $location->getmobile_number(),
                    'pincode' => $location->getstore_pincode(),
                    'location' => $location->getstore_location(),
                ];
            }

            $result = [
                'success' => true,
                'locations' => $locationsData,
            ];

        } catch (\Exception $e) {
            $result = [
                'success' => false,
                'message' => $e->getMessage(),
            ];
        }

        return $resultJson->setData($result);
    }
}
