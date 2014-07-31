<?php

class HomeController extends \BaseController {

    public function index() {
        return View::make('home');
    }

    public function devs() {
        return View::make('dev');
    }

    public function sendEmail() {
        $email = Input::get('email');
        $user = new User(['email' => $email]);
        $user->save();
        return Redirect::route('home');
        // TODO SAVE EMAIL IN BD
    }

}