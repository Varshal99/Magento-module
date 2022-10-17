<?php
namespace Mageplaza\HelloWorld\Controller\Adminhtml\Post;

use Magento\Framework\Controller\ResultFactory;

class Form extends \Magento\Backend\App\Action
{
    /**
     * @return \Magento\Backend\Model\View\Result\Page
     */
    public function execute()
    {
        $resultPage = $this->resultFactory->create(ResultFactory::TYPE_PAGE);
        return $resultPage;
    }
}
