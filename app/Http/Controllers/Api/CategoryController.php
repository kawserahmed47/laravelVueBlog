<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Category;
use Validator;
class CategoryController extends Controller
{

    // public function __construct(){
    //     $this->middleware('auth:api');
    // }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $category = Category::all();
        return response()->json($category,200);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validate = Validator::make($request->all(),[
            'name'=>'required|max:190|unique:categories',
            'description'=>'nullable',
            'status'=>'nullable|boolean'
        ]);

        if($validate->fails()){
            return response()->json($validate->errors(),500);
        }else{
            $category = new Category();
            $category->name = $request->name;
            $category->description = $request->description;
            $category->status = $request->status;
            $category->created_by = 1;
            $category->updated_by =1;
            if($category->save()){
                $data['message'] = "Saved Successfully";
                $data['status'] = True;
                return response()->json($data,200);

            }else{
                $data['message'] = "Failed";
                $data['status'] = False;
                return response()->json($data,500);
            }
        }
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
        $category = Category::find($id);
        if($category){
            return response()->json($category,200);
        }else{
            $data['status'] =false;
            $data['message']= "Not Found";
            return response()->json($data,404);
        }
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
        $validate = Validator::make($request->all(),[
            'name'=>'required|max:190|unique:categories,name,'.$id,
            'description'=>'nullable',
            'status'=>'nullable|boolean'
        ]);

        if($validate->fails()){
            return response()->json($validate->errors(),500);
        }else{
      
        $category = Category::find($id);
        if ($category){
            $category->name = $request->name;
            $category->description = $request->description;
            $category->status = $request->status;
            $category->updated_by= 1;
            if($category->save()){
                $data['status'] =true;
                $data['message'] = "Category updated successfully";
                return response()->json($data,200);
            }else{
                $data['status'] =true;
                $data['message'] = "Category updated failed";
                return response()->json($data,500);
            }
        }else{
            $data['status'] =true;
            $data['message'] = "Category not found";
            return response()->json($data,404);
        }
    }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $category = Category::find($id);
        if($category){
            if($category->delete()){
                $data['status'] =true;
                $data['message']="Delete successfully";
                return response()->json($data,200);
            }
        }else{
            $data['status'] =false;
            $data['message']="Data not found";
            return response()->json($data,404);
        }
    }
}
