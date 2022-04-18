<?php

namespace Magentowizard\Geomaps\Helper;

use Magento\Framework\App\Config\ScopeConfigInterface;
use Magento\Framework\App\Helper\AbstractHelper;
use Magento\Framework\App\Helper\Context;
use Magento\Store\Model\ScopeInterface;
use \Magento\Store\Model\StoreManagerInterface;
use Magentowizard\Geomaps\Model\GridFactory;
use Magento\Framework\App\RequestInterface;
use Psr\Log\LoggerInterface;

class Data extends AbstractHelper
{

    /**
     * @var ScopeConfigInterface
     */
    protected $scopeConfig;

    /**
     * @var RequestInterface
     */
    protected $request;

    /**
     * @var StoreManagerInterface
     */
    protected $storeManager;

    /**
     * Data constructor.
     *
     * @param Context $context
     * @param ScopeConfigInterface $scopeConfig
     */
    public function __construct(
        LoggerInterface $logger,
        GridFactory $gridFactory,
        Context $context,
        StoreManagerInterface $storeManager,
        RequestInterface $request,
        ScopeConfigInterface $scopeConfig
    )
    {
        $this->logger = $logger;
        $this->storeManager = $storeManager;
        $this->request = $request;
        $this->scopeConfig = $scopeConfig;
        $this->gridFactory = $gridFactory;
        parent::__construct($context);

    }

    /**
     * check valid routes
     *
     * @return string
     */
    public function getModuleRoute($identifier)
    {

        $route = false;
        $data = $this->gridFactory->create()->getCollection();

        foreach ($data as $geomap ){
            if ($identifier == $geomap->getUrlKey()){
                $route = true;
                break;
            }
        }
        return $route;
    }

    /**
     * get route data
     *
     * @return object
     */
    public function getRouteData()
    {
        $routeData = "";
        $identifier = trim($this->request->getPathInfo(), '/');
        $data = $this->gridFactory->create()->getCollection();

        foreach ($data as $geomap ){
            if ($identifier == $geomap->getUrlKey()){
                $routeData =  $geomap;
                break;
            }
        }
        return $routeData;
    }

    /**
     * Get Store name
     *
     * @return string
     */
    public function getStoreName()
    {
        return $this->storeManager->getStore()->getName();
    }

}
