<?php

class Super_admin {

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

    public function save_category_info($data) {
        $query = "INSERT INTO category(category_name,category_descrip,publication_status)VALUES('$data[category_name]','$data[ctgry_dcrpton]','$data[publication_status]')";
        if (mysqli_query($this->db_connect, $query)) {
            $message = 'Category info save successfully';
            return $message;
        } else {
            die('query problem' . mysqli_error($this->db_connect));
        }
    }

    public function select_category_info() {
        $query = "SELECT * FROM category";
        if (mysqli_query($this->db_connect, $query)) {
            $query_result = mysqli_query($this->db_connect, $query);
            return $query_result;
        } else {
            die('query problem' . mysqli_error($this->db_connect));
        }
    }

    public function unpublish_cat_by_id($category_id) {
        $sql = "UPDATE category SET publication_status=0 WHERE category_id=$category_id";
        if (mysqli_query($this->db_connect, $sql)) {
            $message = 'category info unpublished successfully';
            return $message;
        } else {
            die('query problem' . mysqli_error($this->db_connect));
        }
    }

    public function publish_cat_by_id($category_id) {
        $sql = "UPDATE category SET publication_status=1 WHERE category_id=$category_id";
        if (mysqli_query($this->db_connect, $sql)) {
            $message = 'category info published successfully';
            return $message;
        } else {
            die('query problem' . mysqli_error($this->db_connect));
        }
    }

    public function select_category_byid($category_id) {
        $query = "SELECT * FROM category WHERE category_id='$category_id'";
        if (mysqli_query($this->db_connect, $query)) {
            $query_result = mysqli_query($this->db_connect, $query);
            return $query_result;
        } else {
            die('query problem' . mysqli_error($this->db_connect));
        }
    }

    public function update_category_info($data) {
        $sql = "UPDATE category SET category_name='$data[category_name]',category_descrip='$data[ctgry_dcrpton]',publication_status='$data[publication_status]' WHERE category_id='$data[category_id]'";
        if (mysqli_query($this->db_connect, $sql)) {

            $_SESSION['message'] = 'category info update successfully';
            header('Location:manage_category.php');
        } else {
            die('query problem' . mysqli_error($this->db_connect));
        }
    }

    public function delete_cat_by_id($category_id) {
        $sql = "DELETE FROM category WHERE category_id='$category_id'";
        if (mysqli_query($this->db_connect, $sql)) {
            $message = "Category info delete successfully";
            return $message;
        } else {
            die('query problem' . mysqli_error($this->db_connect));
        }
    }

    public function save_manufacture_info($data) {
        $query = "INSERT INTO manufacture(manufacture_name,manufacture_descrip,publication_status)VALUES('$data[manufacture_name]','$data[manufacture_dcrpton]','$data[publication_status]')";
        if (mysqli_query($this->db_connect, $query)) {
            $message = 'Manufacture info save successfully';
            return $message;
        } else {
            die('query problem' . mysqli_error($this->db_connect));
        }
    }

    public function select_all_manafacture_info() {
        $query = "SELECT * FROM manufacture";
        if (mysqli_query($this->db_connect, $query)) {
            $query_result = mysqli_query($this->db_connect, $query);
            return $query_result;
        } else {
            die('query problem' . mysqli_error($this->db_connect));
        }
    }

    public function unpublished_manufacture_by_id($manufacture_id) {
        $query = "UPDATE manufacture SET publication_status=0 WHERE manufacture_id=$manufacture_id";
        if (mysqli_query($this->db_connect, $query)) {
            $message = 'Manufacture info unpublished successfully';
            return $message;
        } else {
            die('query problem' . mysqli_error($this->db_connect));
        }
    }

    public function published_manufcture_by_id($manufacture_id) {
        $query = "UPDATE manufacture SET publication_status=1 WHERE manufacture_id=$manufacture_id";
        if (mysqli_query($this->db_connect, $query)) {
            $message = "manufacture published successfully";
            return $message;
        } else {
            die('query problem' . mysqli_error($this->db_connect));
        }
    }

