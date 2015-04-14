<?php

class UserController extends \BaseController {
	private $_userRep;

    public function __construct(UserRepository $rep) {
        $this->_userRep = $rep;
    }

/**
 * 登录
 * @return type
 */
	public function login()
	{
		if(Auth::check())
		{
			return Redirect::to('user');
		}
		if(Request::isMethod('post'))
		{
			$username=Input::get('username');
			$password=Input::get('password');
			if(Auth::attempt(array('username'=>$username,'password'=>$password)))
			{
				return Redirect::to('user');
			}
			else
			{
				return '登陆失败';
			}
		}
		return View::make('login');
	}

/**
 * 注册
 * @return type
 */
	public function register()
	{
		//注册
		if(Request::isMethod('post'))
		{
			$register_data=Input::only(['username','password','confirm']);
			//用户名，密码验证
			$validator = Validator::make(
				$register_data,array(
					'username'=>'required|unique:users',
					'password'=>'required',
					'confirm'=>'required|same:password'
				)
			);
			if($validator->fails())
			{
				return '注册失败';
			}
			$register_data['password'] = Hash::make($register_data['password']);
            $register_data['username'] = addslashes($register_data['username']);

            unset($register_data['confirm']);

            $user = new User();
            foreach ($register_data as $key => $value) {
                $user->{$key} = $value;
            }
            $user->save();

            Auth::login($user);
            return Redirect::to('login');
		}
		return View::make('register');
	}

/**
 *退出登陆
 *
 */
	public function logout()
	{
		Auth::logout();
        return Redirect::to('login');
	}

	public function check(){
		$username=Input::get('username');
		$result=User::where('username','=',$username);
		if($result){
			echo '用户名可以使用';
		}else{
			echo '用户名已被占用';
		}
	}
}
