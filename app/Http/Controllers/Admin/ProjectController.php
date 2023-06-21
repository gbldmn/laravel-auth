<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Project;
use App\Http\Requests\StoreProjectRequest;
use App\Http\Requests\UpdateProjectRequest;


class ProjectController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $projects = Project::All();
        
    

        return view('project', compact('projects'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.projects.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreProjectRequest $request)
    {
        $form_data = $request->validated();
        // $request->validate(
        //     [    
        //     'title' => 'required',
        //     'content' => 'required',
        //     'slug' => 'required'
        //     ],
        //     [   
        //     'title.required' => 'non hai compilato il campo titolo',
        //     'content.required' => 'non hai compilato il campo content',
        //     'slug.required' => 'non hai compilato il campo slug'
        //     ]
        // );



        // $form_data = $request->all();


        $new_project = new project();
        $new_project->fill( $form_data );

        $new_project->save();



         return redirect()->route('project.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Project $project)
    {
        
        return view('admin.projects.show', compact('project'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Project $project)
    {
        return view('admin.projects.edit', compact('project'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateProjectRequest $request, Project $project)
    {
        $form_data = $request->validated();
        // $request->validate(
        //     [    
        //     'title' => 'required',
        //     'content' => 'required',
        //     'slug' => 'required'
        //     ],
        //     [   
        //     'title.required' => 'non hai compilato il campo titolo',
        //     'content.required' => 'non hai compilato il campo content',
        //     'slug.required' => 'non hai compilato il campo slug'
        //     ]
        // );



        // $form_data = $request->all();

        $project->update($form_data);


         return redirect()->route('project.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Project $project)
    {
        $project->delete();
        return redirect()->route('project.index');
    }
}
