<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\News;
use App\Category;
use Storage;
use DB;
class NewsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $newses = News::all();
        return view('admin.news.index',['title'=>trans('admin.all_news'),'newses'=>$newses]);

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $news = News::create([

            'news_title'=>'',


         ]);
        //
       // $results = Table::latest('datetime')->first();
 
//         if(!request()->has('temp_id')){
//     return redirect('/news/create?temp_id='.str_random(40));
// }

       // $news_id = DB::table('news')->latest()->first();
        // $category = Category::count();
        // if ($category < 0) {

        //     session()->flash('success',trans('admin.updated_record'));
        // return redirect(url('news'));

           
        // }
             if (!empty($news)) {
            return redirect(url('news/'.$news->id.'/edit'));
        }
       // $news_id +=1;
       // return view('admin.news.create',['title'=>trans('admin.create_news')]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        $data = $this->validate(request(),[
            'news_title'=>'required',
            'news_content'=>'required',
            'category_id'=>'required',
            

        ]);

            if (request()->hasFile('main_photo')) {
            $data['main_photo'] = up()->upload([
                    'file'        => 'main_photo',
                    'path'        => 'News',
                    'upload_type' => 'single',
                    'delete_file' => '',
                ]);
        }
        News::create($data);

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
        $news = News::findOrFail($id);
        return view('admin.news.show',compact('news'),['title'=>trans('admin.news_show')]);

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
        $news = News::findOrFail($id);
        return view('admin.news.edit',['title'=>trans('admin.create_edit')],compact('news'));
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
        $data = $this->validate(request(),[
            'news_title'=>'required',
            'news_content'=>'required',
            'category_id'=>'required',
            

        ]);

            if (request()->hasFile('main_photo')) {
            $data['main_photo'] = up()->upload([
                    'file'        => 'main_photo',
                    'path'        => 'News',
                    'upload_type' => 'single',
                    'delete_file' => news()->main_photo,
                ]);
        }

        News::where('id',$id)->update($data);
        session()->flash('success',trans('admin.updated_record'));
        return redirect(url('news'));
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
           $news =  News::findOrFail($id);
                    Storage::delete($news->main_photo);



            $news->delete();
        return back();
    }


    public function upload_file($id)
    {
            if (request()->hasFile('file')) {
        // !empty(setting()->icon) ? Storage::delete(setting()->icon) :'';
                up()->upload([
                //'new_name'=>'',
                'file'=>'file',
                'path'=>'news/'.$id,
                'upload_type'=>'files',
                'delete_file'=>'',
                'relation_id'=>$id,
                'file_type'=>'news',

            ]);
            //$data['icon']=request()->file('icon')->store('settings');
        }

    }

        public function delete_file()
    {
        if (request()->has('id')) {
              up()->delete(request('id'));


        }
    }
}
