<?php

namespace Magentowizard\Filters\Block;

use \Magento\Cms\Model\ResourceModel\Page\CollectionFactory;
use \Magento\Framework\App\Request\Http;
use \Magento\Catalog\Model\ProductFactory;
use Magento\Framework\Registry;

class Filters extends \Magento\Framework\View\Element\Template
{
 
	protected $pageCollectionFactory;
	private $request;
	protected $_productloader; 
	private $productRepository; 
	private $registry;

	public function __construct(
	    \Magento\Cms\Model\ResourceModel\Page\CollectionFactory $pageCollectionFactory,
	    \Magento\Framework\App\Request\Http $request,
		\Magento\Catalog\Model\ProductFactory $_productloader,
		\Magento\Catalog\Api\ProductRepositoryInterface $productRepository,
	    Registry $registry
	) {
	    $this->pageCollectionFactory = $pageCollectionFactory;
	    $this->request = $request;
		$this->productloader = $_productloader;
		$this->productRepository = $productRepository;
	    $this->registry = $registry;
	}

    public function getCurrentCatalog()
    {
        return $this->registry->registry('current_category'); 
    }

    public function getCurrentProduct()
    {
        return $this->registry->registry('current_product'); 
    }

    public function loadProduct($productId)
    {
    	 return $this->productloader->create()->load($productId);
	}
	
	public function loadProductBySku($sku)
	{
		return $this->productRepository->get($sku);
	}

    public function getRequest()
    {
    	return $this->request;
    }
}