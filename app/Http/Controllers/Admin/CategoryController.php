<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $categories = Category::with('parent')->latest()->paginate(20);
        return view('admin.categories.index',compact('categories'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Category::where('parent_id',0)->get();
        return view('admin.categories.create',compact('categories'));
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
            'name' => 'required|unique:categories,name',
            'parent_id' => 'required',
        ]);
        Category::create(
            $request->only('name','parent_id')
        );

        $request->session()->flash('success','دسته بندی مورد نظر ایجاد شد');
        return redirect()->route('admin.categories.index');
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
    public function edit(Category $category)
    {
        $parentCategories = Category::where('parent_id',0)->where('id','!=',$category->id)->get();
        return view('admin.categories.edit',compact('parentCategories','category'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Category $category)
    {
        $request->validate([
            'name' => ['required',Rule::unique('categories','name')->ignore($category->id)],
            'parent_id' => 'required',
        ]);

        $category->update(
            $request->only('name','parent_id')
        );

        $request->session()->flash('success','دسته بندی مورد نظر آپدیت شد');
        return redirect()->route('admin.categories.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request,Category $category)
    {
        $request->session()->flash('success','دسته بندی مورد نظر حذف شد');
        $category->delete();
        foreach ($category->children as $category) {
            $category->delete();
        }
        return redirect()->route('admin.categories.index');
    }
}
