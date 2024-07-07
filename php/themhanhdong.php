<?php
   require("connect.php");
    if(isset($_POST["btn_insert"])){
        //lay ra gia tri duoc nhap vao text
        $cate_name = $_POST["cate_phim"];
        $cate_minute = $_POST["txt_minute"];
        //upload intro img
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
            if (move_uploaded_file($_FILES["upload_file"]["tmp_name"], $target_file)) {
               
                $sql_insert = "insert into tbl_phimhanhdong(cate_name,intro_img,cate_minute) values('".$cate_name."','".$target_file."','".$cate_minute."')";
                if (mysqli_query($conn, $sql_insert)) {
                    header("location:themhanhdong.php");
                    //echo "New record created successfully";
                } 
                else {
                    echo "Error: " . $sql_insert . "<br>" . mysqli_error($conn);
                }
            } 
            else {
                echo "Sorry, there was an error uploading your file.";
            }
          }

        
    }
    
    //xoa theo chọn
    if(isset($_POST["delete_check"])){
        $new_ids = $_POST["news"];
        foreach($new_ids as $c){
            $sql_delete = 'DELETE FROM tbl_phimhanhdong WHERE cate_id = '.$c;
            if(mysqli_query($conn,$sql_delete)){
                //xoa thanh cong
            }

        }
        header("location:themhanhdong.php");
    }
    //xoa
    if(isset($_GET["task"]) && $_GET["task"]=="delete"){
        $id = $_GET["id"];
        $sql_delete = "delete from tbl_phimhanhdong where cate_id = " . $id;
        if (mysqli_query($conn, $sql_delete)) {
            //echo "New record created successfully";
            header("location:themhanhdong.php");
        } else {
            echo "Error: " . $sql . "<br>" . mysqli_error($conn);
        }
    }

   
?>
<html>
    <head>
        <link rel="stylesheet" href="../css/bootstrap.min.css">
        <script src="https://cdn.ckeditor.com/ckeditor5/39.0.1/classic/ckeditor.js"></script>
        <link rel="stylesheet" href="../css/style.css">
    </head>
    <body style="background-color: #ffffcc;">
        <div class="container">
            <h1 style="text-align: center;">Trang Quản Trị Tin Tức</h1>
            <div class="row">
                <div class="col-6">
                    <form action="" method="post" enctype="multipart/form-data">
                       
                        Nhập tên phim :
                        <input class="form-control" type="text" name="cate_phim" id="" required>
                        
                        Chọn ảnh phim:
                        <input class="form-control" type="file" name="upload_file" id="" required>
                        
                        Thời lượng phim:
                        <input class="form-control" type="text" name="txt_minute" id=""required>
                       <br>
                        <input class="btn btn-primary" name="btn_insert" type="submit" value="Thêm mới">
                        <br>
                        
                    </form>
                </div>
            </div>
            <div class="row">
                
                <div class="col-6">
                    <form action="" method="post">
                        
                            <input placeholder="tim kiem theo tieu de tin ..." class="form-control" type="text" name="txt_search" id="">
                            <br>
                            <input class="btn btn-success" type="submit" value="Tìm kiếm" name="btn_search">
                            <br><br>
            
                            
                    </form>
                </div>
            </div>

            <?php
                // BƯỚC 2: TÌM TỔNG SỐ RECORDS
                $result = mysqli_query($conn, 'select count(cate_id) as total from tbl_phimhanhdong');
                $row = mysqli_fetch_assoc($result);
                $total_records = $row['total'];
                
                // BƯỚC 3: TÌM LIMIT VÀ CURRENT_PAGE
                $current_page = isset($_GET['page']) ? $_GET['page'] : 1;
                $limit = 5;
                
                // BƯỚC 4: TÍNH TOÁN TOTAL_PAGE VÀ START
                // tổng số trang
                $total_page = ceil($total_records / $limit);
                
                // Giới hạn current_page trong khoảng 1 đến total_page
                if ($current_page > $total_page){
                    $current_page = $total_page;
                }
                else if ($current_page < 1){
                    $current_page = 1;
                }
                
                // Tìm Start
                $start = ($current_page - 1) * $limit;
            ?>


            <div class="row">
                <div class="col-12">
                    <form action=""method="POST">
                    <input class="btn btn-danger "name="delete_check" type="submit" value="Xóa theo chọn" >
                      
                    <br><br>
                    <table class="table table-stripped">
                        <tr>
                            <th>Ma phim</th>
                            <th>Tên Phim</th>
                            <th>Anh phim</th>
                            <th>Thoi luong phim</th>
                            <th>Thao Tác</th>
                            <th>Chọn</th>
                        </tr>
                        <?php

                            $sql = " ";
                            if(isset($_POST["txt_search"])){
                                $cate_name = $_POST["txt_search"];
                                $sql = "select * from tbl_phimhanhdong where cate_name like '%".$cate_name."%'";
                            }
                            else
                            $sql = "select * from tbl_phimhanhdong ORDER BY cate_id DESC LIMIT ".$start.",". $limit ;
                            $result = mysqli_query($conn,$sql);
                            if(mysqli_num_rows($result)>0){
                                while($row = mysqli_fetch_assoc($result)){
                                    echo "<tr>";
                                    echo "<td>". $row["cate_id"] . "</td>";
                                    echo "<td>". $row["cate_name"] . "</td>";
                                    echo "<td><img src='". $row["intro_img"] ."'  width='100' height='80'></td>";
                                    
                                    echo "<td>". $row["cate_minute"] . "</td>";
                                    
                                    echo "<td>";
                                        echo "<a class='btn btn-warning' href='update_phimhanhdong.php?task=update&id=".$row["cate_id"]."'>Sửa</a>";
                                        echo "<a class='btn btn-danger' href='themhanhdong.php?task=delete&id=".$row["cate_id"]."'>Xóa</a>";
                                    echo "</td>";
                                    echo "<td>";
                                        echo "<input type='checkbox' name='news[]' value='".$row["cate_id"]."' class='form-check-input'>";
                                    echo "</td>";
                                    echo "</tr>";
                                    
                                }
                            }
                            else{
                                echo "Bảng không chứa dữ liệu";
                            }
                        ?>

                        
                     </table>
                     </form>
                </div>
                <div class="pagination">
                    <?php 
                        // PHẦN HIỂN THỊ PHÂN TRANG
                        // BƯỚC 7: HIỂN THỊ PHÂN TRANG
 
                        // nếu current_page > 1 và total_page > 1 mới hiển thị nút prev
                        if ($current_page > 1 && $total_page > 1){
                            echo '<a href="themhanhdong.php?page='.($current_page-1).'">Truoc</a> | ';
                        }
                        
                        // Lặp khoảng giữa
                        for ($i = 1; $i <= $total_page; $i++){
                            // Nếu là trang hiện tại thì hiển thị thẻ span
                            // ngược lại hiển thị thẻ a
                            if ($i == $current_page){
                                echo '<span class ="current-page">'.$i.'</span> | ';
                            }
                            else{
                                echo '<a href="themhanhdong.php?page='.$i.'">'.$i.'</a> | ';
                            }
                        }
                        
                        // nếu current_page < $total_page và total_page > 1 mới hiển thị nút prev
                        if ($current_page < $total_page && $total_page > 1){
                            echo '<a href="themhanhdong.php?page='.($current_page+1).'">Sau</a> | ';
                        }
                    ?>
                </div>
            </div>
        </div>

    </body>
</html>
