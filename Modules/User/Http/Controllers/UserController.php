<?php

namespace Modules\User\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Routing\Controller;

use Modules\User\Repositories\UserRepository;

use Sentinel;
use Session;

class UserController extends Controller
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
        return view('user::index');
    }

    public function update_user($id , Request $request)
    {
        $role = Sentinel::getUser()->roles()->first()->slug;

        $this->views['isAdmin'] = $role == 'admin' ? true : false;

        $user = $this->user->getUser($id);

        $this->views['user'] = $user;

        $inputs = $request->all();

        if (isset($inputs['update_user']))
        {
            $user = Sentinel::findById($id);

            $credentials = [
                'email' => $inputs['email'] ,
                'first_name' => $inputs['first_name'] ,
                'last_name' => $inputs['last_name'] ,
                'phonenumber' => $inputs['phonenumber'] ,
            ];

            if ($inputs['password'] != "")
            {
                $credentials['password'] = $inputs['password'];
            }

            $user = Sentinel::update($user, $credentials);

            Session::flash('message', "User updated successfully");

            return redirect()->back();
        }

        return view('home::user-update')->with($this->views);
    }

    public function delete_user($id)
    {

        $this->user->delete($id);

        Session::flash('message', "User deleted successfully");

        return redirect()->back();
    }

    public function addview_user()
    {
        $role = Sentinel::getUser()->roles()->first()->slug;

        $this->views['isAdmin'] = $role == 'admin' ? true : false;

        return view('home::user-add')->with($this->views);
    }

    public function add_user(Request $request)
    {
        $inputs = $request->all();

        $user = Sentinel::registerAndActivate($request->except('add_user'));

        Session::flash('message', "User added successfully");

        return redirect()->back();
    }

    public function profileview()
    {
        $role = Sentinel::getUser()->roles()->first()->slug;

        $this->views['isAdmin'] = $role == 'admin' ? true : false;

        $user = $this->user->getUser(Sentinel::getUser()->id);

        $this->views['user'] = $user;

        return view('user::profile')->with($this->views);
    }
}
