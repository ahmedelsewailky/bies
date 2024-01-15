<?php

namespace App\Http\Controllers\Dashboard;

use App\Models\Category;
use App\Http\Controllers\Controller;
use App\Http\Requests\{StoreCategoryRequest, UpdateCategoryRequest};
use RealRashid\SweetAlert\Facades\Alert;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('dashboard.categories.index')->with([
            'categories' => Category::all()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('dashboard.categories.create')->with([
            'categories' => Category::all()
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreCategoryRequest $request)
    {
        if ($request->parent_id) {

            $inputs = $request->except(['_token', 'category_image']);

        } else {
            // Assign name to icon request.
            $icon_name = str()->slug($request->name) . '.' . $request->icon->extension();

            // Move icon image to icons folder at public path.
            $request->icon->move(public_path('dashboard/dist/img/icons'), $icon_name);

            // Create folder with the same category name.
            mkdir(storage_path('app\public\\') . str()->slug($request->name), 0777, true);;

            // Get inputs array.
            $inputs = $request->except(['_token', 'parent_id']);

            // Assign icons column value.
            $inputs['icon'] = $icon_name;
        }

        Category::create($inputs);

        Alert::success('تهانينا', 'تم اضافة القسم بنجاح');

        return redirect()->route('category.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(Category $category)
    {
        abort(404);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Category $category)
    {
        return view('dashboard.categories.edit')->with([
            'categories' => Category::all(),
            'category' => $category
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateCategoryRequest $request, Category $category)
    {
        if ($request->parent_id) {

            $inputs = $request->except(['_token', 'category_image']);

            // Convert from main to sub category.
            if ($category->icon) {
                // Remove old image.
                unlink(public_path('dashboard/dist/img/icons/') . $category->icon);

                // Remove category folder.
                rmdir(storage_path('app\public\\') . str()->slug($request->name));
            }

        } else {
            if ($request->icon) {
                // Assign name to icon request.
                $icon_name = str()->slug($request->name) . '.' . $request->icon->extension();

                // Remove old image.
                unlink(public_path('dashboard/dist/img/icons/') . $category->icon);

                // Move icon image to icons folder at public path.
                $request->icon->move(public_path('dashboard/dist/img/icons'), $icon_name);

                rmdir(storage_path('app\public\\') . str()->slug($request->name));

                // Create folder with the same category name.
                mkdir(storage_path('app\public\\') . str()->slug($request->name), 0777);

                // Get inputs array.
                $inputs = $request->except(['_token', 'parent_id']);

                // Assign icons column value.
                $inputs['icon'] = $icon_name;
            }
            $inputs['icon'] = $category->icon;
        }

        $category->update($inputs);

        Alert::success('عملية ناجحة', 'تم حفظ التغيرات بنجاح');

        return redirect()->route('category.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Category $category)
    {
        $category->delete();
        return redirect()->route('category.index');
    }
}
