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

namespace fatpenguins\googlemerchantcentershoppingfeed\assetbundles\googlemerchantcentershoppingfeed;

use Craft;
use craft\web\AssetBundle;
use craft\web\assets\cp\CpAsset;

/**
 * GoogleMerchantCenterShoppingFeedAsset AssetBundle
 *
 * AssetBundle represents a collection of asset files, such as CSS, JS, images.
 *
 * Each asset bundle has a unique name that globally identifies it among all asset bundles used in an application.
 * The name is the [fully qualified class name](http://php.net/manual/en/language.namespaces.rules.php)
 * of the class representing it.
 *
 * An asset bundle can depend on other asset bundles. When registering an asset bundle
 * with a view, all its dependent asset bundles will be automatically registered.
 *
 * http://www.yiiframework.com/doc-2.0/guide-structure-assets.html
 *
 * @author    Fat Penguins
 * @package   GoogleMerchantCenterShoppingFeed
 * @since     1.0.0
 */
class GoogleMerchantCenterShoppingFeedAsset extends AssetBundle
{
    // Public Methods
    // =========================================================================

    /**
     * Initializes the bundle.
     */
    public function init()
    {
        // define the path that your publishable resources live
        $this->sourcePath = "@fatpenguins/googlemerchantcentershoppingfeed/assetbundles/googlemerchantcentershoppingfeed/dist";

        // define the dependencies
        $this->depends = [
            CpAsset::class,
        ];

        // define the relative path to CSS/JS files that should be registered with the page
        // when this asset bundle is registered
        $this->js = [
            'js/GoogleMerchantCenterShoppingFeed.js',
        ];

        $this->css = [
            'css/GoogleMerchantCenterShoppingFeed.css',
        ];

        parent::init();
    }
}
