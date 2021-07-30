<?php

namespace App\Http\Controllers;

use App\Models\Contact;
use App\Models\Project;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.index');
    }

    public function trashed()
    {
        return view('admin.trashed', [
            'projects' => Project::onlyTrashed()->get(),
            'contacts' => Contact::onlyTrashed()->get()
        ]);
    }
}
