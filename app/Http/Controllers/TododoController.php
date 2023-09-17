<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Tododo;

class TododoController extends Controller
{
    //
    public function getTodos(){
        $todos = Tododo::all();
        return response()->json([
            'message' => 'OK',
            'data' => $todos
        ], 200);
    }

    public function createTodo(Request $request){
        $todo = new Tododo();
        $todo->title = $request->title;
        $todo->deadline = date('Y-m-d H:i:s', strtotime($request->deadline));
        $todo->tag = $request->tag;
        $todo->status = $request->status;
        $todo->save();

        return response()->json([
            'message' => 'Todo created successfully',
            'data' => $todo
        ], 200);
    }
}
