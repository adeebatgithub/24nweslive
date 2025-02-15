<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\AuthorCategoryPermission;
use App\Models\SubCategory;

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
        $permittedCategories = AuthorCategoryPermission::with('category')->where('author_id', $id)->get();
        $excludedCategories = $permittedCategories->pluck('sub_category_id')->toArray();
        $categories = SubCategory::whereNotIn('id', $excludedCategories)->get();
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
        AuthorCategoryPermission::create([
            'author_id' => $request->author_id,
            'sub_category_id' => $request->category_id
        ]);

        return redirect()->route('admin_permission_list', $request->author_id)->with('success', 'Permission Added');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function addAll($id)
    {
        $subCategoryIds = SubCategory::pluck('id')->toArray();

        $data = [];
        foreach ($subCategoryIds as $subCategoryId) {
            $data[] = [
                'author_id' => $id,
                'sub_category_id' => $subCategoryId,
            ];
        }
        AuthorCategoryPermission::insertOrIgnore($data);
        return redirect()->back()->with('success', 'All Permissions Added');
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
        $authorCategory = AuthorCategoryPermission::find($id);

        if ($authorCategory) {
            $authorCategory->delete();
            return redirect()->back()->with('success', 'Permission Removed');
        }

        return redirect()->back()->with('error', 'Permission Not Found');
    }

    public function removeAll($id)
    {
        AuthorCategoryPermission::where('author_id', $id)->delete();
        return redirect()->back()->with('success', 'All Permissions Removed');
    }
}
