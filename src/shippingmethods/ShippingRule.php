<?php

namespace acmeinc\craftacmeshippingmethod\shippingmethods;

use craft\commerce\elements\Order;
use craft\commerce\base\ShippingRuleInterface;

class ShippingRule implements ShippingRuleInterface
{
    /**
     * @var string The description of the rates applied by this rule.
     */
    public $description;

    /**
     * @var bool This shipping rule is enabled for listing and selection.
     */
    public $enabled;

    /**
     * @var float The base shipping cost. This is added at the order level.
     */
    public $baseRate;

    /**
     * @var float The max cost this rule should ever apply.
     */
    public $maxRate;

    /**
     * @var float The min cost this rule should have applied.
     */
    public $minRate;

    /**
     * @var float The data as jason on the orders shipping adjustment.
     */
    public $options;

    /**
     * @var float The flat rate that is multiplied per qty.
     */
    public $perItemRate;

    /**
     * @var float The percentage rate that is multiplied per line item subtotal.
     */
    public $percentageRate;

    /**
     * @var float The rate that is multiplied by the line item's weight.
     */
    public $weightRate;

    /**
     * @inheritdoc
     */
    public function getBaseRate(): float
    {
        return $this->baseRate;
    }

    /**
     * @inheritdoc
     */
    public function getDescription(): string
    {
        return $this->description;
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
    public function getMaxRate(): float
    {
        return $this->maxRate;
    }

    /**
     * @inheritdoc
     */
    public function getMinRate(): float
    {
        return $this->minRate;
    }

    /**
     * @inheritdoc
     */
    public function getOptions(): string
    {
        return $this->options;
    }

    /**
     * @inheritdoc
     */
    public function getPerItemRate(?int $shippingCategoryId): float
    {
        return $this->perItemRate;
    }

    /**
     * @inheritdoc
     */
    public function getPercentageRate(?int $shippingCategoryId): float
    {
        return $this->percentageRate;
    }

    /**
     * @inheritdoc
     */
    public function getWeightRate(?int $shippingCategoryId): float
    {
        return $this->weightRate;
    }

    /**
     * @inheritdoc
     */
    public function matchOrder(Order $order): bool
    {
        return true;
    }
}
