<?php

namespace App\Http\Controllers;

use App\Models\SiteManagement;
use Illuminate\Http\Request;

class SiteManagementController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.management');
    }

    public function home()
    {
        return view('admin.sections.home', [
            'info' => SiteManagement::firstOrFail(),
        ]);
    }

    public function home_store(Request $request)
    {
        $request->validate([
            'main_title' => 'bail|required|string',
            'facebook' => 'nullable|url',
            'behance' => 'nullable|url',
            'twitter' => 'nullable|url',
            'instagram' => 'nullable|url',
            'skype' => 'nullable|url',
            'm_teams' => 'nullable|url',
            'linkedin' => 'nullable|url',
            'aboutDesc' => 'nullable|string|max:350',
            'role_title' => 'bail|required|string',
            'short_note' => 'nullable|string|max:150',
            'birthday' => 'bail|required|date',
            'website' => 'bail|required|string',
            'phone' => 'bail|required|string',
            'city' => 'bail|required|string',
            'age' => 'bail|required|string',
            'education' => 'bail|required|string',
            'mail' => 'bail|required|email',
            'status' => 'bail|required|string',
            'aboutme' => 'bail|required|string',
            'featured' => 'nullable|image',
            'cv' => 'nullable|url',
        ]);

        $management = SiteManagement::firstOrFail();

        if($request->hasFile('featured')){
            $featured = $request->featured;
            $featured_new_name = time() . $featured->getClientOriginalName();
            $featured->move('uploads/management', $featured_new_name);
            $management->featured = '/uploads/management/' . $featured_new_name;

            SiteManagement::where('id', 1)->update([
                'featured' => '/uploads/management/' . $featured_new_name,
            ]);
        }


        SiteManagement::where('id', 1)->update([
            'main_title' => $request->main_title,
            'facebook' => $request->facebook,
            'behance' => $request->behance,
            'twitter' => $request->twitter,
            'instagram' => $request->instagram,
            'skype' => $request->skype,
            'm_teams' => $request->m_teams,
            'linkedin' => $request->linkedin,
            'aboutDesc' => $request->aboutDesc,
            'role_title' => $request->role_title,
            'short_note' => $request->short_note,
            'birthday' => $request->birthday,
            'website' => $request->website,
            'phone' => $request->phone,
            'city' => $request->city,
            'age' => $request->age,
            'education' => $request->education,
            'mail' => $request->mail,
            'status' => $request->status,
            'aboutme' => $request->aboutme,
            'cv' => $request->cv,
        ]);

        return redirect()->back()->withToastSuccess('Changes saved!');
    }

    public function portfolio()
    {
        return view('admin.sections.portfolio');
    }

    public function services()
    {
        return view('admin.sections.services');
    }

    public function contact()
    {
        return view('admin.sections.contact');
    }



}
