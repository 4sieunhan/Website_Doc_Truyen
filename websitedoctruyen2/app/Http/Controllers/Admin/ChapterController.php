<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Chapters;
use App\Models\Stories;
use DateTime;

class ChapterController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function list($id)
    {
        $data = Chapters::all()->where('story_id',$id);
        $data2 = Stories::where('id',$id)->first();
        return view('admin.story.chapter.list',['chapters' => $data],['stories' => $data2]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($id)
    {
        $data = Stories::where('id',$id)->first();
        return view('admin.story.chapter.create',['stories' => $data]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request,$id)
    {
        $chapter = new Chapters;
        $chapter->name = $request->name;
        $chapter->content = $request->content;
        $chapter->subname = $request->subname;
        $chapter->updated_at =  $chapter['created_at'];
        $chapter->story()->associate($id);
        $chapter->save();

        return redirect()->route('admin.story.chapter.list',$id);
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
        $data = array(
            'subname' => $request->subname,
            'name' => $request->name,
            'content' => $request->content
        );
        $data['updated_at'] = new DateTime;
        Chapters::where('id',$id)->update($data);  
        
        return redirect()->back()->with('message','Sửa Thành Công');
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
