<?php
/**
 * Default no route handler
 *
 * Copyright © Magento, Inc. All rights reserved.
 * See COPYING.txt for license details.
 */
namespace BelVG\CustomNoRoute\App\Router;

class NoRouteHandler implements \Magento\Framework\App\Router\NoRouteHandlerInterface
{
    /**
     * @var \Magento\Framework\App\Config\ScopeConfigInterface
     */
    protected $_config;

    /**
     * @param \Magento\Framework\App\Config\ScopeConfigInterface $config
     */
    public function __construct(\Magento\Framework\App\Config\ScopeConfigInterface $config)
    {
        $this->_config = $config;
    }

    /**
     * Check and process no route request
     *
     * @param \Magento\Framework\App\RequestInterface $request
     * @return bool
     * @SuppressWarnings(PHPMD.NPathComplexity)
     */
    public function process(\Magento\Framework\App\RequestInterface $request)
    {
        $requestValue = ltrim($request->getPathInfo(), '/');
        $request->setParam('q', $requestValue);
        $request->setModuleName('catalogsearch')->setControllerName('result')->setActionName('index');

        return true;
    }
}
