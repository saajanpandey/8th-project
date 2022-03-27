<?php

namespace App\Http\Controllers\jobCategories;

use App\Http\Controllers\Controller;
use App\Http\Requests\JobCategoriesRequest;
use App\Models\JobCategories;
use Illuminate\Http\Request;

class JobCategoriesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $categories = JobCategories::paginate(10);
        return view('jobCategories.index', compact('categories'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('jobCategories.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(JobCategoriesRequest $request)
    {
        $data = $request->except('_token');
        JobCategories::create($data);
        return redirect()->route('categories.index')->with('create', '');
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
    public function edit($id)
    {
        $category = JobCategories::find($id);
        return view('jobCategories.edit', compact('category'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(JobCategoriesRequest $request, $id)
    {
        $data = $request->except('_token');
        $category = JobCategories::find($id);
        $category->fill($data)->save();
        return redirect()->route('categories.index')->with('update', '');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $category = JobCategories::find($id);
        $category->delete();
        return redirect()->route('categories.index')->with('delete', '');
    }
}
