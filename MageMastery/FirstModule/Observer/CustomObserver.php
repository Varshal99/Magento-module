<?php
namespace MageMastery\FirstModule\Observer;
class CustomObserver implements \Magento\Framework\Event\ObserverInterface {
    public function execute(\Magento\Framework\Event\Observer $observer) {
        $observer_data = $observer->getData('custom_text');
        // print_r($observer_data);
        // exit;
        return $this;
    }
}
?>