<?php

namespace App\Http\Controllers;

use \Spatie\Permission\Models\Role;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Permission;
use Illuminate\Support\Facades\Auth;

class RoleController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    // Показать все роли
    public function index()
    {

        if (auth()->user()->name !== 'admin')
            $roles = Role::orderBy("name", 'asc')->with('permissions')->where('name', '!=', 'super-admin')->get();
        else
            $roles = Role::orderBy("name", 'asc')->with('permissions')->get();

        $countPermissions = count(Permission::orderBy("name", 'asc')->get());

        return view('pages.roles.view.index', $data = [
            'title' => 'Roles',
            'roles' => $roles,
            'countPermissions' => $countPermissions

        ]);
    }



    // Страница добавления Роли
    public function roleAdd()
    {
        $permissions = Permission::orderBy("name", 'asc')->get();

        return view('pages.roles.add.index', $data = [
            'title' => 'Create role',
            'permissions' => $permissions

        ]);
    }

    // Страница редактирования Роли
    public function roleEdit($id)
    {

        if (auth()->user()->name !== 'admin')
            $role = Role::where('name', '!=', 'super-admin')->findOrFail($id);
        else
            $role = Role::findOrFail($id);

        $permissions = Permission::orderBy("name", 'asc')->get();


        //return view('home');
        return view('pages.roles.edit.index', $data = [
            'title' => 'Edit role',
            'role' => $role,
            'permissions' => $permissions
        ]);
    }

    // Сохранение новой Роли
    public function roleSave(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:50',
            'permissions' => 'required',
            'permissions.*' => 'required|integer|exists:permissions,id',
        ]);

        $newRole = Role::create([
            'name'=> $request->name,
            'description' => $request->description,
            'create_user_id' => Auth::id(),
        ]);

        // Добавление прав к новой Роли
        $permissions = Permission::whereIn('id', $request->permissions)->get();
        $newRole->syncPermissions($permissions);

        return redirect()->back()
            ->with('status', 'Role created')
            ->with('typeStatus', 'success');
    }

    // Сохранить изменения Роли
    public function roleUpdate($id, Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:50',
            'permissions' => 'required',
            'permissions.*' => 'required|integer|exists:permissions,id',
        ]);

        $role = Role::where('name', '!=', 'super-user')->findOrFail($id);

        $role->update([
            'name'=> $request->name,
            'description' => $request->description,
            'update_user_id' => Auth::id(),
        ]);

        // Сохранение новых прав у Роли
        $permissions = Permission::whereIn('id', $request->permissions)->get();
        $role->syncPermissions($permissions);

        return redirect()->back()
            ->with('status', 'Role updated')
            ->with('typeStatus', 'success');
    }

    // Удалить роль
    public function roleDelete($id)
    {
        if ($id == 1){
            return redirect()->route('roles-view')
                ->with('status', 'This Role cannot be deleted')
                ->with('typeStatus', 'info');

        }

        Role::findOrFail($id)->delete();

        return redirect()->route('roles-view')
            ->with('status', 'Role deleted')
            ->with('typeStatus', 'success');
    }


}
