<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class SecureController extends Controller
{
	public function profile(Request $request)
	{
		$profile = Auth::user();
		
		return response([
			'success' => true,
			'data' => $profile
		]);
	}
}