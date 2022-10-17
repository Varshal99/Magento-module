<?php

namespace Mageplaza\HelloWorld\Controller\Adminhtml\Post;

class Save extends \Magento\Backend\App\Action

{

    protected $customFactory;

    protected $adapterFactory;

    protected $uploader;

    public function __construct(

        \Magento\Backend\App\Action\Context $context,

        \Mageplaza\HelloWorld\Model\PostFactory $customFactory

    ) {

        parent::__construct($context);

        $this->customFactory = $customFactory;

    }

    public function execute()

    {

        $data = $this->getRequest()->getPostValue();
        $id = $this->getRequest()->getParam('id');
//        echo "<pre>";
//        var_dump($data);
//        die();

        try {

            $model = $this->customFactory->create();
            if($id){
                $model->load($id);
            }

            $model->addData([

                "name" => $data['name'],

                "post_content" => $data['post_content'],

                "tags" => $data['tags'],

            ]);

            $saveData = $model->save();

            if($saveData){

                $this->messageManager->addSuccess( __('Insert data Successfully !') );

            }

        }catch (\Exception $e) {

            $this->messageManager->addError(__($e->getMessage()));

        }

        $this->_redirect('*/*/index');

    }

}
