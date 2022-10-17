<?php
namespace MageMastery\FirstModule\Block;
use MageMastery\FirstModule\Helper\Data;
use Magento\Store\Model\ScopeInterface;
/** @var MageMastery\FirstModule\Helper\Data; */ 

class Index extends \Magento\Framework\View\Element\Template
{
    public $_productCollectionFactory;
    // public $productCollectionFactory;
    public $helper;
    public $_scopeConfig;

    public function __construct(
        \Magento\Framework\View\Element\Template\Context $context,
        \MageMastery\FirstModule\Helper\Data $helper,
        \Magento\Catalog\Model\ResourceModel\Product\CollectionFactory $productCollectionFactory,
        \Magento\Framework\App\Config\ScopeConfigInterface $scopeConfig,
        array $data = []
    ){
        $this->_productCollectionFactory = $productCollectionFactory;
        $this->helper = $helper;
        $this->_scopeConfig = $scopeConfig;
        parent::__construct($context,$data);
    }
    public function myclass(){
        return $this->helper->newFunction();
    }
    public function getPopupContent(){
        $popupcontent= \Magento\Store\Model\ScopeInterface::SCOPE_STORE;
        $popupvalue =$this->_scopeConfig->getvalue('testdata/groupid/test', $popupcontent);
        return $popupvalue;
    }
    public function getconfig(){
        $popup = \Magento\Store\Model\ScopeInterface::SCOPE_STORE;
        $popupdata =$this->_scopeConfig->getvalue('testdata/groupid/data', $popup);
        return $popupdata;
    }
    // public function getProductCollection()
    // {
    //     $collection = $this->_productCollectionFactory->create();
    //     $collection->addAttributeToSelect('*');
    //     // $collection->setPageSize(3); // fetching only 3 products
    //     return $collection;
    // }
}
?>

