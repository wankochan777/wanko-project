<?php

namespace App\Http\Controllers;

// use App\Repositories\ContactRepository;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Mail;
use App\Mail\ContactMail;

class ContactController extends Controller
{
    // お問い合わせ(入力)
    public function contact_form()
    {
        return view('contact.form');
    }

    // お問い合わせ(確認)
    public function contact_confirm(Request $request)
    {
        //バリデーション
        $request->validate([
            'name' => 'required',
            'mail' => 'required',
            'comment'  => 'required|min:3',
        ],
        [
            'name.required'  => '※お名前は必須です',
            'mail.required' => '※メールアドレスは必須です',
            'comment.required'  => '※お問い合わせ内容は必須です',
        ]);

        //フォームから受け取ったすべての値を取得
        $contact_data = $request->except('action');

        // お問い合わせフォームに戻る
        if($request->back) {
            return redirect()
            ->route('contact_form')
            ->withInput($contact_data);
        }

        // お問い合わせ内容を送信
        if($request->send) {
            Mail::to(config('address.to'))->send(new ContactMail($contact_data));

            DB::table('contact')->insert(
                [
                'name' => $request->name,
                'mail' => $request->mail,
                'number' => $request->number,
                'comment' => $request->comment,
                'c_stamp' => now(),
                ]
            );

            $request->session()->regenerateToken();

            if(Auth::user()) {
                return redirect()->route('reviewlist_index');
            } else {
                return redirect()->route('welcome');
            }
        }

        return view('contact.confirm', ['contact_data' => $contact_data]);
    }
}
