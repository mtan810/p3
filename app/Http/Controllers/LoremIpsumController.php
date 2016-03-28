<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use LoremIpsum;

class LoremIpsumController extends Controller {

    /**
    * Responds to requests to GET /lorem-ipsum
    */
    public function getIndex($paragraphs = null) {
        return view('LoremIpsum.index',[
        	'paragraphs' => $paragraphs,
    	]);
    }

    /**
     * Responds to requests to POST /lorem-ipsum
     */
    public function postIndex(Request $request) {
        
        $this->validate($request,[
            'number_of_paragraphs' => 'required|integer|min:1|max:99'
        ]);

        $number_of_paragraphs = $request->input('number_of_paragraphs');

        $generator = new LoremIpsum();
        $paragraphs = '<p>'.implode('<p>', $generator->getParagraphs($number_of_paragraphs));


        return view('LoremIpsum.index',[
        	'paragraphs' => $paragraphs,
    	]);
    }
}