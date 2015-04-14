<?php


class BaseModel extends  Eloquent{

    public function scopeUser($query, $user_id)
    {
        return $query->where('user_id', '=', $user_id);
    }


    public function scopeCreatedAt($query, $begin, $end = null) {
        $end = empty($end) ? $begin : $end;
        return $query->where('created_at', '>=', $begin)->where('created_at', '<=', $end);
    }

    /**
     * 设置属性
     * @param $attributes
     */
    public function setAttributes($attributes)
    {
        foreach($attributes as $key => $attr)
        {
            $this->setAttribute($key, $attr);
        }
    }
} 