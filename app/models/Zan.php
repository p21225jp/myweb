<?php

class Zan extends BaseModel {
	protected $table = 'zan';

	public function scopeZan($query,$cloud_id,$user_id){

		 return $query->where('user_id', '=', $user_id,'and','cloud_id','=',$cloud_id);
	}
}