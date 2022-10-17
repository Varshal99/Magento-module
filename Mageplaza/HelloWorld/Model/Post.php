<?php
namespace Mageplaza\HelloWorld\Model;
class Post extends \Magento\Framework\Model\AbstractModel
{
    protected function _construct()
    {
        $this->_init('Mageplaza\HelloWorld\Model\ResourceModel\Post');
    }

}
