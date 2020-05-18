<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Mail;
use App\User;


class MailsController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $mails = Mail::with('userFrom')->where('user_id_to', Auth::id())->notDeleted()->get();

        return view('mails.index')->with('mails', $mails);
    }

    public function create(int $id = 0, String $subject = '')
    {
        if ($id === 0) {
            $users = User::where('id', '!=', Auth::id())->get();
        } else {
            $users = User::where('id', $id)->get();
        }

        if ($subject !== '') $subject = 'Re: ' . $subject;

        return view('mails.create')->with(['users' => $users, 'subject' => $subject]);
    }

    public function send(Request $request)
    {
        $this->validate($request, [
            'subject' => 'required',
            'body' => 'required'
        ]);

        $mail = new Mail();

        $mail->user_id_from = Auth::id();
        $mail->user_id_to = $request->input('to');
        $mail->subject = $request->input('subject');
        $mail->body = $request->input('body');
        $mail->save();

        return redirect()->to('/')->with('success', 'メッセージを送信しました');
    }

    public function sent()
    {
        $mails = Mail::with('userTo')->where('user_id_from', Auth::id())->get();

        return view('mails.sent')->with('mails', $mails);
    }

    public function read(int $id)
    {
        $mail = mail::with('userFrom')->find($id);
        $mail->read = true;
        $mail->save();

        return view('mails.read')->with('mail', $mail);
    }

    public function delete(int $id)
    {
        $mail = Mail::find($id);
        $mail->deleted = true;
        $mail->save();

        return redirect()->to('/')->with('status', 'メッセージを削除しました');
    }

    public function deleted()
    {
        $mails = Mail::with('userFrom')->where('user_id_to', Auth::id())->Deleted()->get();

        return view('mails.deleted')->with('mails', $mails);
    }

    public function return(int $id)
    {
        $mail = Mail::find($id);
        $mail->deleted = false;
        $mail->save();

        return redirect()->to('/mail');
    }
}
