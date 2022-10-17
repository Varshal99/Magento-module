<?php

namespace Mageplaza\HelloWorld\Controller\Adminhtml\Post;

use Mageplaza\HelloWorld\Model\Post;
use Magento\Backend\App\Action;
use Magento\Backend\App\Action\Context;

class Delete extends \Magento\Backend\App\Action
{
    /**
     * @var \Mageplaza\HelloWorld\Model\Post
     */
    public $postModel;

    /**
     * \Magento\Backend\Helper\Js $jsHelper
     * @param Context $context
     * @param Post $postModel
     */
    public function __construct(
        \Magento\Backend\App\Action\Context $context,
        \Mageplaza\HelloWorld\Model\Post $postModel
    ) {
        $this->postModel = $postModel;
        parent::__construct($context);
    }

    /**
     * Delete action
     *
     * @return \Magento\Framework\Controller\ResultInterface
     */
    public function execute()
    {
        $id = $this->getRequest()->getParam('id');
        $resultRedirect = $this->resultRedirectFactory->create();
        if ($id) {
            try {
                $model = $this->postModel;
                $model->load($id);
                $model->delete();
                $this->messageManager->addSuccess(__('The Item has been deleted.'));
                return $resultRedirect->setPath('*/*/');
            } catch (\Exception $e) {
                $this->messageManager->addError($e->getMessage());
                return $resultRedirect->setPath('*/*/edit', ['id' => $id]);
            }
        }
        $this->messageManager->addError(__('We can\'t find a item to delete.'));
        return $resultRedirect->setPath('*/*/');
    }

    /**
     * Isallow
     *
     * @return bool
     */
    protected function _isAllowed()
    {
        return $this->_authorization->isAllowed('Mageplaza_HelloWorld::post');
    }
}
