<?php
$category_id = $_GET['id'];
$query_result = $obj_super_admin->select_category_byid($category_id);
$category_info = mysqli_fetch_assoc($query_result);
$message='';
if (isset($_POST['btn'])) {
    $message = $obj_super_admin->update_category_info($_POST);
}
?>
<div class="container-fluid-full">
        <div class="row-fluid">

        <!-- start: Main Menu -->

        <!-- end: Main Menu -->


        <!-- start: Content -->
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
            
            <a href="manage_category.php"><h2><?php echo $message;?></h2></a>
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
                        <form name="edit_category_form" class="form-horizontal" action="" method="post">
                            <fieldset>
                                <div class="control-group">
                                    <label class="control-label" for="typeahead">Category Name </label>
                                    <div class="controls">
                                        <input type="text" value="<?php echo $category_info['category_name'];?>" name="category_name" class="span6 typeahead" id="typeahead"  data-provide="typeahead" data-items="4" data-source='["Alabama","Alaska","Arizona","Arkansas","California","Colorado","Connecticut","Delaware","Florida","Georgia","Hawaii","Idaho","Illinois","Indiana","Iowa","Kansas","Kentucky","Louisiana","Maine","Maryland","Massachusetts","Michigan","Minnesota","Mississippi","Missouri","Montana","Nebraska","Nevada","New Hampshire","New Jersey","New Mexico","New York","North Dakota","North Carolina","Ohio","Oklahoma","Oregon","Pennsylvania","Rhode Island","South Carolina","South Dakota","Tennessee","Texas","Utah","Vermont","Virginia","Washington","West Virginia","Wisconsin","Wyoming"]'>
                                        <input type="hidden"  value="<?php echo $category_info['category_id'];?>" name="category_id" class="span6 typeahead" id="typeahead"  data-provide="typeahead" data-items="4" data-source='["Alabama","Alaska","Arizona","Arkansas","California","Colorado","Connecticut","Delaware","Florida","Georgia","Hawaii","Idaho","Illinois","Indiana","Iowa","Kansas","Kentucky","Louisiana","Maine","Maryland","Massachusetts","Michigan","Minnesota","Mississippi","Missouri","Montana","Nebraska","Nevada","New Hampshire","New Jersey","New Mexico","New York","North Dakota","North Carolina","Ohio","Oklahoma","Oregon","Pennsylvania","Rhode Island","South Carolina","South Dakota","Tennessee","Texas","Utah","Vermont","Virginia","Washington","West Virginia","Wisconsin","Wyoming"]'>
                                    </div>
                                </div>
                                <div class="control-group hidden-phone">
                                    <label class="control-label" for="textarea2">Category Description</label>
                                    <div class="controls">
                                        <textarea class="cleditor"  name="ctgry_dcrpton" id="textarea2" rows="3"><?php echo $category_info['category_descrip'];?></textarea>
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
                                    <button type="submit"  name="btn" class="btn btn-primary">Update Category</button>
                                    <button type="reset"  class="btn">Cancel</button>
                                </div>
                            </fieldset>
                        </form>   
                    </div>
                </div><!--/span-->
            </div><!--/row-->
        </div>
    </div>
</div>
<script>
    document.forms['edit_category_form'].elements['publication_status'].value='<?php echo $category_info['publication_status'];?>';
</script>