<?php
$product_id = $_GET['id'];
$query_result = $obj_super_admin->select_product_info_by_id($product_id);
?>
<ul class="breadcrumb">
    <li>
        <i class="icon-home"></i>
        <a href="index.php">Home</a> 
        <i class="icon-angle-right"></i>
    </li>
    <li><a href="#">Tables</a></li>
</ul>

<div class="row-fluid sortable">		
    <div class="box span12">
        <div class="box-header" data-original-title>
            <h2><i class="halflings-icon user"></i><span class="break"></span>Members</h2>
            <div class="box-icon">
                <a href="#" class="btn-setting"><i class="halflings-icon wrench"></i></a>
                <a href="#" class="btn-minimize"><i class="halflings-icon chevron-up"></i></a>
                <a href="#" class="btn-close"><i class="halflings-icon remove"></i></a>
            </div>
        </div>

        <div class="box-content">
            <table class="table table-striped table-bordered bootstrap-datatable datatable">
                <?php while ($product_info = mysqli_fetch_assoc($query_result)) { ?>
                    <thead>
                        <tr>
                            <th>Product Id</th>
                            <td><?php echo $product_info['product_id']; ?></td>
                        </tr>
                        <tr>
                            <th>Product name</th>
                            <td><?php echo $product_info['product_name']; ?></td>
                        </tr>
                        <tr>
                            <th>Category Name</th>
                            <td><?php echo $product_info['category_name']; ?></td>
                        </tr>
                        <tr>
                            <th>Manufacture Name</th>
                            <td><?php echo $product_info['manufacture_name']; ?></td>
                        </tr>
                        <tr>
                            <th>stock quantity</th>
                            <td><?php echo $product_info['stock_quantity']; ?></td>
                        </tr>

                        <tr>
                            <th>Product price</th>
                            <td><?php echo $product_info['product_price']; ?></td>
                        </tr>
                        <tr>
                            <th>SKU</th>
                            <td><?php echo $product_info['product_squ']; ?></td>
                        </tr>
                        <tr>
                            <th>Product sort Description</th>
                            <td><?php echo $product_info['product_short_des']; ?></td>
                        </tr>
                        <tr>
                            <th>Product long Description</th>
                            <td><?php echo $product_info['product_long_des']; ?></td>
                        </tr>
                        <tr>
                            <th>Product Image</th>
                            <td><img src="../pages/<?php echo $product_info['product_image']; ?>" alt="" height="100" width="100"></td>
                        </tr>
                        <tr>
                            <th>Publication status</th>
                            <td>
                                <?php
                                if ($product_info['publication_status'] == 1) {
                                    echo 'publised';
                                } else {
                                    echo 'unpublished';
                                }
                                ?>
                            </td>
                        </tr>
                    </thead>   
                <?php } ?>
            </table>            
        </div>
    </div><!--/span-->
</div>
