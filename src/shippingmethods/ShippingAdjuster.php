<?php
namespace acmeinc\craftacmeshippingmethod\shippingmethods;

use craft\base\Component;
use craft\commerce\base\AdjusterInterface;
use craft\commerce\elements\Order;
use craft\commerce\models\OrderAdjustment;

class ShippingAdjuster extends Component implements AdjusterInterface
{
    public function adjust(Order $order): array
    {
        $adjustments = [];

        foreach ($order->getLineItems() as $item) {
            $adjustment = new OrderAdjustment;
            $adjustment->type = 'shipping';
            $adjustment->name = 'Shipping Cost';
            $adjustment->description = 'Ship with Acme Shipping Cost';
            $adjustment->amount = 20;
            $adjustment->setOrder($order);
            $adjustment->setLineItem($item);

            $adjustments[] = $adjustment;
        }

        return $adjustments;
    }
}