<?php
/**
 * Google Merchant Center - Shopping Feed plugin for Craft CMS 3.x
 *
 * Generate product feeds (Google Shopping Feed) for Google Merchant Center.
Start selling products online from your CraftCMS. 
 *
 * @link      https://github.com/fatpenguins1
 * @copyright Copyright (c) 2021 Fat Penguins
 */

namespace fatpenguins\googlemerchantcentershoppingfeed\models;

use fatpenguins\googlemerchantcentershoppingfeed\GoogleMerchantCenterShoppingFeed;

use Craft;
use craft\base\Model;

/**
 * GoogleMerchantCenterShoppingFeed Settings Model
 *
 * This is a model used to define the plugin's settings.
 *
 * https://craftcms.com/docs/plugins/models
 *
 * @author    Fat Penguins
 * @package   GoogleMerchantCenterShoppingFeed
 * @since     1.0.0
 */
class Settings extends Model
{
    // Public Properties
    // =========================================================================

    /**
     * @var string
     */
    public $productDataFeed = '/google-merchant-product-feed';

    // site ID if multi-site
    public $siteUid;

    // Google Merchant Data
    public $id = 'sku';
    public $title = 'title';
    public $description;
    public $price = 'price';
    public $sale_price;
    public $image_link;
    public $additional_image_link;
    public $availability = 'in stock';
    public $brand;
    public $gtin;
    public $mpn;
    public $currency;
    public $condition = 'new';

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            ['productDataFeed', 'required'],
            ['id', 'required'],
            ['title', 'required'],
            ['description', 'required'],
            ['price', 'required'],
            ['image_link', 'required'],
            ['brand', 'required'],
        ];
    }

}