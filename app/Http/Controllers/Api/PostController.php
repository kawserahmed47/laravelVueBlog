<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Post;
use Illuminate\Support\Facades\Auth;
use Validator;
use Image;
class PostController extends Controller
{
    // public function __construct()
    // {
    //     $this->middleware('auth:api');
    // }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $posts = Post::with( 'category', 'createdBy')->get();
        if($posts){
            return response()->json($posts, 200);
        }
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
        $validate=  Validator::make($request->all(),[
            'image'=> 'nullable',
        ]);
        if($validate->fails()){
            return response()->json($validate->errors(),500);
        }else{

        $post = new Post();
        $post->title = $request->title;
        $post->category_id = $request->category;
        $post->description = $request->description;
        $post->status = $request->status;
        $post->created_by =1;
        $post->updated_by = 1;
        
        if($request->photo){
            $strpos = strpos($request->photo,';');
            $sub = substr($request->photo,0,$strpos);
            $ex = explode('/',$sub)[1];
            $name = time().".".$ex;
            $img = Image::make($request->photo);
            $upload_path = 'post/';
            if (!file_exists($upload_path)) {
                mkdir($upload_path, 666, true);
            }
            $img->save($upload_path.$name);
    
            $post->image = $upload_path.$name;
        }

        if($post->save()){
            $data['status'] = true;
            $data['message'] = "Successfully saved";
            return response()->json($data, 200);
        }else{
            $data['status'] = false;
            $data['message'] = "Failed";
            return response()->json($data, 500);
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
        $post = Post::where('id', $id)->where('status', 1)->first();
        if($post){
            return response()->json($post,200);

        }else{
            $data['status'] =False;
            $data['message']= "Not Found";
            return response()->json($data,404);
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $post = Post::with( 'category', 'createdBy')->where('id', $id)->first();
        if($post){
            return response()->json($post,200);

        }else{
            $data['status'] =False;
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
        $post = Post::find($id);
        if($post){
            $post->title = $request->title;
            $post->category_id = $request->category;

            $post->description = $request->description;
            $post->status = $request->status;
            $post->updated_by =1;

            if($request->image){
                if($post->image){
                    unlink($post->image);
                }
                $strpos = strpos($request->image,';');
                $sub = substr($request->image,0,$strpos);
                $ex = explode('/',$sub)[1];
                $name = time().".".$ex;
                $img = Image::make($request->image);
                $upload_path = 'post/';
                if (!file_exists($upload_path)) {
                    mkdir($upload_path, 666, true);
                }
                $img->save($upload_path.$name);
        
                $post->image = $upload_path.$name;
            }
          

            if($post->save()){
                $data['status'] = true;
                $data['message'] = "Successfully updated";
                return response()->json($data, 200);
            }else{
                $data['status'] = false;
                $data['message'] = "Failed";
                return response()->json($data, 500);
            }


        }else{
            $data['status'] =false;
            $data['message'] = "Data not found";
            return response()->json($data,404);
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
        $post = Post::find($id);
        if($post){
            if($post->delete()){
                $data['status'] =true;
                $data['message'] = "Deleted successfully";
                return response()->json($data,200);
            }else{
                $data['status'] =false;
                $data['message'] = "Delete failed";
                return response()->json($data,500);
            }
        }else{
            $data['status'] =false;
                $data['message'] = "Data not found";
                return response()->json($data,404);
        }
    }
}
