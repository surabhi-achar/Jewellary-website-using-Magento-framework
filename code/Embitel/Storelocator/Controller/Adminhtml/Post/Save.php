<?php

namespace Embitel\Storelocator\Controller\Adminhtml\Post;

use Embitel\Storelocator\Model\Post;
use Magento\Backend\App\Action;
use Magento\Backend\App\Action\Context;
use Magento\Framework\Data\Form\FormKey\Validator;
use Magento\Framework\View\Result\PageFactory;

class Save extends Action
{
    /**
     * @var $model
     */
    protected $_model;
    public function __construct(
        Context $context,
        PageFactory $resultPageFactory,
        Post $model
    ) {
        $this->resultPageFactory = $resultPageFactory;
        $this->_model = $model;
        parent::__construct($context);
    }
    /**
     * Save data to the database
     */
    public function execute()
    {
        $resultPageFactory = $this->resultRedirectFactory->create();
        $data = $this->getRequest()->getPostValue();
        try {
            if ($data) {
                $model = $this->_model;
                $model->setData($data)->save();
                $this->messageManager->addSuccessMessage(__("Data Saved Successfully."));
                $buttondata = $this->getRequest()->getParam('back');
                if ($buttondata == 'add') {
                    return $resultPageFactory->setPath('*/*/newstoreform');
                }
                if ($buttondata == 'close') {
                    return $resultPageFactory->setPath('*/*/index');
                }
                $id = $model->getId();
                return $resultPageFactory->setPath('*/*/newstoreform', ['entity_id' => $id]);
            }
        } catch (\Exception $e) {
            $this->messageManager->addErrorMessage($e, __("We can't submit your request, Please try again."));
        }
        return $resultPageFactory->setPath('*/*/index');
    }
}
