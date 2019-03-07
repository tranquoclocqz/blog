<?php

namespace App\Http\Controllers\admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\category;
use Illuminate\Support\Facades\Validator;
class categoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $categories = category::select('id','ten','hienthi','created_at','updated_at','photo','thumbnail')->where('type','=',$_GET['type'])->orderBy('id','desc')->paginate(10);
        return view('admin.category.index',['categories'=>$categories]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.category.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(),
            [
                'txt_name'=>'required|min:10|max:60',
            ],[
                'txt_name.required'=>'Bạn chưa nhập tên danh mục',
                'txt_name.min'=>'Tên danh mục ít nhất :min ký tự',
                'txt_name.max'=>'Tên danh mục nhiều nhất :max ký tự',
            ]);
        if ($validator->fails()) {
            return redirect()->route('category.create',['type'=>$_GET['type']])->withErrors($validator)->withInput();
        } else {
            $category = new category();
            $category->ten = $request->txt_name;
            $category->type = $_GET['type'];
            $category->slug = ($request->has('chk_customSlug')) ? $request->txt_slug :  changeTitle($request->txt_name);
            $category->seo = json_encode(array('title'=>$request->txt_title,'keywords'=>$request->txt_keywords,'description'=>$request->txt_description),true);
            $category->save();
            return redirect()->route('category.index',['type'=>$_GET['type']])->with(['success'=>'Thêm danh mục thành công']);
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
        $item = category::find($id);
        return view('admin.category.edit',['item'=>$item]);
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
     $validator = Validator::make($request->all(),
        [
            'txt_name'=>'required|min:10|max:60',
        ],[
            'txt_name.required'=>'Bạn chưa nhập tên danh mục',
            'txt_name.min'=>'Tên danh mục ít nhất :min ký tự',
            'txt_name.max'=>'Tên danh mục nhiều nhất :max ký tự',
        ]);
     if ($validator->fails()) {
        return redirect()->route('category.edit',['id'=>$id,'type'=>$_GET['type']])->withErrors($validator)->withInput();
    } else {
        $category = category::find($id);
        $category->ten = $request->txt_name;
        $category->type = $_GET['type'];
        $category->slug = ($request->has('chk_customSlug')) ? $request->txt_slug :  changeTitle($request->txt_name);
        $category->seo = json_encode(array('title'=>$request->txt_title,'keywords'=>$request->txt_keywords,'description'=>$request->txt_description),true);
        
        $category->save();
        return redirect()->route('category.index',['type'=>$_GET['type']])->with('success','Cập nhật thành công');
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
        //
    }

    public function delete($id){
      if (empty($id)) {
        return redirect()->route('category.index',['type'=>$_GET['type']])->with('danger','Không có dữ liệu');
    } else {
        if (category::find($id)->delete()) {
            return redirect()->route('category.index',['type'=>$_GET['type']])->with('success','Xoá dữ liệu thành công');
        }
    }
}

public function deleteAll($id){
    if (empty($id)) {
        return redirect()->route('category.index',['type'=>$_GET['type']])->with('danger','Không có dữ liệu');
    } else {
        $array_id = explode(',',$id);
        if (category::whereIn('id',$array_id)->delete()) {
            return redirect()->route('category.index',['type'=>$_GET['type']])->with('success','Xoá dữ liệu thành công');
        }
    }
}
}
