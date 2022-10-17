<?php
namespace Mageplaza\HelloWorld\Block;
use Magento\Framework\View\Element\Template;
use Mageplaza\HelloWorld\Model\Post as PostFactory;

class Test extends \Magento\Framework\View\Element\Template
{
    /**
     * @var PostFactory
     */
    public $postFactory;

    /**
     * Test constructor.
     * @param Template\Context $context
     * @param PostFactory $postFactory
     * @param array $data
     */
    public function __construct(
        Template\Context $context,
        PostFactory $postFactory,
        array $data = []
    ) {
        $this->postFactory = $postFactory;
        parent::__construct($context, $data);
    }

    public function execute()
    {

    }

    public function allData(){
        return $this->postFactory->getCollection();
    }

    public function test(){
        return "hello world";
    }

    public function sushil(){
        return "this is the good practice";
    }
    public function sushil1(){
        return "this is sushil method";
    }
}
