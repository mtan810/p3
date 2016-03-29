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
        
        // Validate request to check that it is a number between 1 and 99
        $this->validate($request,[
            'number_of_paragraphs' => 'required|integer|min:1|max:99'
        ]);

        $number_of_paragraphs = $request->input('number_of_paragraphs');

        // Generate paragraphs based on the number_of_paragraphs request
        $generator = new LoremIpsum();
        $paragraphs = '<br><p>'.implode('<p>', $generator->getParagraphs($number_of_paragraphs));

        return view('LoremIpsum.index',[
        	'paragraphs' => $paragraphs,
    	]);
    }
}