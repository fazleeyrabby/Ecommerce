<?php
include '../classes/application.php';
$obj_app = new Application();
$category_result = $obj_app->select_all_published_cat_info();
$manufacture_result = $obj_app->select_all_published_manufacture_info();
$message = '';
if (isset($_POST['btn'])) {
    $message = $obj_super_admin->save_product_info($_POST);
}
?>
<div class="container-fluid-full">
    <div class="row-fluid">
        <div id="content" class="span10">
            <ul class="breadcrumb">
                <li>
                    <i class="icon-home"></i>
                    <a href="index.php">Home</a>
                    <i class="icon-angle-right"></i> 
                </li>
                <li>
                    <i class="icon-edit"></i>
                    <a href="#">Forms</a>
                </li>
            </ul>
            <h2><?php echo $message; ?></h2>
            <div class="row-fluid sortable">
                <div class="box span12">
                    <div class="box-header" data-original-title>
                        <h2><i class="halflings-icon edit"></i><span class="break"></span>Form Elements</h2>
                        <div class="box-icon">
                            <a href="#" class="btn-setting"><i class="halflings-icon wrench"></i></a>
                            <a href="#" class="btn-minimize"><i class="halflings-icon chevron-up"></i></a>
                            <a href="#" class="btn-close"><i class="halflings-icon remove"></i></a>
                        </div>
                    </div>
                    <div class="box-content">
                        <form class="form-horizontal" action="" method="post" enctype="multipart/form-data"> 
                            <fieldset>
                                <div class="control-group">
                                    <label class="control-label" for="typeahead">Product Name </label>
                                    <div class="controls">
                                        <input type="text" name="product_name" class="span6 typeahead" id="typeahead"  data-provide="typeahead" data-items="4" data-source='["Alabama","Alaska","Arizona","Arkansas","California","Colorado","Connecticut","Delaware","Florida","Georgia","Hawaii","Idaho","Illinois","Indiana","Iowa","Kansas","Kentucky","Louisiana","Maine","Maryland","Massachusetts","Michigan","Minnesota","Mississippi","Missouri","Montana","Nebraska","Nevada","New Hampshire","New Jersey","New Mexico","New York","North Dakota","North Carolina","Ohio","Oklahoma","Oregon","Pennsylvania","Rhode Island","South Carolina","South Dakota","Tennessee","Texas","Utah","Vermont","Virginia","Washington","West Virginia","Wisconsin","Wyoming"]'>
                                    </div>
                                </div>
                                <div class="control-group">
                                    <label class="control-label" for="selectError">Category Name</label>
                                    <div class="controls">
                                        <select id="selectError" name="category_id">
                                            <option>---Select Category name---</option>
                                            <?php while ($category_info = mysqli_fetch_assoc($category_result)) { ?>
                                                <option value="<?php echo $category_info['category_id']; ?>"><?php echo $category_info['category_name']; ?></option>
                                            <?php } ?>
                                        </select>
                                    </div>
                                </div><div class="control-group">
                                    <label class="control-label" for="selectError">Manufacture Name</label>
                                    <div class="controls">
                                        <select id="selectError" name="manufacture_id">
                                            <option>---Select Manufacture Name---</option>
                                            <?php while ($manufacture_info = mysqli_fetch_assoc($manufacture_result)) { ?>
                                                <option value="<?php echo $manufacture_info['manufacture_id']; ?>"><?php echo $manufacture_info['manufacture_name']; ?></option>
                                            <?php } ?>
                                        </select>
                                    </div>
                                </div>
                                <div class="control-group">
                                    <label class="control-label" for="typeahead">Product Price </label>
                                    <div class="controls">
                                        <input type="number" name="product_price" class="span6 typeahead" id="typeahead"  data-provide="typeahead" data-items="4" data-source='["Alabama","Alaska","Arizona","Arkansas","California","Colorado","Connecticut","Delaware","Florida","Georgia","Hawaii","Idaho","Illinois","Indiana","Iowa","Kansas","Kentucky","Louisiana","Maine","Maryland","Massachusetts","Michigan","Minnesota","Mississippi","Missouri","Montana","Nebraska","Nevada","New Hampshire","New Jersey","New Mexico","New York","North Dakota","North Carolina","Ohio","Oklahoma","Oregon","Pennsylvania","Rhode Island","South Carolina","South Dakota","Tennessee","Texas","Utah","Vermont","Virginia","Washington","West Virginia","Wisconsin","Wyoming"]'>
                                    </div>
                                </div>
                                <div class="control-group">
                                    <label class="control-label" for="typeahead">Product Quality </label>
                                    <div class="controls">
                                        <input type="number" name="stock_quantity" class="span6 typeahead" id="typeahead"  data-provide="typeahead" data-items="4" data-source='["Alabama","Alaska","Arizona","Arkansas","California","Colorado","Connecticut","Delaware","Florida","Georgia","Hawaii","Idaho","Illinois","Indiana","Iowa","Kansas","Kentucky","Louisiana","Maine","Maryland","Massachusetts","Michigan","Minnesota","Mississippi","Missouri","Montana","Nebraska","Nevada","New Hampshire","New Jersey","New Mexico","New York","North Dakota","North Carolina","Ohio","Oklahoma","Oregon","Pennsylvania","Rhode Island","South Carolina","South Dakota","Tennessee","Texas","Utah","Vermont","Virginia","Washington","West Virginia","Wisconsin","Wyoming"]'>
                                    </div>
                                </div>
                                <div class="control-group">
                                    <label class="control-label" for="typeahead">Product SKU </label>
                                    <div class="controls">
                                        <input type="number" name="product_squ" class="span6 typeahead" id="typeahead"  data-provide="typeahead" data-items="4" data-source='["Alabama","Alaska","Arizona","Arkansas","California","Colorado","Connecticut","Delaware","Florida","Georgia","Hawaii","Idaho","Illinois","Indiana","Iowa","Kansas","Kentucky","Louisiana","Maine","Maryland","Massachusetts","Michigan","Minnesota","Mississippi","Missouri","Montana","Nebraska","Nevada","New Hampshire","New Jersey","New Mexico","New York","North Dakota","North Carolina","Ohio","Oklahoma","Oregon","Pennsylvania","Rhode Island","South Carolina","South Dakota","Tennessee","Texas","Utah","Vermont","Virginia","Washington","West Virginia","Wisconsin","Wyoming"]'>
                                    </div>
                                </div>
                                <div class="control-group hidden-phone">
                                    <label class="control-label" for="textarea2">Product short Description</label>
                                    <div class="controls">
                                        <textarea class="cleditor" name="product_sort_des" id="textarea2" rows="3"></textarea>
                                    </div>
                                </div>
                                <div class="control-group hidden-phone">
                                    <label class="control-label" for="textarea2">Product Long Description</label>
                                    <div class="controls">
                                        <textarea class="cleditor" name="product_long_des" id="textarea2" rows="3"></textarea>
                                    </div>
                                </div>
                                <div class="control-group">
                                    <label class="control-label">File Upload</label>
                                    <div class="controls">
                                        <input type="file" name="product_image">
                                    </div>
                                </div>
                                <div class="control-group">
                                    <label class="control-label" for="selectError">Publication Status</label>
                                    <div class="controls">
                                        <select id="selectError" name="publication_status">
                                            <option>---Select Publication status---</option>
                                            <option value="1">Published</option>
                                            <option value="0">Unpublished</option>
                                        </select>
                                    </div>
                                </div><br>
                                <div class="form-actions">
                                    <button type="submit" name="btn" class="btn btn-primary">Save changes</button>
                                    <button type="reset" name="" class="btn">Cancel</button>
                                </div>
                            </fieldset>
                        </form>   

                    </div>
                </div><!--/span-->

            </div><!--/row-->
        </div>
    </div>
</div>