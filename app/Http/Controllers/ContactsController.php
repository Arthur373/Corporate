<?php

namespace App\Http\Controllers;

use App\Models\Menu;
use App\Repositories\ArticlesRepository;
use App\Repositories\CommentsRepository;
use App\Repositories\MenusRepository;
use App\Repositories\PortfoliosRepository;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class ContactsController extends SiteController
{
    //
    public function __construct(){
        parent::__construct(new MenusRepository(new Menu));


        $this->bar='left';
        $this->template= config('settings.theme').'.contacts';
    }

    public function index(Request $request){

        if($request->isMethod('post')) {
            $messages = [
                'required' => "Поле :attribute надо заполнить",
                'email' => "Ведите правелний :attribute адрес",
            ];

            $this->validate($request, [
                'name' => 'required|max:20',
                'email' => 'required|email',
                'text' => 'required',
            ]/*,$messages*/);

//            $data = $request->all();
//
//            Mail::send(config('settings.theme').'.email', ['data' => $data], function ($message) use ($data) {
//
//                $mail_admin = env('MAIL_USERNAME');
//
//                $message->to($mail_admin, 'Mr.Admin')->subject('Question');
//                $message->from($data['email'], $data['name']);
//
//            });
//            return redirect()->route('contacts')->with('status', 'Email is sent');
        }

        $this->title = 'Контакты';

        $content = view(config('settings.theme').'.contact_content')->render();
        $this->vars = array_add($this->vars,'content',$content);

        $this->contentLeftBar = view(config('settings.theme').'.contact_bar')->render();

        return $this->renderOutput();
    }
}
