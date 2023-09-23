<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Spatie\Permission\Models\Role;
use App\Http\Controllers\Controller;
use Illuminate\Validation\Rule;
use Spatie\Permission\Models\Permission;

class RoleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $roles = Role::latest()->paginate(20);
        return view('admin.roles.index',compact('roles'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $permissions = Permission::all();
        return view('admin.roles.create',compact('permissions'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        try {
            DB::beginTransaction();

            $request->validate([
                'name' => 'required|unique:roles,name',
                'display_name' => 'required|unique:roles,display_name'
            ]);

            $role = Role::create([
                'name' => $request->name,
                'display_name' => $request->display_name,
                'guard_name' => 'web'

            ]);

            $role->givePermissionTo($request->except(['_token', 'display_name', 'name']));

            DB::commit();
        } catch (\Exception $ex) {
            DB::rollBack();
            return redirect()->back();
        }
        $request->session()->flash('success','نقش مورد نظر ایجاد شد');
        return redirect()->route('admin.roles.index');

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Role $role)
    {
        return view('admin.roles.show',compact('role'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Role $role)
    {
        $permissions = Permission::all();
        return view('admin.roles.edit',compact('role','permissions'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,Role $role)
    {
        try {
            DB::beginTransaction();

            $request->validate([
                'name' => ['required',Rule::unique('roles','name')->ignore($role->id)],
                'display_name' => ['required',Rule::unique('roles','display_name')->ignore($role->id)]
            ]);

            $role->update([
                'name' => $request->name,
                'display_name' => $request->display_name,
                'guard_name' => 'web'

            ]);

            $role->syncPermissions($request->except(['_token', 'display_name', 'name','_method']));

            DB::commit();
        } catch (\Exception $ex) {
            DB::rollBack();
            return redirect()->back();
        }

        $request->session()->flash('success','نقش مورد نظر آپدیت شد');
        return redirect()->route('admin.roles.index');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request,Role $role)
    {
        $role->delete();
        $request->session()->flash('success','نقش مورد نظر حذف شد');
        return redirect()->route('admin.roles.index');
    }
}
