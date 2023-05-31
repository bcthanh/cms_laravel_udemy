<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Str;
use App\Permission;

class PermissionController extends Controller
{
    public function index(){
        $permissions = Permission::all();
        return view('admin.permissions.index', 
        ['permissions' => $permissions]);
    }
   
    public function store(){
        request()->validate([
            'name' => ['required']
        ]);
        Permission::create([
            'name' => request('name'),
            //slug dung - phan cach
            'slug' => Str::of(Str::lower(request('name')))->slug('-')
        ]
        );
        return back();
    }

    public function destroy(Permission $permission){
        $permission->delete();
        session()->flash('permission-deleted', 'Delete Permission '.$permission->id);
        return back();
    }

    public function edit(Permission $permission){
        return (view('admin.permissions.edit', ['permission'=>$permission]));
    }

    public function update(Permission $permission){
        $permission->name = request('name');
        $permission->slug = Str::of(Str::lower(request('name')))->slug('-');
        if ($permission->isDirty('name')){
            session()->flash('permission-updated', 'Role Updated: ' . request('name'));
        } else {
            session()->flash('permission-updated', 'Nothing has been updated');
        }
        $permission->save();
        return back();
    }
}