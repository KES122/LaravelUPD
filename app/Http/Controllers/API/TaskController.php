<?php

namespace App\Http\Controllers\Api\v1;

use App\Http\Controllers\Api\v1\BaseController as BaseController;
use App\Http\Resources\Task as TaskResource;
use Illuminate\Http\Request;
use App\Models\Task;
use Illuminate\Support\Facades\Auth;


class TaskController extends BaseController
{

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        //$res = $this->middleware('permission:tasks-show');

    }

    public function index(Request $request){

        /** @var \App\Models\User $user */
        $user = Auth::user();

        if (!$user->can('tasks-show')){
            return $this->handleError('User does not have the right permissions.', ['error' => 'User does not have the right permissions.']);
        }


        $tasks = Task::orderBy("created_at", 'desc')->get();


        return $this->handleResponse(TaskResource::collection($tasks), 'All Tasks');
    }

}
