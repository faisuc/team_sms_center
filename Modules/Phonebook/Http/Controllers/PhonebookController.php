<?php

namespace Modules\Phonebook\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Routing\Controller;

use Modules\User\Repositories\UserRepository;

use Sentinel;

class PhonebookController extends Controller
{

    protected $user;

    public function __construct(UserRepository $user)
    {
        $this->user = $user;
    }
    
    /**
     * Display a listing of the resource.
     * @return Response
     */
    public function index()
    {

        $role = Sentinel::getUser()->roles()->first()->slug;

        $this->views['isAdmin'] = $role == 'admin' ? true : false;
        $this->views['users']   = $this->user->getUsers();

        return view('phonebook::index')->with($this->views);
    }


}
