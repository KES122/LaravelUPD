<?php

namespace App\Http\Controllers;

use \Spatie\Permission\Models\Role;
use App\Models\Position;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Permission;
use Illuminate\Support\Facades\Auth;

class PositionController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    // Показать все должности
    public function index()
    {

        $positions = Position::orderBy("name", 'asc')->get();

        //$position = Position::findOrFail(3);
        //$users_test = $position->users;
        //dd($position, $users_test);

        return view('pages.position.view.index', $data = [
            'title' => 'Position',
            'positions' => $positions,

        ]);
    }



    // Страница добавления Должности
    public function positionAdd()
    {

        return view('pages.position.add.index', $data = [
            'title' => 'Create position',

        ]);
    }

    // Страница редактирования Должности
    public function positionEdit($id)
    {

        $position = Position::findOrFail($id);

        //return view('home');
        return view('pages.position.edit.index', $data = [
            'title' => 'Edit position',
            'position' => $position,
        ]);
    }

    // Сохранение новой Должности
    public function positionSave(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'salary' => 'numeric|min:0',

        ]);

        $salary = Self::checkSalary($request->salary);

        $newPosition = Position::create([
            'name'=> $request->name,
            'salary'=> $salary,
            'description' => $request->description,
            'create_user_id' => Auth::id(),
        ]);


        return redirect()->back()
            ->with('status', 'Position created')
            ->with('typeStatus', 'success');
    }

    // Сохранить изменения Должности
    public function positionUpdate($id, Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'salary' => 'numeric|min:0',
        ]);


        $position = Position::findOrFail($id);

        $salary = Self::checkSalary($request->salary);

        $position->update([
            'name'=> $request->name,
            'salary'=> $salary,
            'description' => $request->description,
            'update_user_id' => Auth::id(),
        ]);

        return redirect()->back()
            ->with('status', 'Position updated')
            ->with('typeStatus', 'success');
    }

    // Удалить Должность
    public function positionDelete($id)
    {
        if ($id == 1){
            return redirect()->route('positions-view')
                ->with('status', 'This Position cannot be deleted')
                ->with('typeStatus', 'info');

        }

        Position::findOrFail($id)->delete();

        return redirect()->route('positions-view')
            ->with('status', 'Position deleted')
            ->with('typeStatus', 'success');
    }



    // Проверка оклада
    public function checkSalary($value){
        $salary = 0;

        if (($value === null) || ($value === ""))
            $salary = 0;
        else
            $salary = (float)$value;

        return $salary;
    }


}
