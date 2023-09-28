<?php

namespace App\Http\Controllers;
use App\Models\Project;
use Illuminate\Support\Facades\Auth;

use Illuminate\Http\Request;

class ProjectController extends Controller
{
	public function showUserProjects(){
		$projects = Project::all();
		return response()->json([
			'message' => 'OK',
			'data' => $projects
		], 200);
	}
}
