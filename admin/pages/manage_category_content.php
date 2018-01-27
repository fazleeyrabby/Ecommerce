<?php
if (isset($_GET['status'])) {
    $category_id = $_GET['id'];
    if ($_GET['status'] == 'unpublished') {
        $message = $obj_super_admin->unpublish_cat_by_id($category_id);
    } else if ($_GET['status'] == 'published') {
        $message = $obj_super_admin->publish_cat_by_id($category_id);
    } else if ($_GET['status'] == 'delete') {
        $message = $obj_super_admin->delete_cat_by_id($category_id);
    }
}

$query_result = $obj_super_admin->select_category_info();
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
        <h1>
            <?php
                if(isset($message)){
                    echo $message;
                    unset($message);
                }
                
            ?>
        </h1>
        <h1>
            <?php
            if (isset($_SESSION['message'])) {
                echo $_SESSION['message'];
                unset($_SESSION['message']);
            }
            ?>
        </h1>
        <div class="box-content">
            <table class="table table-striped table-bordered bootstrap-datatable datatable">
                <thead>
                    <tr>
                        <th>Category Id</th>
                        <th>category Name</th>
                        <th>Category Description</th>
                        <th>Publication Status</th>
                        <th>Actions</th>
                    </tr>
                </thead>   
                <tbody>
                    <?php while ($manage_cat_info = mysqli_fetch_assoc($query_result)) { ?>
                        <tr>
                            <td><?php echo $manage_cat_info['category_id']; ?></td>
                            <td><?php echo $manage_cat_info['category_name']; ?></td>
                            <td><?php echo $manage_cat_info['category_descrip']; ?></td>
                            <td>
                                <?php
                                if ($manage_cat_info['publication_status'] == 1) {
                                    echo 'Published';
                                } else {
                                    echo 'Unpublished';
                                }
                                ?>
                            </td>
                            <td class="center">
                                <?php if ($manage_cat_info['publication_status'] == 1) { ?>
                                    <a class="btn btn-success" href="?status=unpublished&&id=<?php echo $manage_cat_info['category_id']; ?>" title="unpublished">
                                        <i class="halflings-icon white arrow-up"></i>  
                                    </a>
                                <?php } else { ?>
                                    <a class="btn btn-danger" href="?status=published&&id=<?php echo $manage_cat_info['category_id']; ?>" title="published">
                                        <i class="halflings-icon white arrow-down"></i>  
                                    </a>
                                <?php } ?>
                                <a class="btn btn-info" href="edit_category.php?id=<?php echo $manage_cat_info['category_id']; ?>" title="edit">
                                    <i class="halflings-icon white edit"></i>  
                                </a>
                                <a class="btn btn-danger" href="?status=delete&&id=<?php echo $manage_cat_info['category_id']; ?>" onclick="return check_delete_info();" title="delete">
                                    <i class="halflings-icon white trash"></i> 
                                </a>
                            </td>
                        </tr>
                    <?php } ?>
                </tbody>
            </table>            
        </div>
    </div><!--/span-->
</div>
