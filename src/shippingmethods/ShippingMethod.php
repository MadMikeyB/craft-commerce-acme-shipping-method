<?php

namespace acmeinc\craftacmeshippingmethod\shippingmethods;

use craft\commerce\base\Model;
use craft\commerce\elements\Order;
use craft\commerce\base\ShippingRuleInterface;
use craft\commerce\base\ShippingMethodInterface;

class ShippingMethod extends Model implements ShippingMethodInterface
{
    /**
     * @var int ID
     * @note Craft errors without this property.
     */
    public $id;

    /**
     * @var DateTime Date Created
     * @note Craft errors without this property.
     */
    public $dateCreated;

    /**
     * @var DateTime Date Updated
     * @note Craft errors without this property.
     */
    public $dateUpdated;

    /**
     * @var string Name
     */
    public $name = 'Ship with Acme';

    /**
     * @var string Handle
     */
    public $handle = 'acme-shipping-method';

    /**
     * @var string Handle
     */
    public $cpEditUrl;

    /**
     * @var bool Enabled
     */
    public $enabled = true;

    /**
     * @var float Price
     */
    public $price = 20.00;

    /**
     * @var bool Is this the shipping method for the lite edition.
     */
    public $isLite = false;

    /**
     * @inheritdoc
     */
    public function getCpEditUrl(): string
    {
        return $this->cpEditUrl;
    }

    /**
     * @inheritdoc
     */
    public function getHandle(): string
    {
        return $this->handle;
    }

    /**
     * @inheritdoc
     */
    public function getId(): ?int
    {
        return -1;
    }

    /**
     * @inheritdoc
     */
    public function getIsEnabled(): bool
    {
        return $this->enabled;
    }

    /**
     * @inheritdoc
     */
    public function getMatchingShippingRule(Order $order): ?ShippingRuleInterface
    {
        return new \craft\commerce\models\ShippingRule();
    }

    /**
     * @inheritdoc
     */
    public function getName(): string
    {
        return $this->name;
    }

    /**
     * @inheritdoc
     */
    public function getPriceForOrder(Order $order): float
    {
        return $this->price;
    }

    /**
     * @inheritdoc
     */
    public function getShippingRules(): array
    {
        return [];
    }

    /**
     * @inheritdoc
     */
    public function getType(): string
    {
        return 'Custom';
    }

    /**
     * @inheritdoc
     */
    public function matchOrder(Order $order): bool
    {
        return true;
    }
}
