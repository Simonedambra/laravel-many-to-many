<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreProjectRequest;
use App\Http\Requests\UpdateProjectRequest;
use App\Models\Project;
use App\Models\Technology;
use App\Models\Type;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class ProjectController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $projects= Project::all();
        $types= Type::all();
        return view('project.index',compact("projects","types"));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $technologies=Technology::all();
        $types= Type::all();
        return view('project.create',compact("types","technologies"));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreProjectRequest $request)
    {
       
        $data = $request->validated();


//gestione slug
$data['slug'] = Str::of($data['title'])->slug();
//gestione immagine


$img_path = $request->hasFile('img') ? Storage::put('uploads', $data['img']) : NULL;

// $img_path = $request->hasFile('cover_image') ? $request->cover_image->store('uploads') : NULL;





$project = new Project();

$project->title = $data['title'];

$project->slug = $data['slug'];
$project->img = $img_path;
$project->type_id = $data['type_id'];

$project->save();
if ($request->has('technologies')) {
    $project->technologies()->attach($request->technologies);
} 


//$project->fill($data);


return redirect()->route('admin.Projects.index')->with('message', 'Progetto creato con successo!');
       
    }

    /**
     * Display the specified resource.
     */
    public function show(Project $project)
{
    $types= Type::all();
    return view('project.show', compact('project',"types"));
}

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Project $project)
    {
    $technologies=Technology::all();
    $types= Type::all();
        return view('project.edit',compact("project","types","technologies"));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateProjectRequest $request, project $project)
    { 
        
         // Gestione dello slug
    $data = $request->all();
    $data['slug'] = Str::of($data['title'])->slug();

    // Gestione dell'immagine
    $img_path = $request->hasFile('img') ? Storage::put('uploads', $data['img']) : NULL;
    
    $project->title = $data['title'];
    $project->slug = $data['slug'];
    $project->img = $img_path;
    $project->type_id = $data['type_id'];
    
    // Salvataggio delle tecnologie
    if ($request->has('technologies')) {
        $project->technologies()->sync($data['technologies']);
    } else {
        $project->technologies()->sync([]);
    }

    $project->save();
                    
        return redirect()->route('admin.Projects.index')->with('message'.' - Post aggiornato correttamente');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(project $project)
    //public function destroy(string $id)
    {
        // $pasta = Pasta::findOrFail($id);

        $project->delete();

        return redirect()->route('admin.Projects.index');
    }
}
