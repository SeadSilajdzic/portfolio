<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\SiteManagement;
use App\Models\User;
use Illuminate\Http\Request;

class FrontendController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('index', [
            'info' => SiteManagement::firstOrFail(),
            'categories' => Category::all()
        ]);
    }
}
