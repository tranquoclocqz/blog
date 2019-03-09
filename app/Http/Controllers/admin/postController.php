<?php

namespace App\Http\Controllers\admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\post;
use App\Helpers\helpers;
use Carbon\Carbon;
use Illuminate\Support\Facades\File;

class postController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $posts = post::select('id','name','created_at','updated_at','photo','thumbnail')->get();
        return view('admin.post.index',['posts'=>$posts]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.post.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $post = new post();
        $this->validate($request,[
            'txt_name'=>'min:10|max:100|required',
        ],[
            'txt_name.min'=> 'Bài viết tối thiểu :min',
            'txt_name.max'=> 'Bài viết tối đa :max',
            'txt_name.required'=> 'Chưa nhập trên bài viết',
        ]);
        $slug = ($request->has('chk_customSlug')) ? $request->txt_slug :  changeTitle($request->txt_name);
        $post->name = $request->txt_name;
        $post->type = $_GET['type'];
        $post->slug =  $slug;
        $post->alt =  (!empty($request->txt_alt)) ? $request->txt_alt : $request->txt_name;
        $post->description = $request->txt_mota;
        $post->content = $request->txt_content;
        $post->seo = json_encode(array('title'=>$request->txt_title,'keywords'=>$request->txt_keywords,'description'=>$request->txt_description),true);
        if ($request->hasFile('file')) {
            $image = $request->file('file');
            $name =  $slug.'-'.rand(10,1000).'.'.$image->getClientOriginalExtension();
            $destinationPath = (public_path('upload/'.makedir()));
            $image->move($destinationPath, $name);
            $post->photo = makedir().'/'.$name;
        }
        $post->save();
        return redirect()->route('post.index',['type'=>$_GET['type']])->with('success','Thêm mới thành công');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $item = post::find($id);
        return view('admin.post.edit',['item'=>$item]);
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
        $post = post::find($id);
        $this->validate($request,[
            'txt_name'=>'min:10|max:100|required',
        ],[
            'txt_name.min'=> 'Bài viết tối thiểu :min',
            'txt_name.max'=> 'Bài viết tối đa :max',
            'txt_name.required'=> 'Chưa nhập trên bài viết',
        ]);
        $slug = ($request->has('chk_customSlug')) ? $request->txt_slug :  changeTitle($request->txt_name);
        $post->name = $request->txt_name;
        $post->type = $_GET['type'];
        $post->slug =  $slug;
        $post->alt =  (!empty($request->txt_alt)) ? $request->txt_alt : $request->txt_name;
        $post->description = $request->txt_mota;
        $post->content = $request->txt_content;
        $post->seo = json_encode(array('title'=>$request->txt_title,'keywords'=>$request->txt_keywords,'description'=>$request->txt_description),true);
        if ($request->hasFile('file')) {
            $image = $request->file('file');
            $name =  $slug.'-'.rand(10,1000).'.'.$image->getClientOriginalExtension();
            $destinationPath = (public_path('upload/'.makedir()));
            $old = post::find($id);
            $path = public_path('upload/').$old->photo;
            if (File::exists($path)) {
               File::delete($path);
            }
            $image->move($destinationPath, $name);
            $post->photo = makedir().'/'.$name;
        }
        $post->save();
        return redirect()->route('post.index',['type'=>$_GET['type']])->with('success','Cập nhật thành công');
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
    public function delete($id){
      if (empty($id)) {
        return redirect()->route('post.index',['type'=>$_GET['type']])->with('danger','Không có dữ liệu');
    } else {
        if (post::find($id)->delete()) {
            return redirect()->route('post.index',['type'=>$_GET['type']])->with('success','Xoá dữ liệu thành công');
        }
    }
}

public function deleteAll($id){
    if (empty($id)) {
        return redirect()->route('post.index',['type'=>$_GET['type']])->with('danger','Không có dữ liệu');
    } else {
        $array_id = explode(',',$id);
        $old_photo = post::select('photo')->whereIn('id',$array_id)->get();
        $photo_array = array();
        foreach ($old_photo as $key => $value) {
            if (!empty($value->photo)) {
                array_push($photo_array, $value->photo);
            }
        }
        if (!empty($photo_array)) {
            File::delete($photo_array);
        }
        post::whereIn('id',$array_id)->delete();
        return redirect()->route('post.index',['type'=>$_GET['type']])->with('success','Xoá dữ liệu thành công');
    }
}
}