<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class LangController extends Controller {

    //
    public function postIndex(Request $request) {
        $op_array = [];
        $locale = $request->get('locale');
        if (!empty($locale) && in_array($locale, ['ar', 'en'])) {
            $op_array = [
                'response' => 'success',
                'lang' => session('lang')
            ];
        }
        return response()->json($op_array)->cookie('lang', $locale);
    }

}
