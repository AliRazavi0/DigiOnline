<?php

namespace App\Http\Controllers\Website\Profile;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ProfileController extends Controller
{
    public function __construct()
    {
        $this->middleware(['password.confirm']);
    }

    public function index()
    {
        return view('website.profile.index');
    }
}
