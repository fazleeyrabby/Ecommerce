<?php
$message = '';
if (isset($_GET['status'])) {
    $manufacture_id = $_GET['id'];
    if ($_GET['status'] == 'unpublished'){
        $message = $obj_super_admin->unpublished_manufacture_by_id ($manufacture_id);
        }elseif ($_GET['status'] == 'published') {
        $message = $obj_super_admin->published_manufcture_by_id ($manufacture_id);
        }elseif ($_GET['status']=='delete') {
            $message=$obj_super_admin->delete_manufacture_info_by_id($manufacture_id);
    }
}

$query_result = $obj_super_admin->select_all_manafacture_info();
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
        <?php
        if ($message) {
            echo $message;
        }
        unset($message);
        ?>
        <?php
        if (isset($_SESSION['message'])) {
            echo $_SESSION['message'];
            unset($_SESSION['message']);
        }
        ?>
        <div class="box-content">
            <table class="table table-striped table-bordered bootstrap-datatable datatable">
                <thead>
                    <tr>
                        <th>Manufacture id</th>
                        <th>Manufacture Name</th>
                        <th>Manufacture Description</th>
                        <th>Publication status</th>
                        <th>Actions</th>
                    </tr>
                </thead>   
                <tbody>
                    <?php while ($manufacture_info = mysqli_fetch_assoc($query_result)) { ?>
                        <tr>
                            <td><?php echo $manufacture_info['manufacture_id']; ?></td>
                            <td><?php echo $manufacture_info['manufacture_name']; ?></td>
                            <td><?php echo $manufacture_info['manufacture_descrip']; ?></td>         
                            <td>
                                <?php
                                if ($manufacture_info['publication_status'] == 1) {
                                    echo 'Published';
                                } else {
                                    echo 'Unpublished';
                                }
                                ?>
                            </td>
    <!--                        <td class="center">
                                <span class="label label-success"></span>
                            </td>-->
                            <td class="center">
                                <?php if ($manufacture_info['publication_status'] == 1) { ?>
                                    <a class="btn btn-success" href="?status=unpublished&&id=<?php echo $manufacture_info['manufacture_id']; ?>">
                                        <i class="halflings-icon white arrow-up" title="Unpublished"></i>  
                                    </a>
                                <?php } else { ?>
                                    <a class="btn btn-danger" href="?status=published&&id=<?php echo $manufacture_info['manufacture_id']; ?>">
                                        <i class="halflings-icon white arrow-down" title="published"></i>  
                                    </a>
                                <?php } ?>
                                <a class="btn btn-info" href="edit_manufacture.php?status=edit&&id=<?php echo $manufacture_info['manufacture_id'] ?>">
                                    <i class="halflings-icon white edit" title="Edit"></i>  
                                </a>
                                <a class="btn btn-danger" href="?status=delete&&id=<?php echo $manufacture_info['manufacture_id']; ?>" onclick=" return check_delete_info();">
                                    <i class="halflings-icon white trash" title="Delete"></i> 
                                </a>
                            </td>
                        </tr>
                    <?php } ?>
                </tbody>
            </table>            
        </div>
    </div><!--/span-->
</div>
