<?php
/**
 * Google Merchant Center - Shopping Feed plugin for Craft CMS 3.x
 *
 * Generate product feeds (Google Shopping Feed) for Google Merchant Center.
 * Start selling products online from your CraftCMS. 
 *
 * @link      https://github.com/fatpenguins1
 * @copyright Copyright (c) 2021 Fat Penguins
 */

namespace fatpenguins\googlemerchantcentershoppingfeed;

use fatpenguins\googlemerchantcentershoppingfeed\services\GoogleMerchant as GoogleMerchantService;
use fatpenguins\googlemerchantcentershoppingfeed\variables\GoogleMerchantCenterShoppingFeedVariable;
use fatpenguins\googlemerchantcentershoppingfeed\models\Settings;

use Craft;
use craft\base\Plugin;
use craft\services\Plugins;
use craft\events\PluginEvent;
use craft\web\UrlManager;
use craft\web\twig\variables\CraftVariable;
use craft\events\RegisterUrlRulesEvent;

use yii\base\Event;

/**
 * https://docs.craftcms.com/v3/extend/
 *
 * @author    Fat Penguins
 * @package   GoogleMerchantCenterShoppingFeed
 * @since     1.0.0
 *
 * @property  GoogleMerchantService $googleMerchant
 * @property  Settings $settings
 * @method    Settings getSettings()
 */
class GoogleMerchantCenterShoppingFeed extends Plugin
{
    // Static Properties
    // =========================================================================

    /**
     * Static property that is an instance of this plugin class so that it can be accessed via
     * GoogleMerchantCenterShoppingFeed::$plugin
     *
     * @var GoogleMerchantCenterShoppingFeed
     */
    public static $plugin;

    // Public Properties
    // =========================================================================

    /**
     *
     * @var string
     */
    public $schemaVersion = '1.0.0';

    /**
     *
     * @var bool
     */
    public $hasCpSettings = true;

    /**
     *
     * @var bool
     */
    public $hasCpSection = false;

    // Public Methods
    // =========================================================================

    public function init()
    {
        parent::init();
        self::$plugin = $this;

        // Register the site routes
        if (Craft::$app->getPlugins()->isPluginEnabled('commerce')) {
            Event::on(
                UrlManager::class,
                UrlManager::EVENT_REGISTER_SITE_URL_RULES,
                function (RegisterUrlRulesEvent $event) {
                    $event->rules[$this->getSettings()->productDataFeed] = 'google-merchant-center-shopping-feed/google-merchant';
                }
            );
        }

        // Register the variables
        Event::on(
            CraftVariable::class,
            CraftVariable::EVENT_INIT,
            function (Event $event) {
                /** @var CraftVariable $variable */
                $variable = $event->sender;
                $variable->set('googleMerchantCenterShoppingFeed', GoogleMerchantCenterShoppingFeedVariable::class);
            }
        );

        // Do something after we're installed
        Event::on(
            Plugins::class,
            Plugins::EVENT_AFTER_INSTALL_PLUGIN,
            function (PluginEvent $event) {
                if ($event->plugin === $this) {
                    // We were just installed
                }
            }
        );

    /**
     * http://www.yiiframework.com/doc-2.0/guide-runtime-logging.html
     */
        Craft::info(
            Craft::t(
                'google-merchant-center-shopping-feed',
                '{name} plugin loaded',
                ['name' => $this->name]
            ),
            __METHOD__
        );
    }

    // Protected Methods
    // =========================================================================

    /**
     * @return \craft\base\Model|null
     */
    protected function createSettingsModel()
    {
        return new Settings();
    }

    /**
     * @return string The rendered settings HTML
     */
    protected function settingsHtml(): string
    {
        
        return Craft::$app->view->renderTemplate(
            'google-merchant-center-shopping-feed/settings',
            [
                'settings' => $this->getSettings(),
                'fields' => Craft::$app->getFields()->getAllFields()
            ]
        );
    }

}
