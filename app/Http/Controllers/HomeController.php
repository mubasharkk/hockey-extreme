<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Xinax\LaravelGettext\Facades\LaravelGettext;
use Illuminate\Support\Facades\Redirect;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('pages.general.welcome');
    }

    /**
     * Changes the current language and returns to previous page
     * @return Redirect
     */
    public function changeLang($locale = null)
    {
        LaravelGettext::setLocale($locale);
        return Redirect::to("{$locale}/");
    }

    public function contact()
    {
        return view('pages.general.contact');
    }
}
