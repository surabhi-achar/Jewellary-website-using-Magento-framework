<?php
namespace Embitel\Storelocator\Controller\Adminhtml\Post;
 
use Magento\Framework\View\Result\PageFactory;
use Magento\Backend\App\Action;
use Magento\Backend\App\Action\Context;
use Magento\Framework\Registry;
use Magento\Backend\Model\View\Result\ForwardFactory;
 
class Index extends Action
{
    /**
     * @see _isAllowed()
     */
    const ACTION_RESOURCE = 'Embitel_Storelocator::storelocator';

    /**
     * Core Registry
     *
     * @var Registry
     */
    protected $coreRegistry;

    /**
     * Result Page Factory
     *
     * @var PageFactory
     */
    protected $resultPageFactory;

    /**
     * @var ForwardFactory
     */
    protected $resultForwardFactory;

    /**
     * @param Registry $registry
     * @param PageFactory $resultPageFactory
     * @param ForwardFactory $resultForwardFactory
     * @param Context $context
     */
    public function __construct(
        Registry $registry,
        PageFactory $resultPageFactory,
        ForwardFactory $resultForwardFactory,
        Context $context
    ) {
        $this->coreRegistry = $registry;
        $this->resultPageFactory = $resultPageFactory;
        $this->resultForwardFactory = $resultForwardFactory;
        parent::__construct($context);
    }

    /**
     * @return \Magento\Framework\View\Result\Page
     */
    public function execute()
    {
        //die("yes");
        $resultPage = $this->resultPageFactory->create();
        $resultPage->addBreadCrumb(__('STORE LOCATION'), __('STORE LOCATION'));
        $resultPage->getConfig()->getTitle()->prepend(__('STORE LOCATION'));
        return $resultPage;
    }
}
