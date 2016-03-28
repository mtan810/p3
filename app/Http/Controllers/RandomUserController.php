<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use RandomUser;
use LoremIpsum;

require_once '../vendor/fzaninotto/faker/src/autoload.php';

class RandomUserController extends Controller {

    /**
    * Responds to requests to GET /random-user
    */
    public function getIndex($users = null) {
        return view('RandomUser.index',[
        	'users' => $users,
    	]);
    }

    /**
     * Responds to requests to POST /random-user
     */
    public function postIndex(Request $request) {
        
        $this->validate($request,[
            'number_of_users' => 'required|integer|min:1|max:99'
        ]);

        $number_of_users = $request->input('number_of_users');
        $birthdate = $request->input('birthdate');
        $profile = $request->input('profile');

        $users = '';

        for ($i=0; $i<$number_of_users; $i++) {
            $faker = RandomUser::create('en_US');
            $users .= '<br>'.$faker->name;

            if ($birthdate) {
                $users .= '<br>Birthdate: '.$faker->date($format = 'Y-m-d', $max = 'now');
            }

            if ($profile) {
                $generator = new LoremIpsum();
                $users .= '<br>Profile: '.implode('<p>', $generator->getSentences(1));
            }

            $users .= '<br>';
        }

        return view('RandomUser.index',[
        	'users' => $users,
    	]);
    }
}