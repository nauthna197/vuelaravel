<?php

namespace App\Http\Controllers;

use App\Category;
use App\Todo;
use Faker\Factory;
use Illuminate\Http\Request;

class TodoController extends Controller
{
    public function fakeDate()
    {
        $todo1 = new Todo();
        $faker = Factory::create('en_US');
        $limit = 2;
        $todoList = ['Get up at 6', 'Go to gym and have breakfast done before 8',];
        for ($i = 0; $i < $limit; $i++) {
            $todo1->title = '';
            $todo1->content = $todoList[$i];
            $todo1->status = $faker->numberBetween(0, 1);
            $todo1->save();
        }
    }

    public function get(){
        return view('table');
    }

    public function addTodo(Request $request){
       $todo = new Todo($request->only(['content','category_id']));
       $todo->save();
       return redirect('/get');
    }

    public function delete(Request $request){
        $todo = Todo::find($request->id);
        $todo->delete();
    }

    public function getJson(){
        $todos = Todo::paginate(10);
        /** @var Todo $todo */
        foreach ($todos as $todo){
            $todo->category;
        }
        return response()->json($todos);
    }


}
