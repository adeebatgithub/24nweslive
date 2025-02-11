<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\AuthorCategory;
use App\Models\Category;

class AuthorCategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($id)
    {
        $categories = Category::get();
        $permittedCategories = AuthorCategory::with('category')->where('authors_id', $id)->get();
        $author_id = $id;
        return view('admin.author_category', compact('categories', 'permittedCategories', 'author_id'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        echo "hello store";
        AuthorCategory::create([
            'authors_id' => $request->author_id,
            'categories_id' => $request->category_id
        ]);

        return redirect()->route('admin_permission_list', $request->author_id)->with('success', 'Permission Added');

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
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $authorCategory = AuthorCategory::find($id);

        if ($authorCategory) {
            $authorCategory->delete();
            return redirect()->back()->with('success', 'Permission Removed');
        }

        return redirect()->back()->with('error', 'Permission Not Found');
    }
}
