<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index(Request $request)
    {
        $users = User::where('id', '>', 0);
        if($request->has('search') && $request->method() == 'POST'){
            if ($request->has('name')) {
                $users = $users->where('name', 'like', '%'.$request->get('name') .'%');
            }
            if ($request->has('phone')) {
                $users = $users->where('phone_number', 'like', '%'.$request->get('phone') .'%');
            }
            if ($request->has('address')) {
                $users = $users->whereHas('address', function($query) use ($request) {
                    $query->where('country', 'like', '%'.$request->get('address') .'%')->
                        orWhere('region', 'like', '%'.$request->get('address') .'%')->
                        orWhere('city', 'like', '%'.$request->get('address') .'%')->
                        orWhere('street', 'like', '%'.$request->get('address') .'%')->
                        orWhere('house', 'like', '%'.$request->get('address') .'%')->
                        orWhere('flat', 'like', '%'.$request->get('address') .'%');
                });
            }
        }
        $users = $users->get();
        return view('index', compact('users'));
    }
}
