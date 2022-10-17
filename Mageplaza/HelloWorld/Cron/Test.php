<?php

namespace Mageplaza\HelloWorld\Cron;

class Test
{
    public function execute()
    {
        $writer = new \Zend_Log_Writer_Stream(BP . '/var/log/custom.log');
        $logger = new \Zend_Log();
        $logger->addWriter($writer);
        $logger->info('Hello from custom cron ...!');
        return $this;
    }
}
