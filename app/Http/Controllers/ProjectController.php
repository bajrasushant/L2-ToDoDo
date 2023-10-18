<?php

namespace App\Http\Controllers;
use App\Models\Project;
use App\Models\Tododo;
use Illuminate\Support\Facades\Auth;

use Illuminate\Http\Request;

class ProjectController extends Controller
{
	public function showUserProjects(){
		$user = Auth::user();
		$projects = Project::where('owner_id', $user->id)->get();
		return response()->json([
			'message' => 'OK',
			'data' => $projects
		], 200);
	}

	public function showProjectDetails($id){
		$project = Project::find($id);
		return response()->json([
			'message' => 'OK',
			'data' => $project
		], 200);
	}

	public function createProject(Request $request){
		$user = Auth::user();
		$project = new Project();
		$project->owner_id = $user->id;
		$project->name = $request->name;
		$project->description = $request->description;
		$project->priority = $request->priority;
		$project->deadline = $request->deadline;
		$project->save();

		return response()->json([
			'message' => 'Project created sucessfully',
			'data' => $project
		], 200);
	}

	public function editProject(Request $request, $id){
		$project = Project::find($id);
		$project->name = $request->name;
		$project->description = $request->description;
		$project->priority = $request->priority;
		$project->deadline = $request->deadline;
		$project->save();

		return response()->json([
			'message' => 'Project updated sucessfully',
			'data' => $project
		], 200);
	}

	public function deleteProject($id){
		$project = Project::find($id);
		$project->delete();

		return response()->json([
			'message' => 'Project deleted sucessfully',
			'data' => $project
		], 200);
	}
}
