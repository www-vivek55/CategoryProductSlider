<?php

namespace RvsMedia\CategoryProductSlider\Observer;

use Magento\Framework\Event\ObserverInterface;
use Magento\Framework\Event\Observer;
use Magento\Framework\App\Config\ScopeConfigInterface;
use Magento\Framework\View\LayoutInterface;

class AddCustomLayout implements ObserverInterface
{
    /**
     * @var ScopeConfigInterface
     */
    protected $scopeConfig;
    /**
     * @var LayoutInterface
     */
    protected $layout;

    /**
     * AddCustomLayout constructor.
     *
     * @param ScopeConfigInterface $scopeConfig
     * @param LayoutInterface $layout
     */
    public function __construct(
        ScopeConfigInterface $scopeConfig,
        LayoutInterface $layout
    ) {
        $this->scopeConfig = $scopeConfig;
        $this->layout = $layout;
    }

    /**
     * Executed xml
     *
     * @param Observer $observer
     */
    public function execute(Observer $observer)
    {
        if (!$this->scopeConfig->isSetFlag('rvsmedia_categoryproductslider/general/enabled')) {
            return;
        }
        $this->layout->getUpdate()->addHandle('catalog_custom_view');
        $this->layout->generateXml();
    }
}
