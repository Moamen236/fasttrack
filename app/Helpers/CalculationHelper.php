<?php

namespace App\Helpers;

class CalculationHelper
{
    public static function calcCategory($subCategory , $product , $cart_items)
    {
        $price = isset($cart_items[$product->id]['attributes']['price']) ? $cart_items[$product->id]['attributes']['price'] : $product->sale_price;
        $weight = $product->weight / 100;
        $qty = $cart_items[$product->id][0]['quantity'];

        switch ($subCategory->title) {
            case 'mobile':
                $international_shipping = (3 * $weight) * $qty;
                $customs = ($price * 0.6)* $qty;
                $taxes = $price + 100;
                $commission = ($price * 0.11) * $qty;
                $value_added = (($price * $qty) + $international_shipping + $customs + $taxes + $commission) * 0.14;
                break;
            
            default:
                $international_shipping = 0;
                $customs = 0;
                $taxes = 0;
                $commission = 0;
                $value_added = 0;
                break;
        }

        $final_price = $international_shipping + $customs + $taxes + $commission + $value_added;

        return $final_price;
    }
}
