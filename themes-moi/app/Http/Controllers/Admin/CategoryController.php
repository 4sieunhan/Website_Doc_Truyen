<?php

namespace App\Http\Controllers\Admin;
use DateTime;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function list()
    {
        $data = DB::table('categories')->orderBy('id','ASC')->get();
        return view('admin.category.list',['categories' => $data]);
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
        $messages = [
            'name.required' => 'Tiêu đề bắt buộc nhập',
            'description.required' => 'Nội dung mô tả bắt buộc nhập',
            'keyword.required'=> 'Từ khóa bắt buộc phải nhập',
            'keyword.max' => 'Từ khóa không được vượt quá 255 ký tự',
            'name.max' => 'Từ khóa không được vượt quá 35 ký tự',
            'description.max' => 'Từ khóa không được vượt quá 255 ký tự',
        ];
        $validatedData =$request->validate([
            'name' => 'required|max:35|',
            'keyword' => 'required|max:255|',
            'description' => 'required|max:255|',
        ],$messages);
        $data = $request->except('_token');
        $data['created_at'] = new DateTime;
        $data['updated_at'] = new DateTime;
        DB::table('categories')->insert($data);
        return redirect()->route('admin.category.list');
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
        $data = DB::table('categories')->where('id',$id)->first();
        return view('admin.category.edit',['categories' => $data]);
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
        $messages = [
            'name.required' => 'Tiêu đề bắt buộc nhập',
            'description.required' => 'Nội dung mô tả bắt buộc nhập',
            'keyword.required'=> 'Từ khóa bắt buộc phải nhập',
            'keyword.max' => 'Từ khóa không được vượt quá 255 ký tự',
            'name.max' => 'Từ khóa không được vượt quá 35 ký tự',
            'description.max' => 'Từ khóa không được vượt quá 255 ký tự',
        ];
        $validatedData =$request->validate([
            'name' => 'required|max:35|',
            'keyword' => 'required|max:255|',
            'description' => 'required|max:255|',
        ],$messages);
        $data = $request->except('_token');
        $data['updated_at'] = new DateTime;
        DB::table('categories')->where('id',$id)->update($data);
        return redirect()->route('admin.category.list');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        DB::table('categories')->where('id',$id)->delete();
        return redirect()->route('admin.category.list');
    }
}
