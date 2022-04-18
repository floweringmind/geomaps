<?php

namespace Magentowizard\Chemshipping\Plugin\Shipping\Model\Rate;

use Magento\Quote\Model\Quote\Address\RateResult\Method;
use Magento\Shipping\Model\Rate\Result as Subject;

/**
 * Override shipping
 */
class Result
{
    public function __construct(
        \Magento\Catalog\Model\ProductFactory $productloader,
        \Magento\Checkout\Model\Cart $cart,
        \Psr\Log\LoggerInterface $logger
    )
    {
        $this->productloader = $productloader;
        $this->cart = $cart;
        $this->logger = $logger;
    }

    /**
     * Return all Rates in the Result
     *
     * @param Subject $subject
     * @param Method[] $result
     * @return Method[]
     */
    public function afterGetAllRates(Subject $subject, $result)
    {
        $rates = $this->getChemRates($result);
        return (count($rates) > 0) ? $rates : $result;
    }

    /**
     * Return all free Rates in the Result
     *
     * @param Method[] $result
     * @return Method[]
     */
    public function getChemRates($result)
    {
        $rates = [];
        if ($this->getChemicalProducts()){
            foreach ($result ?: [] as $rate) {
                if ($rate->getPrice() == 9.00) {
                    $rates[] = $rate;
                }
            }
        }else{
            foreach ($result ?: [] as $rate) {
                if ($rate->getPrice() != 9.00) {
                    $rates[] = $rate;
                }
            }
        }

        return $rates;
    }

    public function getChemicalProducts()
    {
        $chemTotal = 0;
        $items = $this->cart->getQuote()->getAllItems();
        foreach($items as $item){
            $product = $this->productloader->create()->load($item->getProductId());
            if($product->getChemical() == true){
                //$this->logger->debug("Chem Shipping: ". $product->getChemical());
                $chemTotal += $item->getRowTotal();
                // need to add in price check. If over the amount in the admin print config we ignore this method
                //return ($hasChem AND ($chemTotal <= $this->getConfigData('subtotal_max')));
                return 1;
            }
        }
        return;
    }
}