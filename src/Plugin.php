<?php

namespace acmeinc\craftacmeshippingmethod;

use Craft;
use yii\base\Event;
use craft\base\Model;
use craft\base\Plugin as BasePlugin;
use craft\commerce\adjusters\Shipping;
use craft\commerce\services\ShippingMethods;
use craft\commerce\services\OrderAdjustments;
use acmeinc\craftacmeshippingmethod\models\Settings;
use craft\commerce\events\RegisterAvailableShippingMethodsEvent;
use acmeinc\craftacmeshippingmethod\shippingmethods\ShippingMethod as AcmeShippingMethod;
use acmeinc\craftacmeshippingmethod\shippingmethods\ShippingAdjuster as AcmeShippingAdjuster;

/**
 * Acme Shipping Method plugin
 *
 * @method static Plugin getInstance()
 * @method Settings getSettings()
 * @author Acme Inc <support@acme.inc>
 * @copyright Acme Inc
 * @license MIT
 */
class Plugin extends BasePlugin
{
    public string $schemaVersion = '1.0.0';
    public bool $hasCpSettings = true;

    public static function config(): array
    {
        return [
            'components' => [
                // Define component configs here...
            ],
        ];
    }

    public function init()
    {
        parent::init();

        // Defer most setup tasks until Craft is fully initialized
        Craft::$app->onInit(function() {
            $this->attachEventHandlers();
            // ...
        });
    }

    protected function createSettingsModel(): ?Model
    {
        return Craft::createObject(Settings::class);
    }

    protected function settingsHtml(): ?string
    {
        return Craft::$app->view->renderTemplate('acme-shipping-method/_settings.twig', [
            'plugin' => $this,
            'settings' => $this->getSettings(),
        ]);
    }

    private function attachEventHandlers(): void
    {
        // Register event handlers here ...
        // (see https://craftcms.com/docs/4.x/extend/events.html to get started)

        Event::on(
            ShippingMethods::class,
            ShippingMethods::EVENT_REGISTER_AVAILABLE_SHIPPING_METHODS,
            function(RegisterAvailableShippingMethodsEvent $event) {
                $event->shippingMethods[] = new AcmeShippingMethod();
            }
        );


        Event::on(
            OrderAdjustments::class,
            OrderAdjustments::EVENT_REGISTER_ORDER_ADJUSTERS,
            function(\craft\events\RegisterComponentTypesEvent $event) {
                $adjusters = $event->types;

                foreach ($adjusters as $key => $adjuster) {
                    if ($adjuster == Shipping::class) {
                        $adjusters[$key] = AcmeShippingAdjuster::class;
                    }
                }
        
                $event->types = $adjusters;
            }
        );
    }
}
