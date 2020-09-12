<?php

namespace App\Http\Controllers\Admin;

use App\Models\User;
use Menu;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class AdminController extends \App\Http\Controllers\Controller
{
    //
    protected $p_rep;
    protected $a_rep;
    protected $user;

    protected $template;

    protected $content = false;
    protected $title;
    protected $vars;

    public function __construct(){
        $this->user = Auth::user();

//        if(!$this->user){
//            abort(403);
//        }

    }

    public function renderOutput(){
        $this->vars = array_add($this->vars,'title',$this->title);
        $menu = $this->getMenu();

        $navigation = view(config('settings.theme').'.admin.navigation')->with('menu',$menu)->render();
        $this->vars = array_add($this->vars,'navigation',$navigation);

        if($this->content){
            $this->vars = array_add($this->vars,'content',$this->content);
        }

        $footer = view(config('settings.theme').'.admin.footer')->render();
        $this->vars = array_add($this->vars,'footer',$footer);

        return view($this->template)->with($this->vars);
    }

    public function getMenu(){
        return  Menu::make('adminMenu',function ($menu){
           $menu->add('Статьи', array('route' => 'article.index'));

           $menu->add('Портфолио', array('route' => 'article.index'));
           $menu->add('Меню', array('route' => 'menus.index'));
           $menu->add('Пользователи', array('route' => 'users.index'));
           $menu->add('Привилегии', array('route' => 'permissions.index'));
        });


    }

//admin.articles.index







}

