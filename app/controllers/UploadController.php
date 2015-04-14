<?php

class UploadController extends \BaseController {

	private $_available_ext=array('jpg','jpeg','png','gif', 'pdf', 'zip', 'mp3', 'mp4','ico');
	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		//
	}


	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		//
	}


	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
		$file = Input::file('file');
                 
		$icon_folder = '/uploads/';
                
		$icon_filename = md5_file($file->getFileInfo()->getPathname()).'.'.strtolower($file->getClientOriginalExtension());
		$icon_folder .= substr($icon_filename, 0, 2) . '/'.substr($icon_filename, 2, 2) . '/';
		
		// 判断后缀
		if(!in_array(strtolower($file->getClientOriginalExtension()), $this->_available_ext)){
			$ret['status'] = 0;
			$ret['msg'] = '必须为jpg/png/gif格式';
			return $ret;
		}
		
		$file->move(public_path() . $icon_folder, $icon_filename);
		
		$ret = array(
				'status'=>1,
				//'url'=>url($icon_folder . $icon_filename),
		);
// 		// 验证文件尺寸
// 		$fullpath = $icon_folder.$icon_filename;
// 		$size = getimagesize($fullpath);
// 		if($size[0]!==128 || $size[1]!==128){
// 			$ret['status'] = 0;
// 			$ret['msg'] = '必须上传128x128的图标。';
// 			unlink($fullpath);
// 		}

		$api = new AttachmentApi();
		$api->curlRequest('attachments', ['attachments' => '@' . public_path() . $icon_folder. $icon_filename], 'post', true);
		$result =  $api->getResponseContent();
		//$attachment = $result[0];
		$ret['data'] = $result['data'][0];
		return $ret;
	}


	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		//
	}


	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		//
	}


	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
		//
	}


	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		//
	}


}
