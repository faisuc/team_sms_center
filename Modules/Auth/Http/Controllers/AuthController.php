<?php

namespace Modules\Auth\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Routing\Controller;

use Modules\Auth\Repositories\AuthRepository;

use Sentinel;

class AuthController extends Controller
{

    protected $auth;

    public function __construct(AuthRepository $auth)
    {
        $this->auth = $auth;
    }

    /**
     * Display a listing of the resource.
     * @return Response
     */
    public function index()
    {
        return view('auth::index');
    }

    public function authenticate_user(Request $request)
    {
        Sentinel::authenticate($request->all());
        
        $role = Sentinel::getUser()->roles()->first()->slug;

        if ($role == 'admin')
        {
            return redirect('home');
        }
        else
        {
            return redirect('phonebook');
        }
        
    }

    public function logout_user()
    {
        Sentinel::logout();

        return redirect('auth');
    }
}
