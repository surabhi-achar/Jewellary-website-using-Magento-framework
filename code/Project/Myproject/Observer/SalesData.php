<?php
namespace Project\Myproject\Observer;

use Magento\Framework\Event\ObserverInterface;
use Magento\Framework\Event\Observer;
use Magento\Quote\Model\Quote\Item as QuoteItem;

class SalesData implements ObserverInterface
{
    public function execute(Observer $observer)
    {
        /** @var QuoteItem $quoteItem */
        $quoteItem = $observer->getEvent()->getData('quote_item');
        $product = $observer->getEvent()->getData('product');
        
        $customAttributeValue = $product->getData('mrp');
        $quoteItem->setData('mrp', $customAttributeValue);
    }
}

