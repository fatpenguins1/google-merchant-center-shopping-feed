<?php
/**
 * Google Merchant Center - Shopping Feed plugin for Craft CMS 3.x
 *
 * Generate product feeds (Google Shopping Feed) for Google Merchant Center. Start selling products online from your CraftCMS. 
 *
 * @link      https://github.com/fatpenguins1
 * @copyright Copyright (c) 2021 Fat Penguins
 */

namespace fatpenguins\googlemerchantcentershoppingfeed\services;

use fatpenguins\googlemerchantcentershoppingfeed\GoogleMerchantCenterShoppingFeed;
use fatpenguins\googlemerchantcentershoppingfeed\models\Settings;

use Craft;
use craft\base\Component;
use craft\commerce\elements\Product;

/**
 * GoogleMerchant Service
 *
 * https://craftcms.com/docs/plugins/services
 *
 * @author    Fat Penguins
 * @package   GoogleMerchantCenterShoppingFeed
 * @since     1.0.0
 */
class GoogleMerchant extends Component
{
      
    /**
     * Get Products query
     *
     * @param  mixed $query
     * @param  mixed $settings
     * @return void
     */
    public function getProducts(ElementQuery $query = null, Settings $settings = null)
    {
        if (!$query) {
            $query = Product::find()->limit(null);
        }
        
        if($settings->siteUid) {
            $site = \Craft::$app->getSites()->getSiteByUid($settings->siteUid);
        } else {
            $site = \Craft::$app->getSites()->getPrimarySite();
        }
        $query->siteId($site->id);

        return $query->all();
    }

}
