<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use DB;
class LoginController extends Controller
{
    public function index()
    {
    	if ( Auth::user() )
    	{
    		return redirect('home');
    	}
        return view('auth.index');
    }    
} 