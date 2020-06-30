<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Stories;
use DateTime;

class StoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function list()
    {
        $data = Stories::with('category','author')->get();

        return view('admin.story.list',['stories' => $data]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.story.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //Thêm dữ liệu vào bảng và id của cái vừa mới tạo
        $insertStory = Stories::insertGetId([
            'name' => $request->input('name'),
            'content' => $request->input('content'),
            'description' => $request->input('description'),
            'keyword' => $request->input('keyword'),
            'image' => $request->input('image'),
            'status' => $request->input('status'),
            'source' => $request->input('source')
        ]);
        //lay multi values category
        $items_category = $request->get('categories_id');
        $selected_items = '';
        foreach($items_category as $item)
        {
            $selected_items .= $item.',';
        }
        $items_author = $request->get('authors_id');
        $selected_items = '';
        //lay multi values category
        foreach($items_author as $item)
        {
            $selected_items .= $item.',';
        }
        //get id cua Stories vua moi tao
        $data = Stories::find($insertStory);
        //ham attach insert category_id cho 1 stories cu the
        $data->category()->attach($items_category);
        $data->author()->attach($items_author);

        return redirect()->route('admin.story.list');
  
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
        $data = Stories::where('id',$id)->first();
        return view('admin.story.edit',['stories' => $data]);
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
        //update edit view story
        $data= array(
            'name' => $request->name,
            'content' => $request->content,
            'description' => $request->description,
            'image' => $request->image,
            'keyword' => $request->keyword,
            'source' => $request->source,
            'status' => $request->status
        );
        $data['updated_at'] = new DateTime;
        Stories::where('id',$id)->update($data);
        //xac dinh id cua story
        $storyid = Stories::findOrFail($id);
        //lay multi values category
        $items_category = $request->get('categories_id');
        $selected_items = '';
        foreach($items_category as $item){
            $selected_items .= $item.',';
        }
        //lay multi values category
        $items_author = $request->get('authors_id');
        $selected_items = '';
        foreach($items_author as $item){
            $selected_items .= $item.',';
        }
        //update ham sync
        $storyid->category()->sync($items_category);
        $storyid->author()->sync($items_author);

        return redirect()->route('admin.story.list');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Stories::destroy('id',$id);
        return redirect()->route('admin.story.list');
    }
}
