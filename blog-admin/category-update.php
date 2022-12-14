<?php include("header.php"); 
include("db.php");

$table = "category";

if(isset($_GET['id'])){
    $id = $_GET['id'];
}

$alert = "";

$errorIC    = "Input is incorrect. Name contain letters only";
$errorE     = "Name filed is empty, please type category name";
$errorUS    = "Category create unsuccessful";
$successS   = "Category create successfully";
$successSU  = "Category updated successfully";
$successDel = "Category deleted successfully";

if(isset($_GET['alert'])){
    $alert = $_GET['alert'];

    if($alert == "successS"){
        $success = $successS;
    } else if($alert == "successSU"){
        $success = $successSU;
    } else if($alert == "successDel"){
        $success = $successDel;
    } else if($alert == "errorIC"){
        $error = $errorIC;
    } else if($alert == "errorE"){
        $error = $errorE;
    } else if($alert == "errorUS"){
        $error = $errorUS;
    }
}
$sql = "SELECT * FROM {$table} WHERE id='{$id}'";

$result = $conn->query($sql);

if($result->num_rows>0){
    $row = $result->fetch_assoc();

?>
<div class="content-wrap">
        <div class="main">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-8 p-r-0 title-margin-right">
                        <div class="page-header">
                            <div class="page-title">
                                <h5>Update Category <span class="text-primary"><?php echo $row['name']; ?></span></h5>
                            </div>
                        </div>
                    </div>
                    <!-- /# column -->
                    <div class="col-lg-4 p-l-0 title-margin-left">
                        <div class="page-header">
                            <div class="page-title">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="#">Dashboard</a></li>
                                    <li class="breadcrumb-item active">Create Post</li>
                                </ol>
                            </div>
                        </div>
                    </div>
                    <!-- /# column -->
                </div>
                <!-- /# row -->
                <section id="main-content">
                    <div class="row">
                    
                    <?php if($alert == "successS" || $alert == "successDel" || $alert == "successSU"){ ?>
                        <div class="col-lg-12">
                            <div class="alert alert-success text-light h5">
                            <?php echo $success; ?>
							</div>
                        </div>                                 
                    <?php } ?>    
                    <?php if($alert == "errorIC" || $alert == "errorE" || $alert == "errorUS"){ ?>
                        <div class="col-lg-12">
                            <div class="alert alert-danger text-light h5">
							    <?php echo $error; ?>
							</div>
                        </div>
                    <?php } ?>    
                        <div class="col-lg-6">
                            <div class="card">
                                <div class="card-body">
                                    <div class="form-validation">
                                        <form class="form-valide" action="categoryUpdateStore.php" method="POST" enctype="multipart/form-data">
                                        <input type="hidden" name="id" value ="<?php echo $row['id']; ?>">
                                            <div class="form-group row">
                                                <label class="col-lg-4 col-form-label" for="name">Category Name <span class="text-danger">*</span></label>
                                                <div class="col-lg-8">
                                                    <input type="text" class="form-control" id="name" name="name" placeholder="Enter a category name.." value ="<?php echo $row['name']; ?>">
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <div class="col-lg-8 ml-auto">
                                                    <button type="reset" class="btn btn-info">Reset</button>
                                                    <button type="submit" name="submit" value="submit" class="btn btn-primary">Create</button>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="footer">
                            <p><?php echo date("Y"); ?> ?? Blog Admin Board. - <a href="#">example.com</a></p>
                            </div>
                        </div>
                    </div>
                </section>
            </div>
        </div>
    </div>

    <!-- jquery vendor -->
    <script src="js/lib/jquery.min.js"></script>
    <script src="js/lib/jquery.nanoscroller.min.js"></script>
    <!-- nano scroller -->
    <script src="js/lib/menubar/sidebar.js"></script>
    <script src="js/lib/preloader/pace.min.js"></script>
    <!-- sidebar -->

    <!-- bootstrap -->
    <!-- Select2 -->
    <script src="js/lib/select2/select2.full.min.js"></script>
    <script src="js/lib/form-validation/jquery.validate.min.js"></script>
    <script src="js/lib/form-validation/jquery.validate-init.js"></script>
    <script src="js/lib/bootstrap.min.js"></script><script src="js/scripts.js"></script>

    <!-- scripit init... -->
    <script src="https://cdn.tiny.cloud/1/2a6fi7an1hq9wg7i6d8qiq15h3rie6c8t63udq31qm9xwrud/tinymce/6/tinymce.min.js" referrerpolicy="origin"></script>
    <script>
    tinymce.init({
      selector: 'textarea',
      plugins: 'anchor autolink charmap codesample emoticons image link lists media searchreplace table visualblocks wordcount checklist mediaembed casechange export formatpainter pageembed linkchecker a11ychecker tinymcespellchecker permanentpen powerpaste advtable advcode editimage tinycomments tableofcontents footnotes mergetags autocorrect',
      toolbar: 'undo redo | blocks fontfamily fontsize | bold italic underline strikethrough | link image media table mergetags | addcomment showcomments | spellcheckdialog a11ycheck | align lineheight | checklist numlist bullist indent outdent | emoticons charmap | removeformat',
      tinycomments_mode: 'embedded',
      tinycomments_author: 'Author name',
      mergetags_list: [
        { value: 'First.Name', title: 'First Name' },
        { value: 'Email', title: 'Email' },
      ]
     });
    </script>

</body>

</html>
<?php }
