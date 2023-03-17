<?php

namespace RvsMedia\CategoryProductSlider\Observer;

use Magento\Framework\Event\ObserverInterface;
use Magento\Framework\Event\Observer;
use Magento\Framework\App\Config\ScopeConfigInterface;
use Magento\Framework\View\LayoutInterface;
use Magento\Framework\App\Request\Http;

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
     * @var Http
     */
    protected $request;

    /**
     * AddCustomLayout constructor.
     *
     * @param ScopeConfigInterface $scopeConfig
     * @param LayoutInterface $layout
     * @param Http $request
     */
    public function __construct(
        ScopeConfigInterface $scopeConfig,
        LayoutInterface $layout,
        Http $request
    ) {
        $this->scopeConfig = $scopeConfig;
        $this->layout = $layout;
        $this->request = $request;
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
        $action_name = $this->request->getFullActionName();
        if ($action_name=="catalog_category_view") {
            $this->layout->getUpdate()->addHandle('catalog_custom_view');
            $this->layout->generateXml();
        }
    }
}
