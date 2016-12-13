<?php

namespace Modules\Messaging\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Routing\Controller;

use Modules\User\Repositories\UserRepository;

use Sentinel;
use Session;
use Sms;

class MessagingController extends Controller
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

        return view('messaging::index')->with($this->views);
    }

    public function form($id)
    {
        $role = Sentinel::getUser()->roles()->first()->slug;

        $this->views['isAdmin'] = $role == 'admin' ? true : false;

        $user = $this->user->getUser($id);

        $this->views['user'] = $user;

        return view('messaging::form')->with($this->views);
    }

    public function send(Request $request)
    {
        $inputs = $request->all();

        $message  = $inputs['message'];
        $to       = $inputs['phonenumber'];
        $from     = $this->user->getPhonenumber(Sentinel::getUser()->id);
        $response = Sms::send($message,$to,$from);

        Session::flash('message', "Message Sent");

        return redirect()->back();
    }
    
}
