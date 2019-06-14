<?php

namespace App\Http\Controllers;

use App\Product;
use Carbon\Carbon;
use App;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use App\Basket\Basket;

class Controller extends BaseController {

    use AuthorizesRequests,
        DispatchesJobs,
        ValidatesRequests;

    public function __construct(Request $request) {
//        var_dump(session()->get('type'));
//        die();

        if (!empty($request->cookie('lang'))) {
            $session_lang = decrypt($request->cookie('lang'));
        }
//        var_dump(decrypt($session_lang));
        if (!empty($session_lang) && in_array($session_lang, ['ar', 'en'])) {
            App::setLocale($session_lang);
            //var_dump(App::getLocale());
        } else {
            App::setLocale('en');
        }
    }

    public function getItemsToOrder() {
        $items_ = $this->basket->all();
        if (isset($items_['items'])) {
            $items_ = $items_['items'];
        }
        $items = array();
        foreach ($items_ as $product_id => $count) {
            $product = Product::where('id', $product_id)->first();
//            die(var_dump($items_));
            if ($count && $product) {
                $product->count = $count;
                $items[] = $product;
            }
        }
//        die(var_dump($items));
        return $items;
    }

    public function getItemsTotalCoast() {
        $total = 0;
        $items_ = $this->basket->all();
        if (isset($items_['items'])) {
            $items_ = $items_['items'];
        }
        $items = array();
        foreach ($items_ as $product_id => $count) {
            $product = Product::where('id', $product_id)->first();
//            die(var_dump($items_));
            if ($count && $product) {
                $product->count = $count;
                $total += ($count * $product->price);
                
            }
        }

        return $total;
    }

}
