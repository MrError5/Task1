<?php

if (!function_exists('setting')) {
	function setting() {
		return \App\Setting::orderBy('id', 'desc')->first();
	}
}
if (!function_exists('user_profile')) {
	function user_profile() {
		return \App\User::orderBy('id', 'desc')->first();
	}
}

if (!function_exists('up')) {
	function up() {
		return new \App\Http\Controllers\Upload;
	}
}


if (!function_exists('news')) {
	function news() {
		return \App\News::orderBy('id', 'desc')->first();
	}
}