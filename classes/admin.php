<?php

class Admin {

    protected $db_connect;

    public function __construct() {
        $localhost = 'localhost';
        $user = 'root';
        $password = '';
        $db_name = 'Ecommerce';
        $this->db_connect = mysqli_connect($localhost, $user, $password, $db_name);
        if (!$this->db_connect) {
            die('db not connected' . mysqli_errno($this->db_connect));
        }
    }

    public function admin_check_login($data) {
//          echo '<pre>';
//          print_r($data);
        $email_address = $data['email_address'];
        $password = md5($data['password']);
        $sql = "SELECT * FROM admin WHERE email_address='$email_address' AND password='$password'";
        if (mysqli_query($this->db_connect, $sql)) {
            $query_result = mysqli_query($this->db_connect, $sql);
            $admin_info = mysqli_fetch_assoc($query_result);
//              echo '<pre>';
//              print_r($admin_info);
//              exit();
            if (isset($admin_info)) {
                session_start();
                $_SESSION['username']=$admin_info['admin_name'];
                $_SESSION['admin_id']=$admin_info['admin_id'];
                header('Location:admin_master.php');
            } else {
                $message = 'Please use valid email address';
                return $message;
            }
        } else {
            die('query problem' . mysqli_error($this->db_connect));
        }
    }

}
