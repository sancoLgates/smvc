<?php

// application/controllers/admin/IndexController.class.php


class IndexController extends Controller{

    public function mainAction(){


        // Load Captcha class

        // $this->loader->library("Captcha");

        // $captcha = new Captcha;

        // $captcha->hello();

        $userModel = new UserModel("user");

        $users = $userModel->getUsers();

        $arr = array(
            'email' => 'gfdadss1@mgg',
            'name' => 'sanasdz',
            'role' => 'rolasdaselel',
            'password' => 'pasdhasdas9d8hasdas'
            );

        $ins = $userModel->insertUsers($arr);

        var_dump($ins);
        include CURR_VIEW_PATH . "main.php";
    }

    public function indexAction(){

       $userModel = new UserModel("user");

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