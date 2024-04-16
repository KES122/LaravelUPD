<?php

namespace App\Http\Controllers;

use App\Models\Task;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Auth;

class TaskController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    // Показать все задачи
    public function index()
    {

        $tasks = Task::orderBy("created_at", 'desc')->get();

        return view('pages.tasks.view.index', $data = [
            'title' => 'Tasks',
            'tasks' => $tasks,
        ]);
    }

    // Страница добавления задачи
    public function taskAdd()
    {
        //return view('home');
        return view('pages.tasks.add.index', $data = [
            'title' => 'Add task',

        ]);
    }

    // Страница редактирования задачи
    public function taskEdit($id)
    {
        $task = Task::findOrFail($id);

        //return view('home');
        return view('pages.tasks.edit.index', $data = [
            'title' => 'Edit task',
            'task' => $task,

        ]);
    }

    // Сохранение новой задачи
    public function taskSave(Request $request)
    {
        $request->validate([
            'taskName' => 'required|string|max:255',
            'description' => 'required|string'
        ]);

        Task::create([
            'title'=> $request->taskName,
            'description' => $request->description,
            'create_user_id' => Auth::id(),
        ]);

        return redirect()->back()
            ->with('status', 'Task created')
            ->with('typeStatus', 'success');
    }


    // Сохранить изменения задачи
    public function taskUpdate($id, Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string'
        ]);

        $task = Task::findOrFail($id);

        $task->update([
            'title'=> $request->title,
            'description' => $request->description,
            'update_user_id' => Auth::id(),
        ]);

        //Task::updated($request->all());

        return redirect()->back()
            ->with('status', 'Task updated')
            ->with('typeStatus', 'success');

    }

    // Удалить задачу
    public function taskDelete($id)
    {
        if ($id == 1){
            return redirect()->route('tasks-view')
                ->with('status', 'This task cannot be deleted')
                ->with('typeStatus', 'info');

        }

        Task::findOrFail($id)->delete();

        return redirect()->route('tasks-view')
            ->with('status', 'Task deleeted')
            ->with('typeStatus', 'success');
    }



}
