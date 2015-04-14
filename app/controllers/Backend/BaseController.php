<?php
namespace Backend;
use Auth;


class BaseController extends \Controller {


    protected  $userId;

    public function __construct()
    {
        $this->userId= Auth::id();
    }

    protected function checkUser($user_id)
    {
        if($user_id == Auth::id())
        {
            return true;
        }

        throw new \Exception('no permission', 500);
    }

    public function missingMethod($parameters = array())
    {
        echo "Missing Method : " . $parameters[0];

        ee($parameters);
    }
}