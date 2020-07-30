<?php

namespace App\Http\Controllers\Admin;
use DateTime;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Stories;
use App\Models\Chapters;

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
        $messages = [
            'name.required' => 'Tiêu đề bắt buộc nhập',
            'description.required' => 'Nội dung mô tả bắt buộc nhập',
            'keyword.required'=> 'Từ khóa bắt buộc phải nhập',
            'content.required' => 'Nội dung bắt buộc nhập',
            'source.required' => 'Nguồn truyện bắt buộc nhập',
            'authors_id.required' => 'Tác giả bắt buộc chọn',
            'categories_id.required' => 'Chuyên mục bắt buộc chọn',
            'keyword.max' => 'Từ khóa không được vượt quá 255 ký tự',
            'name.max' => 'Từ khóa không được vượt quá 100 ký tự',
            'source.max' => 'Từ khóa không được vượt quá 255 ký tự',
            'description.max' => 'Từ khóa không được vượt quá 255 ký tự',
            'content.max' => 'Từ khóa không được vượt quá 255 ký tự',
            'keyword.min'=> 'Nhập tối thiểu 5 ký tự',
            'source.min' => 'Nhập tối thiểu 5 ký tự',
            'image.required' => 'Bắt buộc gắn ảnh',
            'image.mimes' => 'Hình ảnh phải là một loại tệp: png, jpg.'
        ];
        $validatedData =$request->validate([
            'name' => 'required|max:100|',
            'keyword' => 'required|min:5|max:255|',
            'description' => 'required|max:255|',
            'content' => 'required|max:255|',
            'source' => 'required|min:5|max:255|',
            'image' => 'mimes:jpeg,jpg,png|required|max:10000',
            'authors_id' => 'required|not_in:0',
            'categories_id' => 'required|not_in:0',
        ],$messages);
        $stories = new Stories;

        $file = $request->image;
        $file->move('upload/image-story', $file->getClientOriginalName());

        //them du lieu vao trong table('stories')
        $InsertStories = Stories::insertGetId([
            'name' => $request->input('name'),
            'content' => $request->input('content'),
            'description' => $request->input('description'),
            'keyword' => $request->input('keyword'),
            'image' => $file->getClientOriginalName(),
            'source' => $request->input('source'),
            'status' => $request->input('status')
        ]);
        //lay multi values request category_id(lay nhieu gia tri category_id)
        $items_category = $request->get('categories_id');
        $selected_items = '';
        foreach($items_category as $item){
            $selected_items .= $item.',';
        }

        $items_author = $request->get('authors_id');
        $selected_items = '';
        foreach($items_author as $item){
            $selected_items .= $item.',';
        }
        //get id cua Stories vua moi tao
        $data = Stories::find($InsertStories);
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
    public function show()
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
        $messages = [
            'name.required' => 'Tiêu đề bắt buộc nhập',
            'description.required' => 'Nội dung mô tả bắt buộc nhập',
            'keyword.required'=> 'Từ khóa bắt buộc phải nhập',
            'content.required' => 'Nội dung bắt buộc nhập',
            'source.required' => 'Nguồn truyện bắt buộc nhập',
            'authors_id.required' => 'Tác giả bắt buộc chọn',
            'categories_id.required' => 'Chuyên mục bắt buộc chọn',
            'keyword.max' => 'Từ khóa không được vượt quá 255 ký tự',
            'name.max' => 'Từ khóa không được vượt quá 100 ký tự',
            'source.max' => 'Từ khóa không được vượt quá 255 ký tự',
            'description.max' => 'Từ khóa không được vượt quá 255 ký tự',
            'content.max' => 'Từ khóa không được vượt quá 255 ký tự',
            'keyword.min'=> 'Nhập tối thiểu 5 ký tự',
            'source.min' => 'Nhập tối thiểu 5 ký tự',
            'image.required' => 'Bắt buộc gắn ảnh',
            'image.mimes' => 'Hình ảnh phải là một loại tệp: png, jpg.'
        ];
        $validatedData =$request->validate([
            'name' => 'required|max:100|',
            'keyword' => 'required|min:5|max:255|',
            'description' => 'required|max:255|',
            'content' => 'required|max:255|',
            'source' => 'required|min:5|max:255|',
            'image' => 'mimes:jpeg,jpg,png|required|max:10000',
            'authors_id' => 'required|not_in:0',
            'categories_id' => 'required|not_in:0',
        ],$messages);
        //update edit view story

        $file = $request->image;
        $file->move('upload', $file->getClientOriginalName());

        $data= array(
            'name' => $request->name,
            'content' => $request->content,
            'description' => $request->description,
            'image' => $file->getClientOriginalName(),
            'keyword' => $request->keyword,
            'source' => $request->source,
            'status' => $request->status
        );
        $data['updated_at'] = new DateTime;
        Stories::where('id',$id)->update($data);

        //xac dinh id cua story
        $story = Stories::findOrFail($id);
        //lay multi value cua categories_id minh chon trong view
        $items_category = $request->get('categories_id');
        $selected_items = '';
        foreach($items_category as $item){
            $selected_items .= $item.',';
        }
        $story->category()->sync( $items_category);
        //
        $items_author = $request->get('authors_id');
        $selected_items = '';
        foreach($items_author as $item){
            $selected_items .= $item.',';
        }
        $story->author()->sync($items_author);

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
