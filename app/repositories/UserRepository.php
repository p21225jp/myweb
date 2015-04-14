<?php
/**
 * 
 * @author developer
 *
 */
class UserRepository extends BaseRepository{
	
	private $_updateKeys = ['true_name', 'accounts', 'phone', 'e_mail'];
        
	public function save($id, $save_data)
	{
		$user = User::find($id);
		foreach ($save_data as $key => $value) {
			if (in_array($key, $this->_updateKeys)) {
				$user->$key = $value;
			}
		}

		return $user->save();
	}
}