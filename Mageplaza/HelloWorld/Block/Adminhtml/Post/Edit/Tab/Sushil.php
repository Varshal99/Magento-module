<?php

namespace Mageplaza\HelloWorld\Block\Adminhtml\Post\Edit\Tab;

use Magento\Backend\Block\Template\Context;
use Magento\Framework\Data\FormFactory;
use Magento\Framework\Registry;
use Magento\Store\Model\System\Store;

class Sushil extends \Magento\Backend\Block\Widget\Form\Generic implements \Magento\Backend\Block\Widget\Tab\TabInterface
{
    /**
     * @var \Magento\Store\Model\System\Store
     */
    public $store;

    /**
     * @var \Magento\Store\Model\System\Store
     */
    public $systemStore;

    /**
     * @param Context $context
     * @param Registry $registry
     * @param FormFactory $formFactory
     * @param Store $systemStore
     * @param array $data
     */
    public function __construct(
        \Magento\Backend\Block\Template\Context $context,
        \Magento\Framework\Registry $registry,
        \Magento\Framework\Data\FormFactory $formFactory,
        \Magento\Store\Model\System\Store $systemStore,
        array $data = []
    ) {
        $this->_systemStore = $systemStore;
        $this->_backendSession = $context->getBackendSession();
        parent::__construct($context, $registry, $formFactory, $data);
    }

    /**
     * Prepare form
     *
     * @return $this
     */
    public function _prepareForm()
    {
        /** @var $model \Mageplaza\HelloWorld\Model\Post */
        $model = $this->_coreRegistry->registry('mageants_zipcodecod');

        /** @var \Magento\Framework\Data\Form $form */
        $form = $this->_formFactory->create();

        $form->setHtmlIdPrefix('zipcodecod_');

        $fieldset = $form->addFieldset('base_fieldset', ['legend' => __('Item Information')]);

        if ($model->getPostId()) {
            $fieldset->addField('post_id', 'hidden', ['name' => 'id']);
        } else {
            $data = $this->_backendSession->getPageData(true);
            $this->_backendSession->setPage($data);
            if (!empty($data)) {
                $model->addData($data);
            }
        }

        $fieldset->addField(
            'sushilname',
            'text',
            [
                'name' => 'sushilname',
                'label' => __('Sushil Name'),
                'class' => 'required-entry',
                'title' => __('Sushil Name'),
                'required' => true,
            ]
        );

        $fieldset->addField(
            'sushiltags',
            'text',
            [
                'name' => 'sushiltags',
                'label' => __('Sushil Tags'),
                'title' => __('Sushil Tags'),
                'required' => true,
            ]
        );

        $fieldset->addField(
            'sushilpost_content',
            'text',
            [
                'name' => 'sushilpost_content',
                'label' => __('Sushil Post Content'),
                'title' => __('Sushil Post Content'),
                'required' => true,
            ]
        );


        $form->setValues($model->getData());
        $this->setForm($form);

        return parent::_prepareForm();
    }

    /**
     * Prepare label for tab
     *
     * @return \Magento\Framework\Phrase
     */
    public function getTabLabel()
    {
        return __('Sushil');
    }

    /**
     * Prepare title for tab
     *
     * @return \Magento\Framework\Phrase
     */
    public function getTabTitle()
    {
        return __('Sushil');
    }

    /**
     * @inheritdoc
     */
    public function canShowTab()
    {
        return true;
    }

    /**
     * @inheritdoc
     */
    public function isHidden()
    {
        return false;
    }

    /**
     * Check permission for passed action
     *
     * @param string $resourceId
     * @return bool
     */
    public function _isAllowedAction($resourceId)
    {
        return $this->_authorization->isAllowed($resourceId);
    }
}
