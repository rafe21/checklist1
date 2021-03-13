<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Task;
use App\models\Category;
use Session;

class TaskController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data['categories'] = Category::get();
        $data['storedTasks'] = Task::with('category')->orderBy('id','desc')->get();
        return view('tasks.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
       $this->validate($request,[
            'newTaskName' => 'required|min:5|max:255',
            'category_id' => 'required',

       ]);

        $task = new Task;
        $task->name = $request->newTaskName ;
        $task->category_id = $request->category_id ;

        $task->save();

        Session::flash('success', 'New Task has been successfully added.');
        
        return redirect() -> route('tasks.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request)
    {
        $task = Task::find($request->task_id);
        return $task;
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    /*public function update(Request $request, $id)
    {
        $this->validate($request, [
            'updatedTaskName' => 'required|min:5|max:255'
        ]);


        $task = Task::find($id);

        $task->name = $request->updatedTaskName;

        $task->save();

        Session::flash('success', 'Task #' . $id . ' has been successfully updated');

        return redirect()->route('tasks.index');
    }*/
    

    public function updateByModal(Request $request)
    {
        $this->validate($request, [
            'name' => 'required|min:5|max:255'
        ]);
        
        $task = Task::find( $request->id);

        $task->name = $request->name;

        $task->save();

        Session::flash('success', 'Task #' . $request->id . ' has been successfully updated');

        return redirect()->route('tasks.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $task = Task::find($id);

        $task->delete();

        Session::flash('success', 'Task #' . $id . ' has been successfully deleted');

        return redirect()->route('tasks.index');
    }
    //realations methods

    public function getCategoryTasks(){
        category::find(1);

        return $category;
     }
}


  