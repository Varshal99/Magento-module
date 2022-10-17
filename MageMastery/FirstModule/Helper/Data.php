<?php
namespace MageMastery\FirstModule\Helper;
use \Magento\Framework\App\Helper\AbstractHelper;
use \Magento\Store\Model\ScopeInterface ;
class Data extends AbstractHelper
{    
    // public function __construct(
    //     \MagePal\LinkProduct\Model\Accessory $accessory,
    //     \Magento\Catalog\Block\Product\AbstractProduct $abstractProduct
    // ) {
    //     $this->accessory = $accessory;
    //     $this->abstractProduct = $abstractProduct;
    // }
    // public function getLinkedProducts()
    // {
    // $product = $this->abstractProduct->getProduct();    
    // return $this->accessory->getAccessoryProducts($product);
    // }

    public function newFunction()
    {
        return 'THIS IS MY FIRST HELPER CLASS';
    }

    public function getConfig(){
        return $this->scopeConfig->getValue('testdata/groupid/data', ScopeInterface::SCOPE_STORE, null);
    }
}

?>