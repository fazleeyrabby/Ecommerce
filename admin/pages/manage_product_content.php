<?php
$query_result = $obj_super_admin->select_all_product_info();
//    while ($product_info= mysqli_fetch_assoc($query_result)){
//        echo '<pre>';
//        print_r($product_info);
//    }
//    exit();
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
                <thead>
                    <tr>
                        <th>Product Name</th>
                        <th>category Name</th>
                        <th>Manufacture Name</th>
                        <th>Product price</th>
                        <th>Stock Amount </th>
                        <th>publication status</th>
                        <th>Actions</th>
                    </tr>
                </thead>   
                <tbody>
                    <?php while ($product_info = mysqli_fetch_assoc($query_result)) { ?>
                        <tr>
                            <td><?php echo $product_info['product_name']; ?></td>
                            <td><?php echo $product_info['category_name']; ?></td>
                            <td><?php echo $product_info['manufacture_name']; ?></td>
                            <td><?php echo $product_info['product_price']; ?></td>
                            <td><?php echo $product_info['stock_quantity']; ?></td>
                            <td>
                                <?php
                                if ($product_info['publication_status'] == 1) {
                                    echo 'Published';
                                } else {
                                    echo 'Unpublished';
                                }
                                ?>
                            </td>
                            <?php if ($product_info['publication_status'] == 1) { ?>
                                <td class="center">
                                    <a class="btn btn-success" href="">
                                        <i class="halflings-icon white arrow-up" title="Published"></i>  
                                    </a>
                                <?php } else { ?>
                                    <a class="btn btn-success" href="#">
                                        <i class="halflings-icon white arrow-down" title="Unpublished"></i>  
                                    </a>
                                <?php } ?>
                                <a class="btn btn-info" href="#">
                                    <i class="halflings-icon white edit" title="Edit"></i>  
                                </a>
                                <a class="btn btn-danger" href="#">
                                    <i class="halflings-icon white trash" title="Delete"></i> 
                                </a>
                                    <a class="btn btn-info" href="view_product.php?id=<?php echo $product_info['product_id'];?>">
                                    <i class="halflings-icon white zoom-in" title="View"></i> 
                                </a>
                            </td>
                        </tr>
                    <?php } ?>
                </tbody>
            </table>
        </div>
    </div>
</div>

