<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PagesController extends Controller
{
    public function index() {
        $title = 'Welcome to the gym membership page';
        return view('pages.index')->with('title', $title);
    }

    public function members() {
        $title = 'List of members';
        return view('pages.members')->with('title', $title);
    }

};