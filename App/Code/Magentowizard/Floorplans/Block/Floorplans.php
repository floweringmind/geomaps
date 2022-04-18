<?php

namespace Magentowizard\Floorplans\Block;

use \Magento\Cms\Model\ResourceModel\Page\CollectionFactory;
use \Magento\Framework\App\Request\Http;
use \Magento\Catalog\Model\ProductFactory;
use Magento\Framework\Registry;

class Floorplans extends \Magento\Framework\View\Element\Template
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

    public function getCurrentProduct()
    {
        $currentProduct = $this->registry->registry('current_product'); 
        $productId = $currentProduct->getId();
    	return $this->productloader->create()->load($productId);
    }
	
    public function getProductImages()
    {
    	$product = $this->getCurrentProduct();
    	return $product->getMediaGalleryImages();
    }
}