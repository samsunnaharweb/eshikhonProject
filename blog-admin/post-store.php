<?php
include("db.php");

$table ="post";

if(isset($_POST['submit'])){
    $title          = $_POST['post-title'];
    $description    = $_POST['post-description'];
    $category       = $_POST['post-category'];
    $status         = $_POST['post-status'];
    $titleSlug           = strtolower(trim($name));

    if(!empty($name)){
        if(!preg_match('/^[a-zA-Z\s]/',$name)){
            header("location:post-create.php?alert=errorIC");
            exit();
        }
    }else{
        header("location:post-create.php?alert=errorE");
        exit();
    }

    if(!empty($name)){
        if(!preg_match('/^[a-zA-Z\s]/',$name)){
            header("location:post-create.php?alert=errorIC");
            exit();
        }
    }else{
        header("location:post-create.php?alert=errorE");
        exit();
    }

    $sql = "INSERT INTO {$table} (name, slug) VALUES ('$name', '$slug') ";
    
    if($conn->query($sql)){
        header("location:post-index.php?alert=successS");
    }else{
        header("location:post-index.php?alert=errorUS");
    }
}