    public function select_manufacture_by_id($manufacture_id) {
        $query = "SELECT * FROM manufacture WHERE manufacture_id='$manufacture_id'";
        if (mysqli_query($this->db_connect, $query)) {
            $query_result = mysqli_query($this->db_connect, $query);
            $manufacture_info = mysqli_fetch_assoc($query_result);
            return $manufacture_info;
        } else {
            die('query problem' . mysqli_error($this->db_connect));
        }
    }

    public function update_manufacture_by_id($data) {
        $query = "UPDATE manufacture SET manufacture_name='$data[manufacture_name]',manufacture_descrip='$data[manufacture_descrip]',publication_status='$data[publication_status]' WHERE manufacture_id='$data[manufacture_id]'";
        if (mysqli_query($this->db_connect, $query)) {

            $_SESSION['message'] = 'Manufacture info update successfully';
            header('Location:manage_manufacture.php');
        } else {
            die('query problem' . mysqli_error($this->db_connect));
        }
    }

    public function delete_manufacture_info_by_id($manufacture_id) {
        $query = "DELETE FROM manufacture WHERE manufacture_id='$manufacture_id'";
        if (mysqli_query($this->db_connect, $query)) {
            $message = 'Manufacture delete successfully';
            return $message;
        } else {
            die('query problem' . mysqli_query($this->db_connect, $query));
        }
    }

    public function save_product_info($data) {
        $directory = '../assets/admin_assets/product_image/';
        $target = $directory . $_FILES['product_image']['name'];
        $file_type = pathinfo($target, PATHINFO_EXTENSION);
        $file_size = $_FILES['product_image']['size'];
        $image = getimagesize($_FILES['product_image']['tmp_name']);
        if ($image) {
            if (file_exists($target)) {
                echo 'this imsge already exits';
                exit();
            } else {
                if ($file_type != 'png' && $file_type != 'jpg') {
                    echo 'file type is not valid';
                    exit();
                } else {
                    if ($file_size > 5242880) {
                        echo 'this file is too large.please select a image within 5mb';
                        exit();
                    } else {
                        move_uploaded_file($_FILES['product_image']['tmp_name'], $target);
                        $query = "INSERT INTO product (product_name,category_id,manufacture_id,product_price,stock_quantity,product_squ,product_short_des,product_long_des,product_image,publication_status) VALUES('$data[product_name]','$data[category_id]','$data[manufacture_id]','$data[product_price]','$data[stock_quantity]','$data[product_squ]','$data[product_sort_des]','$data[product_long_des]','$target','$data[publication_status]')";
                        if (mysqli_query($this->db_connect, $query)) {
                            $message = 'product info save successfully';
                            return $message;
                        } else {
                            die('query problem' . mysqli_error($this->db_connect));
                        }
                    }
                }
            }
        } else {
            echo 'This is not image.please use a valid image';
            exit();
        }
    }

    public function select_all_product_info() {
        $query = "SELECT p.product_id,p.product_name,p.category_id,p.manufacture_id,p.product_price,p.stock_quantity,p.publication_status,m.manufacture_name,c.category_name "
                . "FROM product as p,category as c,manufacture as m "
                . "WHERE p.category_id=c.category_id AND p.manufacture_id=m.manufacture_id";
        if (mysqli_query($this->db_connect, $query)) {
            $query_result = mysqli_query($this->db_connect, $query);
            return $query_result;
        } else {
            die('query problem' . mysqli_error($this->db_connect));
        }
    }

    public function select_product_info_by_id($product_id) {
        $query = "SELECT p.*,m.manufacture_name,c.category_name "
                . "FROM product as p,category as c,manufacture as m "
                . "WHERE p.category_id=c.category_id && p.manufacture_id=m.manufacture_id && p.product_id='$product_id'";
        if (mysqli_query($this->db_connect, $query)) {
            $query_result = mysqli_query($this->db_connect, $query);
            return $query_result;
        } else {
            die('query problem' . mysqli_error($this->db_connect));
        }
    }

    public function logout() {
        unset($_SESSION['username']);
        unset($_SESSION['admin_id']);
        header('Location:index.php');
    }

}
