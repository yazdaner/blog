<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Validation\Rule;
use Spatie\Permission\Models\Permission;

class PermissionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $permissions = Permission::latest()->paginate(20);
        return view('admin.permissions.index',compact('permissions'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.permissions.create');

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => ['required','unique:permissions,name'],
            'display_name' => 'required','unique:permissions,display_name',
        ]);
        Permission::create([
            'name' => $request->name,
            'display_name' => $request->display_name,
            'guard_name' => 'web'
        ]);

        $request->session()->flash('success','مجوز مورد نظر ایجاد شد');
        return redirect()->route('admin.permissions.index');
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
    public function edit(Permission $permission)
    {
        return view('admin.permissions.edit',compact('permission'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Permission $permission)
    {
        $request->validate([
            'name' => ['required',Rule::unique('permissions','name')->ignore($permission->id)],
            'display_name' => ['required',Rule::unique('permissions','display_name')->ignore($permission->id)],
        ]);

        $permission->update(
            $request->only(['name','display_name'])
        );

        $request->session()->flash('success','مجوز مورد نظر آپدیت شد');
        return redirect()->route('admin.permissions.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request,Permission $permission)
    {
        $request->session()->flash('success','مجوز مورد نظر حذف شد');
        $permission->delete();
        return redirect()->route('admin.permissions.index');

    }
}
