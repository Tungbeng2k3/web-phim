<?php
    require("connect.php");
    
    $this_id = $_GET['id'];
   

    $sql = "SELECT *FROM tbl_phimhanhdong WHERE cate_id ='$this_id' ";
    $query = mysqli_query($conn, $sql);
    $row = mysqli_fetch_assoc($query);
    //khi nhaasn nuts luu lai

    if(isset($_POST['update'])){

        $cate_name = $_POST["cate_name"];
        
       
       
        $cate_minute = $_POST["txt_minute"];
       

        //anhr
        
       $target_dir = "../upload_phim/";
        $target_file = $target_dir . basename($_FILES["upload_file"]["name"]);
        $uploadOk = 1;
        $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
        //kiem tra dinh dang file anh
        if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
            && $imageFileType != "gif" ) {
            echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
            $uploadOk = 0;
        }
       
        if ($uploadOk == 0) {
            echo "Sorry, your file was not uploaded.";
          // if everything is ok, try to upload file
          } 
          else {
            if (move_uploaded_file($_FILES["upload_file"]["tmp_name"], $target_file)){



        $sql = "UPDATE tbl_phimhanhdong SET  cate_name = '$cate_name',intro_img='$target_file',cate_minute='$cate_minute'
        WHERE cate_id =".$this_id;
        
        mysqli_query($conn, $sql);
        header('location: themhanhdong.php');



    }
    }
    }



?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="../css/bootstrap.min.css">
    <link rel="stylesheet" href="style.css">
    <script src="https://cdn.ckeditor.com/ckeditor5/39.0.1/classic/ckeditor.js"></script>

</head>



<body  style="background-color: #ffffcc; ">
    <div class="container">
        <div class="row">
            <h1>Trang sửa phim hành động</h1>

            <h2> Phim cần sửa là:
                <?php echo $row['cate_name'];?>
            </h2>       

            <form method="POST" enctype = "multipart/form-data">
            <div class="row">
                <div class="col-6">
                    
                    <div class="form-group">
                        Nhập tên phim:
                        <input type="text" name="cate_name" id="" class="form-control" required>
                    </div>
                   <br>
                    <div class="form-control">
                        Chọn ảnh phim:
                        <input type="file" name="upload_file" id="" class="form-control"required>
                    </div>

                    <div class="form-group">
                        Thời lượng phim:
                        <input type="text" name="txt_minute" id="" class="form-control"required>
                    </div>
                    
                    <br>
                    <input type="submit" value="Lưu lại" name="update" class="btn btn-primary">
                        </form>
                </div>
            </div>