<?php

class Application {

    private $db_connect;

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

    public function select_all_published_cat_info() {
        $query = "SELECT * FROM category WHERE publication_status=1";
        if (mysqli_query($this->db_connect, $query)) {
            $query_result = mysqli_query($this->db_connect, $query);
            return $query_result;
        } else {
            die('query problem' . mysqli_error($this->db_connect));
        }
    }

    public function select_all_published_manufacture_info() {
        $query = "SELECT * FROM manufacture WHERE publication_status=1";
        if (mysqli_query($this->db_connect, $query)) {
            $query_result = mysqli_query($this->db_connect, $query);
            return $query_result;
        } else {
            die('query problem' . mysqli_error($this->db_connect));
        }
    }

    public function select_product_info() {
        $query = "SELECT * FROM product";
        if (mysqli_query($this->db_connect, $query)) {
            $query_result = mysqli_query($this->db_connect, $query);
            return $query_result;
        } else {
            die('query problem' . mysqli_error($this->db_connect));
        }
    }

    public function select_publisbhed_product_category_by_id($category_id) {
        $query = "SELECT * FROM product WHERE category_id='$category_id' AND publication_status=1";
        if (mysqli_query($this->db_connect, $query)) {
            $query_result = mysqli_query($this->db_connect, $query);
            return $query_result;
        } else {
            die('query problem' . mysqli_error($this->db_connect));
        }
    }

    public function select_all_product_info_by_id($product_id) {
        $query = "SELECT p.*,m.manufacture_name,c.category_name FROM product as p,manufacture as m,category as c WHERE p.manufacture_id=m.manufacture_id && p.category_id=c.category_id && p.product_id='$product_id'";
        if (mysqli_query($this->db_connect, $query)) {
            $query_result = mysqli_query($this->db_connect, $query);
            return $query_result;
        } else {
            die('query problem' . mysqli_error($this->db_connect));
        }
    }

}
