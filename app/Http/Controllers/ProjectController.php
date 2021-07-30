<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Project;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class ProjectController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.projects.index', [
            'projects' => Project::withoutTrashed()->with('category')->get(),
            'categories' => Category::all()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //Done via modal on index page
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'bail|required|string',
            'description' => 'bail|required',
            'project_url' => 'nullable|url',
            'featured' => 'bail|required|image',
            'slug' => 'nullable|string',
            'client' => 'bail|required|string',
            'category_id' => 'bail|required'
        ]);

        //Make sure slug will be sent
        if(!empty($request->slug))
        {
            $slug = Str::slug($request->slug);
        } else {
            $slug = Str::slug($request->title);
        }

        //Check if there is file
        if($request->hasFile('featured'))
        {
            $featured = $request->featured;
            $featured_new = time() . $featured->getClientOriginalName();
            $featured->move('uploads/projects', $featured_new);
        }

        //Fill project table
        Project::create([
            'title' => $request->title,
            'description' => $request->description,
            'project_url' => $request->project_url,
            'featured' => '/uploads/projects/' . $featured_new,
            'slug' => $slug,
            'client' => $request->client,
            'category_id' => $request->category_id
        ]);

        return redirect()->back()->withToastSuccess('Project added');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Project $project)
    {
        return view('admin.projects.show', [
            'project' => $project
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Project $project)
    {
        //Done via modal on index page
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Project $project)
    {


        $request->validate([
            'title' => 'required|string',
            'description' => 'required',
            'featured' => 'nullable|image',
            'category_id' => 'required',
            'slug' => 'nullable|string',
            'project_url' => 'nullable|url',
            'client' => 'required|string'
        ]);

        if(!empty($request->slug))
        {
            $slug = Str::slug($request->slug);
        } else {
            $slug = Str::slug($request->title);
        }

        if($request->hasFile('featured')){
            $featured = $request->featured;
            $featured_new = time() . $featured->getClientOriginalName();
            $featured->move('uploads/projects', $featured_new);
            $project->featured = '/uploads/projects/' . $featured_new;
            $project->save();
        }

        $project->update([
            'title' => $request->title,
            'description' => $request->description,
            'category_id' => $request->category_id,
            'slug' => $slug,
            'project_url' => $request->project_url,
            'client' => $project->client
        ]);

        return redirect()->back()->withToastInfo('Project updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param Project $project
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $project = Project::onlyTrashed()->where('id', $id)->firstOrFail();
        $project->forceDelete();

        return redirect()->back()->withToastError('Project deleted');
    }

    public function trash(Project $project)
    {
        $project->delete();

        return redirect()->back()->withToastWarning('Project trashed');
    }

    public function restore($id)
    {
        $project = Project::onlyTrashed()->where('id', $id)->firstOrFail();
        $project->restore();

        return redirect()->back()->withToastSuccess('Project restored');
    }
}
