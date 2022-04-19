<?php

namespace Magentowizard\Geomaps\Api\Data;

interface GridInterface
{
    /**
     * Constants for keys of data array. Identical to the name of the getter in snake case.
     */
    const ENTITY_ID = 'entity_id';
    const STORES = 'store_ids';
    const URL_KEY = 'url_key';
    const REGION_CODE = 'region_code';
    const REGION_NAME = 'region_name';
    const PAGE_HEADING = 'page_heading';
    const PAGE_TITLE = 'page_title';
    const META_KEYWORDS = 'meta_keywords';
    const META_DESCRIPTION = 'meta_description';
    const MIDDLE_BLOCK_CODE = 'middle_block_code';
    const BOTTOM_BLOCK_CODE = 'bottom_block_code';
    const CITY_CONTENT = 'city_content';
    const IS_ACTIVE = 'is_active';
    const UPDATE_TIME = 'update_time';
    const CREATED_AT = 'created_at';

   /**
    * Get Id.
    *
    * @return int
    */
    public function getEntityId();

   /**
    * Set Id.
    */
    public function setEntityId($entityId);

    /**
    * Get Stores.
    */
    public function getStores();

   /**
    * Set Stores.
    */
    public function setStores($stores);

   /**
    * Get Url Key.
    *
    * @return varchar
    */
    public function getUrlKey();

   /**
    * Set Url Key.
    */
    public function setUrlKey($urlKey);

   /**
    * Get Region Code.
    *
    * @return varchar
    */
    public function getRegionCode();

   /**
    * Set Region Code.
    */
    public function setRegionCode($regionCode);

   /**
    * Get Page Heading.
    *
    * @return varchar
    */
    public function getPageHeading();

   /**
    * Set Page Heading.
    */
    public function setPageHeading($pageHeading);

   /**
    * Get Page Title.
    *
    * @return varchar
    */
    public function getPageTitle();

   /**
    * Set Page Title.
    */
    public function setPageTitle($pageTitle);

    /**
    * Get Meta Keywords.
    *
    * @return varchar
    */
    public function getMetaKeywords();

   /**
    * Set Meta Keywords.
    */
    public function setMetaKeywords($metaKeywords);

    /**
    * Get Meta Description.
    *
    * @return varchar
    */
    public function getMetaDescription();

   /**
    * Set Meta Description.
    */
    public function setMetaDescription($metaDescription);

    /**
    * Get Middle Block Code.
    *
    * @return varchar
    */
    public function getMiddleBlockCode();

   /**
    * Set Middle Block Code.
    */
    public function setMiddleBlockCode($middleBlockCode);

    /**
    * Get Bottom Block Code.
    *
    * @return varchar
    */
    public function getBottomBlockCode();

   /**
    * Set Middle Block Code.
    */
    public function setBottomBlockCode($bottomBlockCode);

   /**
    * Get City Content.
    *
    * @return varchar
    */
    public function getCityContent();

   /**
    * Set City Content.
    */
    public function setCityContent($cityContent);

   /**
    * Get IsActive.
    *
    * @return varchar
    */
    public function getIsActive();

   /**
    * Set StartingPrice.
    */
    public function setIsActive($isActive);

   /**
    * Get UpdateTime.
    *
    * @return varchar
    */
    public function getUpdateTime();

   /**
    * Set UpdateTime.
    */
    public function setUpdateTime($updateTime);

   /**
    * Get CreatedAt.
    *
    * @return varchar
    */
    public function getCreatedAt();

   /**
    * Set CreatedAt.
    */
    public function setCreatedAt($createdAt);
}
