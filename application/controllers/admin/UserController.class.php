<?php

class UserController extends Controller{

    public function mainAction(){


        // Load Captcha class

        // $this->loader->library("Captcha");

        // $captcha = new Captcha;

        // $captcha->hello();

        $userModel = new UserModel("tbl_pengguna");

        $users = $userModel->getUsers();

        $arr = array(
            'grup_pengguna_id' => 1,
            'nama' => 'sanasdz',
            'passwd' => 'asdasdasdas',
            'status' => 1
            );

        $ins = $userModel->insertUsers($arr);

        var_dump($ins);
        include CURR_VIEW_PATH . "main.php";
    }

    public function createAction(){
        
    }

    public function indexAction(){

       $userModel = new UserModel("tbl_pengguna");

        $users = $userModel->getUsers();

        // Load View template

        include  CURR_VIEW_PATH . "index.php";

    }

    public function menuAction(){

        include CURR_VIEW_PATH . "menu.php";

    }

    public function dragAction(){

        include CURR_VIEW_PATH . "drag.php";

    }

    public function topAction(){

        include CURR_VIEW_PATH . "top.php";

    }

}