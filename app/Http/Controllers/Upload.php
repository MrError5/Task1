<?php

namespace App\Http\Controllers;
use Storage;
use App\File;

use Illuminate\Http\Request;

class Upload extends Controller
{
    //
    	public static function upload($data=[]){

		if (in_array('new_name',$data)) {
			# code...
		$new_name = $data['new_name'] ===null ?time():$data['new_name'];
		}

		if (request()->hasFile($data['file']) && $data['upload_type'] == 'single') {
			// in_array('delete_file',$data) && !empty($data['delete_file']) ? Storage::delete($data['delete_file']) :'';
			Storage::has($data['delete_file'])?Storage::delete($data['delete_file']):'';
			return request()->file($data['file'])->store($data['path']);

		}elseif (request()->hasFile($data['file']) && $data['upload_type'] == 'files')
		 {
			$file = request()->file($data['file']);
			$file->store($data['path']);
			$size = $file->getSize();
			$mime_type= $file->getMimeType();
			$name= $file->getClientOriginalName();
			$hashname= $file->hashName();
			$add = File::create([

    	'name'=>$name,
    	'size'=>$size,
    	'file'=>$hashname,
    	'path'=>$data['path'],
    	'full_file'=>$data['path']. '/' . $hashname,
    	'mime_type'=>$mime_type,
    	'file_type'=>$data['file_type'],
    	'relation_id'=>$data['relation_id'],

			]);

			return $data['path']. '/' . $hashname;
			
		}

	}
	public function delete($id)
	{

		$file = File::find($id);
		if (!empty($file)) {
			
			\Storage::delete($file->full_file);
			$file->delete();
		}

	}

}
