<?php
namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index(Request $request)
    {
        if($request->with){
            if($request->with == 'phone'){
                $user = User::with('phone')->get();

                return response([
                    'success' => true,
                    'data' => $user
                ], 200);
            }else{
                return response([
                    'success' => true,
                    'message' => "relation error"
                ], 200);
            }
        }else{
            $user = User::all();

            return response([
                'success' => true,
                'data' => $user
            ], 200);
        }
    }

    public function view(Request $request, string $user)
    {
        $user_detail = User::where('id', $user)->first();

        if($user_detail){
            return response([
                'success' => true,
                'data' => $user_detail
            ], 200);
        }else{
            return response([
                'success' => false,
                'message' => "User not found"
            ], 404);
        }
        
    }
}
