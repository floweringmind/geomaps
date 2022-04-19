<?php

namespace Magentowizard\Geomaps\Controller;

use Magento\Framework\App\ActionFactory;
use Magento\Framework\App\RequestInterface;
use Magento\Framework\App\RouterInterface;
use Magento\Framework\DataObject;
use Magento\Framework\Event\ManagerInterface as EventManagerInterface;
use Magentowizard\Geomaps\Helper\Data as CustomRouteHelper;

class Router implements RouterInterface
{
    /**
     * @var bool
     */
    private $dispatched = false;

    /**
     * @var ActionFactory
     */
    protected $actionFactory;

    /**
     * @var EventManagerInterface
     */
    protected $eventManager;

    /**
     * @var CustomRouteHelper
     */
    protected $helper;

    /**
     * Router constructor.
     *
     * @param ActionFactory $actionFactory
     * @param EventManagerInterface $eventManager
     * @param CustomRouteHelper $helper
     */
    public function __construct(
        ActionFactory $actionFactory,
        EventManagerInterface $eventManager,
        CustomRouteHelper $helper
    ) {
        $this->actionFactory = $actionFactory;
        $this->eventManager = $eventManager;
        $this->helper = $helper;
    }

    /**
     * @param RequestInterface $request
     * @return \Magento\Framework\App\ActionInterface|null
     */
    public function match(RequestInterface $request)
    {
        /** @var \Magento\Framework\App\Request\Http $request */
        if (!$this->dispatched) {
            $identifier = trim($request->getPathInfo(), '/');
            $this->eventManager->dispatch('core_controller_router_match_before', [
                'router' => $this,
                'condition' => new DataObject(['identifier' => $identifier, 'continue' => true])
            ]);

            // get the route
            $route = false;
            $route = $this->helper->getModuleRoute($identifier);

            if ($route !== '' && $route === true) {
                $request->setModuleName('geomaps')
                    ->setControllerName('index')
                    ->setActionName('index');
                $request->setAlias(\Magento\Framework\Url::REWRITE_REQUEST_PATH_ALIAS, $identifier);
                $this->dispatched = true;

                return $this->actionFactory->create(
                    'Magento\Framework\App\Action\Forward'
                );
            }

            return null;
        }
    }
}
