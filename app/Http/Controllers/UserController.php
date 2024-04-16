<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Position;
use \Spatie\Permission\Models\Role;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;


class UserController extends Controller
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
    // Показать всех пользователей
    public function index()
    {

        if (auth()->user()->name !== 'admin')
            $users = User::orderBy("name", 'asc')->with('roles')->where('name', '!=', 'admin')->get();
        else
            $users = User::orderBy("name", 'asc')->get();

        //dd($users);

        return view('pages.users.view.index', $data = [
            'title' => 'Users',
            'users' => $users

        ]);
    }

    // Страница добавления пользователя
    public function userAdd()
    {
        $roles = Role::orderBy("name", 'asc')->get();
        $positions = Position::orderBy("name", 'asc')->get(); // все роли

        return view('pages.users.add.index', $data = [
            'title' => 'Create user',
            'roles' => $roles,
            'positions' => $positions

        ]);
    }

    // Страница редактирования пользователя
    public function userEdit($id)
    {
        if (auth()->user()->name !== 'admin')
            $user = User::where('name', '!=', 'admin')->findOrFail($id);
        else
            $user = User::findOrFail($id);

        $roles = Role::orderBy("name", 'asc')->get(); // все роли
        $userRoles = $user->getRoleNames(); // роли пользователя

        $positions = Position::orderBy("name", 'asc')->get(); // все роли
        $userPosition = $user->position;

        $token = $user->tokens->first();
        //dd($user, $token);

        //return view('home');
        return view('pages.users.edit.index', $data = [
            'title' => 'Edit user',
            'user' => $user,
            'roles' => $roles,
            'userRoles' => $userRoles,
            'positions' => $positions,
            'userPosition' => $userPosition
        ]);
    }

    // Сохранение нового пользователя
    public function userSave(Request $request)
    {
        $request->validate([
            'name' => ['required', 'string', 'max:255', 'unique:users'],
            'email' => ['required', 'string', 'email', 'max:255'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
        ]);

        // Добавление пользователя в таблицу Users
        $newUser = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'full_name' => $request->full_name,
            'position_id' => $request->position_id,
            'password' => Hash::make($request->password),
            'description' => $request->description,
            'create_user_id' => Auth::id(),
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);

        // Присовить пользователю роль помолчанию
        // Добавление прав к новой Роли
        $roles = Role::whereIn('id', $request->roles)->get();
        $newUser->syncRoles($roles);
        //$user->assignRole('user');

        return redirect()->back()
            ->with('status', 'User created')
            ->with('typeStatus', 'success');
    }


    // Сохранить изменения у пользователя
    public function userUpdate($id, Request $request)
    {
        $request->validate([
            'email' => ['required', 'string', 'email', 'max:255'],
        ]);

        if (auth()->user()->name !== 'admin')
            $user = User::where('name', '!=', 'admin')->findOrFail($id);
        else
            $user = User::findOrFail($id);

        //dd($user, $request->full_name, $request->description);
        $user->update([
            'email' => $request->email,
            'full_name' => $request->full_name,
            'description' => $request->description,
            'position_id' => $request->position_id,
            'update_user_id' => Auth::id(),
        ]);

        // Сохранение новых ролей у пользовтеля
        if ($request->name !== 'admin'){
            $roles = Role::whereIn('id', $request->roles)->get();
            $user->syncRoles($roles);
        }


        return redirect()->back()
            ->with('status', 'User updated')
            ->with('typeStatus', 'success');

    }

    // Создать токен
    public function userCreateToken($id, Request $request)
    {
        $request->validate([
            'id' => ['integer'],
        ]);

        $user = User::where('name', '!=', 'admin')->findOrFail($id);

        $tokenName = 'api:'.(string)strtotime("now").':'.(string)random_int(100000, 999999);

        // Удалить все токены
        $user->tokens()->delete();

        $token = $user->createToken($tokenName)->plainTextToken;

        return redirect()->back()
            ->with('status', 'Token created')
            ->with('typeStatus', 'success')
            ->with('token', $token);

    }

    // Обновить токен
    public function userUpdateToken($id, Request $request)
    {
        $request->validate([
            'id' => ['integer'],
        ]);

        $user = User::where('name', '!=', 'admin')->findOrFail($id);

        $tokenName = 'api:'.(string)strtotime("now").':'.(string)random_int(100000, 999999);

        // Удалить все токены
        $user->tokens()->delete();

        $token = $user->createToken($tokenName)->plainTextToken;

        return redirect()->back()
            ->with('status', 'Token updated')
            ->with('typeStatus', 'success')
            ->with('token', $token);

    }

    // Удалить токены
    public function userDeleteToken($id, Request $request)
    {
        $request->validate([
            'id' => ['integer'],
        ]);

        $user = User::where('name', '!=', 'admin')->findOrFail($id);

        // Удалить все токены
        $user->tokens()->delete();

        return redirect()->back()
            ->with('status', 'Tokens deleted')
            ->with('typeStatus', 'success');

    }

     // Получить локализацию пользователя
     public static function getLangDefault($id)
     {
        $user = User::findOrFail($id);

        if (($user != null) or (trim($user->lang_default) === '')) {
            return 'ru';
        }

        return $user->lang_default;

     }

    // Проверка токена
    public static function checkToken($userId, $requestToken)
    {
        if (($requestToken !== null) && ($requestToken !== "") && (strpos($requestToken, '|')))
        {
            $user = User::findOrFail($userId);
            $userTokenHash = $user->tokens->first()->token;
            $userTokenId = $user->tokens->first()->id;

            $getToken = explode('|', $requestToken, 2);
            $getTokenId = $getToken[0];
            $getTokenHash = hash('sha256', $getToken[1]);

            if (($userTokenHash === $getTokenHash) && ((int)$userTokenId === (int)$getTokenId))
                return true;

        }
        else
            return false;
    }


}
