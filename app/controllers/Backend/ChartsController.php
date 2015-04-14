<?php
namespace Backend;

use Auth,
    View,
    Request,
    Input,
    charsts,
    Redirect;

/**
 * Class ChartsController
 * @package Backend
 */

class ChartsController extends BaseController  {


/**
 * 
 * @return mixed
 */
    public function getIndex()
    {
        $view_data = ['class_name'=>'Charts'];
        return View::make('backend.charts.index',$view_data);
    }

    public function postIndex()
    {
        $file = Input::file('pic');
        $save_path = '/uploads/';
        $ext_arr = array(
            'image' => array('gif', 'jpg', 'jpeg', 'png', 'bmp'),
            'flash' => array('swf', 'flv'),
            'media' => array('swf', 'flv', 'mp3', 'wav', 'wma', 'wmv', 'mid', 'avi', 'mpg', 'asf', 'rm', 'rmvb'),
            'file' => array('doc', 'docx', 'xls', 'xlsx', 'ppt', 'htm', 'html', 'txt', 'zip', 'rar', 'gz', 'bz2'),
        );
        $max_size = 1048576;
        if (Input::hasFile('pic')) {
            if ($file->getError()>0) {
                $ret = 'php上传出错';
                return Redirect::back()->with('message',$ret);
            }

            if ($file->getSize()>$max_size) {
                $ret = '上传文件大小超过限制。';
                return Redirect::back()->with('message',$ret);
            }

            if (!in_array(strtolower($file->getClientOriginalExtension()),$ext_arr['image'])) {
                $ret = '必须为'.implode(',',$ext_arr['image']).'格式。';
                return Redirect::back()->with('message',$ret);
            }

            $file_name = date('YmdHis').md5_file($file->getFileInfo()->getPathName()).'.'.strtolower($file->getClientOriginalExtension());
            $ymd= date('Ymd');
            $save_path .= $ymd .'/';
            $file_url = $save_path.$file_name;
            $file->move(public_path().$save_path,$file_name);
            $ret = '上传成功。';
            return Redirect::back()->with('message',$ret);
        } else {
            $ret = '请选择文件！';
            return Redirect::back()->with('message',$ret);
        }

    }

    
		
}