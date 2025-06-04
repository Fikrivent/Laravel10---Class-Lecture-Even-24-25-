<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class CategoryController extends Controller
{
    public function totalFoods()
    {
        $report = DB::table('categories as c')
                ->join('foods as f',"c.id","=","f.category_id")
                ->select("c.name",DB::raw("count(f.name) as TotalFood"))
                ->groupBy("c.name")
                ->get();

        return view("totalfood", compact('report'));
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $data = Category::all();

        return view("category.index", compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        $data = Category::all();
        return view('category.create', compact('data'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        $category = new Category();
        $category->name = $request->get('name');
        $category->save();

        return redirect()->route('category.index')->with('status','Penambahan data kategori berhasil !');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Category $category)
    {
        //
        // dd($category);
        $data = $category;
        return view('category.update', compact('category'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Category $category)
    {
        //
        $category->name = $request->name;
        $category->save();

        return redirect()->route('category.index')->with('status','Update data berhasil !');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Category $category)
    {
         $this->authorize('delete-permission', Auth::user());
        //
        try {
            //code...
            $category->delete();
            return redirect()->route('category.index')->with('status','Delete data berhasil !');
        } catch (\PDOException $ex) {
            //throw $th;
            $error = "Gagal menghapus data ! Hubungi admin untuk bantuan lebih lanjut.";
            return redirect()->route("category.index")->with("error",$error);
        }
        

        
    }

    public function showInfo()
    {
        $highestFoodCategory = Category::withCount('foods')
        ->orderByDesc('foods_count')
        ->first(); 

        return response()->json(array(
                'status' => 'oke',
                'msg' => "<div class='alert alert-info'>
                Category with highest amount of food menu is  <b>'".$highestFoodCategory->name."' with Total Menu = ".$highestFoodCategory->foods_count."</b></div>"
            ), 200);

//         return response()->json(array(
//             'status' => 'oke',
//             'msg' => "<div class='alert alert-info'>
//   Tutorial membuat boostrap table stripe ada di <a href='https://getbootstrap.com/docs/4.0/content/tables/'>sini</a>.</div>"
//         ), 200);

    }

    public function showListFoods()
    {
        $category = Category::find($_POST['idcat']);
        $name = $category->name;
        $data = $category->foods;
        return response()->json(array(
                'status' => 'oke',
                'title' => $name.' Food List',
                'body' => view('category.showListFood', compact('name', 'data'))->render()
              ), 200);
    }

    public function getEditForm(Request $request)
    {
        $id = $request->id;
        $data = Category::find($id);
        return response()->json(array(
            'status' => 'oke',
            'msg' => view("category.getEditForm", compact('data'))->render()
        ),200);
    }

    public function getEditFormB(Request $request)
    {
        $id = $request->id;
        $data = Category::find($id);
        return response()->json(array(
            'status' => 'oke',
            'msg' => view("category.getEditFormB", compact('data'))->render()
        ),200);
    }

        public function saveDataUpdate(Request $request)
        {
            $id = $request->id;
            $data = Category::find($id);
            $data->name = $request->name;
            $data->save();
            return response()->json(array('status' => 'oke', 'msg' => 'type data is up-to-date !'), 200);
        }

        public function deleteData(Request $request)
        {
            $id = $request->id;
            $data = Category::find($id);
            $data->delete();
            return response()->json(array(
                'status' => 'oke',
                'msg' => 'type data is removed !'
                ),200);
        }
        
}
