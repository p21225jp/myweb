<?php
namespace Backend;

use Auth,
    View,
    Request,
    Input,
    Redirect,
    Response,
    User,
    Zan,
    Cloud;

class CloudController extends BaseController {
    protected $user_id;


/**
 * test
 * @return type
 */
    public function getIndex()
    {
    	$list=Cloud::paginate(15);

    	$view_data=['list'=>$list,'class_name'=>'Cloud'];

       return View::make('backend.cloud.index',$view_data);
    }

    public function getPage($id=0)
    {
    	$view_data=['id'=>$id,'class_name'=>'Cloud'];
    	if ($id) {
    		$list=Cloud::find($id);
    		$view_data=['list'=>$list,'class_name'=>'Cloud'];
    	}
    	return View::make('backend.cloud.page',$view_data);
    }

    public function postPage($id=0)
    {
    	date_default_timezone_set('Asia/Shanghai'); 
    	$update_data=Input::all();
    	if (Input::get('id')) {
    		$cloud=Cloud::find(Input::get('id'));
    	} else {
    		$cloud=new Cloud();
    	}
        
    	$cloud->setAttributes($update_data);
    	$cloud->save();
        //ee($order_array);
    	return Redirect::to('cloud');
    }

    public function getDel($id)
    {
    	$cloud=Cloud::find($id);
    	$cloud->delete();
    	return Redirect::to('cloud');
    }

    public function getView($id)
    {
        $cloud=Cloud::find($id);
        $view_data = ['cloud'=>$cloud->toarray()];
        return Response::json($view_data);
    }

    public function getZan($id)
    {
        /*if(empty(Zan::zan($id,$this->userId)->get())){
            $zan= New Zan();
            $zan->cloud_id=$id;
            $zan->user_id=$this->userId;
            $zan->is_zan=1;
        }else{
            return false;
        }*/
        $cloud=Cloud::find($id);
        $cloud->zan++;
        $cloud->save();
        return $cloud->zan;

    }
		
}