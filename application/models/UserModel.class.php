<?php

// application/models/UserModel.class.php

class UserModel extends Model{


    public function getUsers(){

        $sql = "select * from $this->table";

        $users = $this->db->getAll($sql);

        if(!empty($users))
	        return $users;
	    return false;

    }

    public function insertUsers($arr) {
    	// var_dump($arr);
    	$users = $this->insert($arr);

    	return $users;
    }

}