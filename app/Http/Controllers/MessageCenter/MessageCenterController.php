<?php


namespace App\Http\Controllers\MessageCenter;


use App\Http\Controllers\Controller;
use App\Repositories\Interfaces\RepositoryInterface;
use App\Repositories\MessageCenterRepository;
use App\Repositories\UserRepository;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class MessageCenterController extends Controller
{
    protected $msg;
    protected $user;

    public function __construct(MessageCenterRepository $msg, UserRepository $user)
    {
        $this->msg = $msg;
        $this->user = $user;
    }

    public function index()
    {
        $user_id=Auth::user()->id;
        $messages = $this->msg->all();
        return view('message.index',['messages'=>$messages->where('to_user_id','=', $user_id)]);
    }

    public function show($id)
    {
        $message =$this->msg->get($id);

        return view('message.show',['message'=>$message]);
    }

    public function write()
    {
        $users = $this->user->all();
        return view('message.compose',['users'=>$users]);
    }

    public function send(Request $request)
    {
        $user = $this->user->get($request->to);
//        $sender =Auth::user()->id;
        $input['to_user_id'] = $request->to;
        $input['title'] = $request->title;
        $input['body'] = $request->message;
        $input['role_id'] = $user->role->id;
        $input['from_user_id'] =Auth::user()->id;

        $message = $this->msg->create($input);

        return redirect('/msg');
    }

    protected function outbox()
    {
        $user_id=Auth::user()->id;
        $messages = $this->msg->all();
        return view('message.outbox',['messages'=>$messages->where('from_user_id','=',$user_id)]);
    }

    public function edit()
    {

    }
}
