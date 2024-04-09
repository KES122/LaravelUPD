<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\View\View;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{

     /**
      * @return \Illuminate\Http\Response
      */


    public function create()
    {
        return view('create');
    }

    /**
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $validatedData = $request->validate([
            'field1' => 'required',
            'field2' => 'required',
            'field3' => 'required',
            // Тут не всё, добавить нужно(поля для валидации данных)
        ]);

        $data = $request->session()->get('data', []);
        $data[] = $validatedData;
        $request->session()->put('data', $data);

        return redirect()->route('create')->with('success', 'Данные успешно добавлены');
    }


    /**
     *
     *
     * @param  int  $index
     * @return \Illuminate\Http\Response
     */
    public function destroy($index)
    {
        $data = session('data', []);
        if (isset($data[$index]))
        {
            unset($data[$index]);
            session()->put('data', $data);
            return redirect()->route('create')->with('success', 'Данные успешно удалены');
        }
        else
        {
            return redirect()->route('create')->with('error', 'Не удалось найти данные для удаления');
        }
    }
}
