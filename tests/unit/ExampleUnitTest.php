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

namespace fatpenguins\googlemerchantcentershoppingfeedtests\unit;

use Codeception\Test\Unit;
use UnitTester;
use Craft;
use fatpenguins\googlemerchantcentershoppingfeed\GoogleMerchantCenterShoppingFeed;

/**
 * ExampleUnitTest
 *
 *
 * @author    Fat Penguins
 * @package   GoogleMerchantCenterShoppingFeed
 * @since     1.0.0
 */
class ExampleUnitTest extends Unit
{
    // Properties
    // =========================================================================

    /**
     * @var UnitTester
     */
    protected $tester;

    // Public methods
    // =========================================================================

    // Tests
    // =========================================================================

    /**
     *
     */
    public function testPluginInstance()
    {
        $this->assertInstanceOf(
            GoogleMerchantCenterShoppingFeed::class,
            GoogleMerchantCenterShoppingFeed::$plugin
        );
    }

    /**
     *
     */
    public function testCraftEdition()
    {
        Craft::$app->setEdition(Craft::Pro);

        $this->assertSame(
            Craft::Pro,
            Craft::$app->getEdition()
        );
    }
}
