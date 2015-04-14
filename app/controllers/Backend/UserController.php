<?php
namespace Backend;

use Auth,
    View,
    Request,
    Input,
    Redirect,
    UserRepository;

class UserController extends BaseController {


/**
 * add/update user informations
 * 
 */
	public function index(){
		if (Request::isMethod('post')) {
            $userRepository = new UserRepository();
            $result = $userRepository->save(Auth::id(), Input::all());
        }
        $view_data=['user_message'=>array_merge(Auth::user()->toarray(),Input::all())];
        if(Request::isMethod('post')){
            return Redirect::back()->with('message','保存成功!');
        }
        $view_data['class_name']='User';
		return View::make('backend.user',$view_data);
	}
}