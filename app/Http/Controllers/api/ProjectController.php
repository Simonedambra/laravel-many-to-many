<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use App\Models\Project;
use Illuminate\Http\Request;

class ProjectController extends Controller
{
    public function index(){
        $Projects = Project::with('type', 'technologies')->paginate(3);
        return response()->json([
            'success'=> true,
            'results'=>$Projects,
        
        ]);
    }
}
