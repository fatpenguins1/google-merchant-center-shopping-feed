<?php
/**
 * Google Merchant Center - Shopping Feed plugin for Craft CMS 3.x
 *
 * Generate product feeds (Google Shopping Feed) for Google Merchant Center. Start selling products online from your CraftCMS. 
 *
 * @link      https://github.com/fatpenguins1
 * @copyright Copyright (c) 2021 Fat Penguins
 */

namespace fatpenguins\googlemerchantcentershoppingfeed\controllers;

use fatpenguins\googlemerchantcentershoppingfeed\GoogleMerchantCenterShoppingFeed;

use Craft;
use craft\web\Controller;
use craft\web\View;

/**
 * GoogleMerchant Controller
 *
 * @author    Fat Penguins
 * @package   GoogleMerchantCenterShoppingFeed
 * @since     1.0.0
 */
class GoogleMerchantController extends Controller
{

    // Protected Properties
    // =========================================================================

    protected $allowAnonymous = ['index'];

    // Public Methods
    // =========================================================================

    /**
     *
     * @return mixed
     */
    public function actionIndex()
    {
        $settings = GoogleMerchantCenterShoppingFeed::getInstance()->getSettings();
        $products = GoogleMerchantCenterShoppingFeed::getInstance()->googleMerchant->getProducts(null, $settings);

        //set template mode for Control Panel
        Craft::$app->view->setTemplateMode(View::TEMPLATE_MODE_CP);

        $headers = Craft::$app->response->headers;
        $headers->add('Content-Type', 'text/xml; charset=utf-8');

        return $this->renderTemplate('google-merchant-center-shopping-feed/types/_products', [
            'products' => $products,
            'settings' => $settings
        ]);

    }
}
