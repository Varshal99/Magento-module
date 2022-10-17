<?php
namespace MageMastery\FirstModule\Controller\Index;
class CustomObserverFile extends \Magento\Framework\App\Action\Action {
    protected $resultPageFactory;
    public function __construct(
        \Magento\Framework\App\Action\Context $context,
        \Magento\Framework\View\Result\PageFactory $resultPageFactory
    ){
        $this->resultPageFactory = $resultPageFactory;
        parent::__construct($context);
    }
    public function execute(){
        $resultPage = $this->resultPageFactory->create();
        $this->_eventManager->dispatch('md_customobserver_log',['custom_text' => 'Magento Explore Custom Observer']);
        $resultPage->getConfig()->getTitle()->prepend(__('Welcome to Magento Explore Observer module'));
        return $resultPage;
    }
}
?>