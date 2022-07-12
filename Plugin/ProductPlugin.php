<?php
 
namespace Chetu\Himanshu\Plugin;
 
class ProductPlugin
{    
    public function beforeGetProduct(\Magento\Catalog\Block\Product\View $subject)
    {
        // logging to test override    
        $logger = \Magento\Framework\App\ObjectManager::getInstance()->get('\Psr\Log\LoggerInterface');
        $logger->debug(__METHOD__ . ' - ' . __LINE__);        
    }
    
    public function afterGetProduct(\Magento\Catalog\Block\Product\View $subject, $result)
    {
        // logging to test override    
        $logger = \Magento\Framework\App\ObjectManager::getInstance()->get('\Psr\Log\LoggerInterface');
        $logger->debug(__METHOD__ . ' - ' . __LINE__);
        
        return $result;
    }
    
    public function aroundGetProduct(\Magento\Catalog\Block\Product\View $subject, \Closure $proceed)
    {
        // logging to test override    
        $logger = \Magento\Framework\App\ObjectManager::getInstance()->get('\Psr\Log\LoggerInterface');
        $logger->debug(__METHOD__ . ' - ' . __LINE__);
        
        // call the core observed function
        $returnValue = $proceed(); 
        
        // logging to test override        
        $logger->debug(__METHOD__ . ' - ' . __LINE__);
        
        return $returnValue;
    }    
}
?>
