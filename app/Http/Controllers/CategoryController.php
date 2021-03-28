<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use Illuminate\Support\Facades\Validator;
use Auth;
class CategoryController extends Controller
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
            $category->created_by = Auth::user()->id;
            $category->updated_by = Auth::user()->id;
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
        //
    }
}
