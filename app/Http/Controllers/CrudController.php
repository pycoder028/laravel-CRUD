<?php

namespace App\Http\Controllers;

use App\Models\Crud;
use Illuminate\Http\Request;
use Session;

class CrudController extends Controller
{
    // this method show to index file
    public function index(){
        /* $allTodos = Crud::all(); */
        /* $allTodos = Crud::paginate(5); */
        $allTodos = Crud::simplePaginate(5);

        return view('all-todos', compact('allTodos'));
    }

    public function addTodo(){

        return view('add-todo');
    }

    public function storeTodo(Request $request){
        $request->validate( [
            'name' => 'required|max:10',
            'email' => 'required|email|unique:cruds',
        ],[
            'name.required' => 'Name can not be empty',
            'name.max' => 'Your name can not contain more than 10 ch',

            'email.reuired'=> 'Email can not be empty',
            'email.email'=> 'Email must be valid email address',
            'email.unique'=> 'Email must unique',
        ]);

        $crud = new Crud();
        $crud->name = $request->name;
        $crud->email = $request->email;
        $crud->save();

        Session::flash('msg', 'Data successfully added');

        return redirect('/');
    }

    public function editTodo($id){
        $editTodo = Crud::findOrFail($id);

        return view('edit-todo', compact('editTodo'));
    }

    public function updateTodo(Request $request,$id){
        $request->validate( [
            'name' => 'required|max:10',
            'email' => 'required|email|unique:cruds',
        ],[
            'name.required' => 'Name can not be empty',
            'name.max' => 'Your name can not contain more than 10 ch',

            'email.reuired'=> 'Email can not be empty',
            'email.email'=> 'Email must be valid email address',
            'email.unique'=> 'Email must unique',
        ]);

        $crud = Crud::findOrFail($id);
        $crud->name = $request->name;
        $crud->email = $request->email;
        $crud->save();

        Session::flash('msg', 'Data successfully updated');

        return redirect('/');
    }

    public function deleteTodo($id){
        $deleteTodo = Crud::findOrFail($id);
        $deleteTodo->delete();
        Session::flash('msg', 'Data successfully deleted');

        return redirect('/');
    }

}
