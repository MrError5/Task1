<?php

namespace App\Http\Controllers;
use App\Setting;
use App\Category;
use App\News;
use App\User;

use Illuminate\Http\Request;

class SettingsController extends Controller
{
    //

    public function setting() {
		return view('admin.settings', ['title' => trans('admin.settings')]);
	}

	public function setting_save() {
		$data = $this->validate(request(), [
				'site_name'              => 'required|Alpha',
				'site_email'         => 'required|email',
				'site_keywords'            => 'required|string',
				'site_description'           => 'string',
				'maintenance' 					=> 'string',
				'maintenance_message'               => 'string',

			], [],
			[
				'site_name' => trans('admin.site_name'),
				'site_email' => trans('admin.site_email'),
				'site_keywords' => trans('admin.site_keywords'),
				'site_description' => trans('admin.site_description'),
				'maintenance' => trans('admin.maintenance'),
				'maintenance_message' => trans('admin.maintenance_message'),
			]);




		Setting::orderBy('id', 'desc')->update($data);
		session()->flash('success', trans('admin.updated_record'));
		return redirect(url('settings'));
	}



	public function dashboard()
	{
		$category_count = Category::count();
		$news_count = News::count();
		return view('admin.home',compact('category_count','news_count'));
	}



		public function profile()
	{
		return view('admin.profile', ['title' => trans('admin.profile')]);
		
	}


		public function profile_save()
	{
		// return view('admin.profile', ['title' => trans('admin.profile')]);

		$data = $this->validate(request(), [
				'name'              => 'required',
				'password'         => 'confirmed',
				//'password-confirm'        => '',
				

			], [],
			[
				'name' => trans('admin.site_name'),
				'password' => trans('admin.site_email'),
				//'password-confirm' => trans('admin.site_keywords'),
					]);


		$data['password'] = bcrypt(request()->password);

		User::where('id', \Auth::user()->id)->update($data);
		session()->flash('success', trans('admin.updated_record'));
		return redirect(url('settings'));	
		
	}


	public function searchCat(Request $request)
	{
		$queryString = $request->input('q');
		$category_search = \DB::table('categories')->where('name', 'like', '%'.$queryString.'%')->paginate(5);
		$news_search = \DB::table('news')->where('news_title', 'like', '%'.$queryString.'%')->paginate(5);
	
	$cat_count = $category_search->count();
	$news_count = $news_search->count();
//	return dd($cat_count);
		return view('admin.search',['title'=>trans('admin.all_news'),'category_search'=>$category_search,'news_search'=>$news_search,'cat_count'=>$cat_count,'news_count'=>$news_count]);
	}

// 



}
