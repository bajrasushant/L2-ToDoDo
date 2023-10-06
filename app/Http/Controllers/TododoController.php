<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Tododo;
use Illuminate\Support\Facades\Auth;
class TododoController extends Controller
{
    //
    public function getTodos(){
        // $todos = Tododo::all();
			$user = Auth::user();
			$todos = Tododo::whereHas('project', function($query) use ($user) {
				$query->where('owner_id', $user->id);
			})->with('project')->get();
        return response()->json([
            'message' => 'OK',
            'data' => $todos
        ], 200);
    }

    public function createTodo(Request $request){
        $todo = new Tododo();
        $todo->title = $request->title;
        $todo->deadline = date('Y-m-d', strtotime($request->deadline));
        $todo->tag = $request->tag;
        $todo->status = $request->status;
				$todo->project_id = $request->projectId;
        $todo->save();

        return response()->json([
            'message' => 'Todo created successfully',
            'data' => $todo
        ], 200);
    }

    public function deleteTodo (Request $request){
        $todo = Tododo::find($request->id);
        $todo->delete();

        return response()->json([
            'message' => 'Todo deleted successfully'
        ], 200);
    }

    public function updateTodo (Request $request){
        $todo = Tododo::find($request->id);
        $todo->status = $request->status;
        $todo->save();

        return response()->json([
            'message' => 'Todo updated successfully',
            'data' => $todo
        ], 200);
    }

    public function editTodo (Request $request){
        $todo = Tododo::find($request->id);
        $todo->title = $request->title;
        $todo->deadline = date('Y-m-d', strtotime($request->deadline));
        $todo->save();

        return response()->json([
            'message' => 'Todo updated successfully',
            'data' => $todo
        ], 200);
    }
}
