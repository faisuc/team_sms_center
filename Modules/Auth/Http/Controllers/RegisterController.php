<?php

namespace Modules\Auth\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Routing\Controller;

use Modules\Auth\Repositories\RegisterRepository;

use Sentinel;

class RegisterController extends Controller
{

    protected $register;

    public function __construct(RegisterRepository $register)
    {
        $this->register = $register;
    }

    /**
     * Display a listing of the resource.
     * @return Response
     */
    public function index()
    {
        return view('auth::signup');
    }

    public function register_user(Request $request)
    {
        $user = Sentinel::registerAndActivate($request->all());

        $role = Sentinel::findRoleBySlug('regular');

        $role->users()->attach($user);

        return redirect('/');
    }

}
