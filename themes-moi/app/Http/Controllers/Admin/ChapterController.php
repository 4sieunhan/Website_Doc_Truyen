<?php

namespace App\Http\Controllers\Admin;
use DateTime;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Chapters;
use App\Models\Stories;

class ChapterController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function list($id)
    {
        $data = Stories::where('id',$id)->first();
        $data2 = Chapters::all()->where('story_id',$id);
        return view('admin.story.chapter.list',['stories' => $data],['chapters' => $data2]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($id)
    {
        $data = Stories::where('id',$id)->first();
        return view('admin.story.chapter.create',['data'=>$data]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request,$id)
    {
        $messages = [
            'name.required' => 'Tiêu đề bắt buộc nhập',
            'subname.required' => 'Tên chương bắt buộc nhập',
            'subname.max' => 'Từ khóa không được vượt quá 35 ký tự',
            'content.max' => 'Mô tả không được vượt quá 255 ký tự',
            'content.required' => 'Nội Dung Bắt Buộc Nhập'
        ];
        $validatedData =$request->validate([
            'subname' => 'required|max:35',
            'name' => 'required',
            'content' => 'required|max:255|',
        ],$messages);

        $chapter = new Chapters;
        $chapter->name = $request->name;
        $chapter->content = $request->content;
        $chapter->subname = $request->subname;
        $chapter->updated_at =  $chapter['created_at'];
        $chapter->story()->associate($id);
        $chapter->save();

        return redirect()->route('admin.story.chapter.list',[$id]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show()
    {
        $data = Chapters::with('story')->get();

        return view('admin.story.chapter.allchapter',['chapters' => $data]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data = Chapters::with('story')->where('id',$id)->first();
        return view('admin.story.chapter.edit',['chapters' => $data]);
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
            'subname.required' => 'Tên chương bắt buộc nhập',
            'subname.max' => 'Từ khóa không được vượt quá 35 ký tự',
            'content.max' => 'Mô tả không được vượt quá 255 ký tự',
            'content.required' => 'Nội Dung Bắt Buộc Nhập'
        ];
        $validatedData =$request->validate([
            'subname' => 'required|max:35',
            'name' => 'required',
            'content' => 'required|max:255|',
        ],$messages);
        $data = array(
            'subname' => $request->subname,
            'name' => $request->name,
            'content' => $request->content
        );
        $data['updated_at'] = new DateTime;

        Chapters::where('id',$id)->update($data);

        return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Chapters::destroy('id',$id);
        return redirect()->back();
    }
}
