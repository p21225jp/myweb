<?php
use Illuminate\Database\Eloquent\SoftDeletingTrait;

class Cloud extends  Eloquent{
	use SoftDeletingTrait;
	protected $softDelete = true;
	protected $table='cloud';

	public function setAttributes($attributes){
        foreach($attributes as $key => $attr)
        {
            $this->setAttribute($key, $attr);
        }
    }

    public function scopeOrder($query)
    {
    	return $query->whereNotNull('order');
    }
} 