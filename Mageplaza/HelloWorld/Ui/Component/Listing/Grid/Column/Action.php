<?php

namespace Mageplaza\HelloWorld\Ui\Component\Listing\Grid\Column;

use Magento\Framework\View\Element\UiComponent\ContextInterface;
use Magento\Framework\View\Element\UiComponentFactory;
use Magento\Ui\Component\Listing\Columns\Column;
use Magento\Framework\UrlInterface;

class Action extends Column
{
    /** Url path */
    const ROW_EDIT_URL = 'mageplaza_helloworld/post/edit';
    const ROW_DELETE_URL = 'mageplaza_helloworld/post/delete';
    const CUSTOME_FORM = 'mageplaza_helloworld/post/form';
    /** @var UrlInterface */
    protected $_urlBuilder;

    /**
     * @var string
     */
    private $_editUrl;

    /**
     * @param ContextInterface   $context
     * @param UiComponentFactory $uiComponentFactory
     * @param UrlInterface       $urlBuilder
     * @param array              $components
     * @param array              $data
     * @param string             $editUrl
     */
    public function __construct(
        ContextInterface $context,
        UiComponentFactory $uiComponentFactory,
        UrlInterface $urlBuilder,
        array $components = [],
        array $data = [],
        $editUrl = self::ROW_EDIT_URL
    )
    {
        $this->_urlBuilder = $urlBuilder;
        $this->_editUrl = $editUrl;
        parent::__construct($context, $uiComponentFactory, $components, $data);
    }

    /**
     * Prepare Data Source.
     *
     * @param array $dataSource
     *
     * @return array
     */
    public function prepareDataSource(array $dataSource)
    {
        if (isset($dataSource['data']['items'])) {
            foreach ($dataSource['data']['items'] as &$item) {
                $name = $this->getData('name');
                if (isset($item['post_id'])) {
                    $item[$name]['edit'] = [
                        'href' => $this->_urlBuilder->getUrl($this->_editUrl, ['id' => $item['post_id']]),
                        'label' => __('Edit'),
                    ];
                    $item[$name]['delete'] = [
                        'href' => $this->_urlBuilder->getUrl(self::ROW_DELETE_URL, ['id' => $item['post_id']]),
                        'label' => __('Delete'),
                        'confirm' => [
                            'title' => __('Delete ID: ' . $item['post_id']),
                            'message' => __('Are you sure you wan\'t to delete ZipCode "' . $item['post_id'] . '" ?')
                        ]
                    ];
                    $item[$name]['form'] = [
                        'href' => $this->_urlBuilder->getUrl(self::CUSTOME_FORM, ['id' => $item['post_id']]),
                        'label' => __('Custome form'),
                    ];
                }
            }
        }

        return $dataSource;
    }
}
