<?php

namespace Magentowizard\Geomaps\Model;

use Magentowizard\Geomaps\Api\Data\GridInterface;

class Grid extends \Magento\Framework\Model\AbstractModel implements GridInterface
{
    /**
     * CMS page cache tag.
     */
    const CACHE_TAG = 'magentowizard_geomaps';

    /**
     * @var string
     */
    protected $_cacheTag = 'magentowizard_geomaps';

    /**
     * Prefix of model events names.
     *
     * @var string
     */
    protected $_eventPrefix = 'magentowizard_geomaps';

    /**
     * Initialize resource model.
     */
    protected function _construct()
    {
        $this->_init('Magentowizard\Geomaps\Model\ResourceModel\Grid');
    }
    /**
     * Get Id.
     *
     * @return int
     */
    public function getEntityId()
    {
        return $this->getData(self::ENTITY_ID);
    }

    /**
     * Set Id.
     */
    public function setEntityId($entityId)
    {
        return $this->setData(self::ENTITY_ID, $entityId);
    }

    /**
     * Get Stores.
     *
     * @return varchar
     */
    public function getStores()
    {
        return $this->getData(self::STORES);
    }

    /**
     * Set Stores.
     */
    public function setStores($stores)
    {
        return $this->setData(self::STORES, $stores);
    }

    /**
     * Get  Store Ids.
     *
     * @return varchar
     */
    public function getStoreIds()
    {
        return $this->getData(self::STORE_IDS);
    }

    /**
     * Set Store Ids.
     */
    public function setStoreIds($storeIds)
    {
        return $this->setData(self::STORE_IDS, $storeIds);
    }


    /**
     * Get Url Key.
     *
     * @return varchar
     */
    public function getUrlKey()
    {
        return $this->getData(self::URL_KEY);
    }

    /**
     * Set Url Key.
     */
    public function setUrlKey($urlKey)
    {
        return $this->setData(self::URL_KEY, $urlKey);
    }

    /**
     * Get Region Code.
     *
     * @return varchar
     */
    public function getRegionCode()
    {
        return $this->getData(self::REGION_CODE);
    }

    /**
     * Set Region Code.
     */
    public function setRegionCode($regionCode)
    {
        return $this->setData(self::REGION_CODE, $regionCode);
    }

    /**
     * Get Page Heading.
     *
     * @return varchar
     */
    public function getPageHeading()
    {
        return $this->getData(self::PAGE_HEADING);
    }

    /**
     * Set Page Heading.
     */
    public function setPageHeading($pageHeading)
    {
        return $this->setData(self::PAGE_HEADING, $pageHeading);
    }

    /**
     * Get Page Title.
     *
     * @return varchar
     */
    public function getPageTitle()
    {
        return $this->getData(self::PAGE_TITLE);
    }

    /**
     * Set Page Title.
     */
    public function setPageTitle($pageTitle)
    {
        return $this->setData(self::PAGE_TITLE, $pageTitle);
    }

    /**
     * Get Meta Keywords.
     *
     * @return varchar
     */
    public function getMetaKeywords()
    {
        return $this->getData(self::META_KEYWORDS);
    }

    /**
     * Set Meta Keywords.
     */
    public function setMetaKeywords($metaKeywords)
    {
        return $this->setData(self::META_KEYWORDS, $metaKeywords);
    }

    /**
     * Get Meta Description.
     *
     * @return varchar
     */
    public function getMetaDescription()
    {
        return $this->getData(self::META_DESCRIPTION);
    }

    /**
     * Set Meta Description.
     */
    public function setMetaDescription($metaDescription)
    {
        return $this->setData(self::META_DESCRIPTION, $metaDescription);
    }

    /**
     * Get Middle Code Block.
     *
     * @return varchar
     */
    public function getMiddleBlockCode()
    {
        return $this->getData(self::MIDDLE_BLOCK_CODE);
    }

    /**
     * Set  Middle Code Block.
     */
    public function setMiddleBlockCode($middleBlockCode)
    {
        return $this->setData(self::MIDDLE_BLOCK_CODE, $middleBlockCode);
    }

    /**
     * Get Bottom Code Block.
     *
     * @return varchar
     */
    public function getBottomBlockCode()
    {
        return $this->getData(self::BOTTOM_BLOCK_CODE);
    }

    /**
     * Set  Bottom Code Block.
     */
    public function setBottomBlockCode($bottomBlockCode)
    {
        return $this->setData(self::BOTTOM_BLOCK_CODE, $bottomBlockCode);
    }

    /**
     * Get Content.
     *
     * @return varchar
     */
    public function getCityContent()
    {
        return $this->getData(self::CITY_CONTENT);
    }

    /**
     * Set Content.
     */
    public function setCityContent($content)
    {
        return $this->setData(self::CITY_CONTENT, $content);
    }

    /**
     * Get IsActive.
     *
     * @return varchar
     */
    public function getIsActive()
    {
        return $this->getData(self::IS_ACTIVE);
    }

    /**
     * Set IsActive.
     */
    public function setIsActive($isActive)
    {
        return $this->setData(self::IS_ACTIVE, $isActive);
    }

    /**
     * Get UpdateTime.
     *
     * @return varchar
     */
    public function getUpdateTime()
    {
        return $this->getData(self::UPDATE_TIME);
    }

    /**
     * Set UpdateTime.
     */
    public function setUpdateTime($updateTime)
    {
        return $this->setData(self::UPDATE_TIME, $updateTime);
    }

    /**
     * Get CreatedAt.
     *
     * @return varchar
     */
    public function getCreatedAt()
    {
        return $this->getData(self::CREATED_AT);
    }

    /**
     * Set CreatedAt.
     */
    public function setCreatedAt($createdAt)
    {
        return $this->setData(self::CREATED_AT, $createdAt);
    }
}
