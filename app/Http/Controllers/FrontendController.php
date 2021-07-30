<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Project;
use App\Models\SiteManagement;

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
            'categories' => Category::all(),
            'projects' => Project::withoutTrashed()->with('category')->get()
        ]);
    }

    public function show(Project $project)
    {
        return view('portfolio-details', [
            'project' => $project
        ]);
    }
}
