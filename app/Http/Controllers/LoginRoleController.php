<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class LoginRoleController extends Controller
{
    /**
     * Show the form for select a login role.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('auth.login_role');
    }
    public function setRole( Request $request )
    {
        session(['role' => $request->input('role') ]);
        return redirect('home');
    }

}