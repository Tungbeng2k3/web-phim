<?php
    require("connect.php");


?>
<!DOCTYPE html>

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="icon" type="images/x-con" href="../images/icons8-play-48.png">
  <title>Phim Hành Động</title>
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css">
  <link rel="stylesheet" href="../css/home.css">
</head>

<body>
  <div class="fruid-container">
    <!-- header site -->
    <nav class="navbar bg-transparent">
      <div class="container">
        <a class="navbar-brand" href="#">
          <img src="../images/phim1080.png" alt="" width="120" height="22">
        </a>
        <a class="navbar-brand" href="#">THỂ LOẠI</a>
        <a class="navbar-brand" href="#">QUỐC GIA</a>
        <a class="navbar-brand" href="#">PHIM LẺ</a>
        <a class="navbar-brand" href="#">PHIM BỘ</a>
        <a class="navbar-brand" href="#">CHIẾU RẠP</a>
        <a class="navbar-brand" href="#">SẮP CHIẾU</a>
        <form class="d-flex" role="search" action="#" method="post">
          <input class="form-control me-2" type="search" placeholder="Tìm kiếm phim " aria-label="Search" name="txt_search">
          <button name="btn_search" class="btn btn-outline-success" type="submit">Search</button>
        </form>
        <a class="navbar-brand" href="#">
          <svg style="margin-left: 60px;" xmlns="http://www.w3.org/2000/svg" width="40" height="40" fill="currentColor"
            class="bi bi-person-circle" viewBox="0 0 16 16">
            <path d="M11 6a3 3 0 1 1-6 0 3 3 0 0 1 6 0z" />
            <path fill-rule="evenodd"
              d="M0 8a8 8 0 1 1 16 0A8 8 0 0 1 0 8zm8-7a7 7 0 0 0-5.468 11.37C3.242 11.226 4.805 10 8 10s4.757 1.225 5.468 2.37A7 7 0 0 0 8 1z" />
          </svg>
        </a>
      </div>

    </nav>
  </div>
  <!-- body site -->
  <div></div>
  <div class="container-film">
    <div class="title">
      <div class="row">
        <div class="col-1">
          <div class="item-1">
            <h1>
              <svg style="color: red; margin-top:-30px;" xmlns="http://www.w3.org/2000/svg" width="30" height="30"
                fill="currentColor" class="bi bi-camera-reels" viewBox="0 0 16 16">
                <path d="M6 3a3 3 0 1 1-6 0 3 3 0 0 1 6 0zM1 3a2 2 0 1 0 4 0 2 2 0 0 0-4 0z" />
                <path
                  d="M9 6h.5a2 2 0 0 1 1.983 1.738l3.11-1.382A1 1 0 0 1 16 7.269v7.462a1 1 0 0 1-1.406.913l-3.111-1.382A2 2 0 0 1 9.5 16H2a2 2 0 0 1-2-2V8a2 2 0 0 1 2-2h7zm6 8.73V7.27l-3.5 1.555v4.35l3.5 1.556zM1 8v6a1 1 0 0 0 1 1h7.5a1 1 0 0 0 1-1V8a1 1 0 0 0-1-1H2a1 1 0 0 0-1 1z" />
                <path d="M9 6a3 3 0 1 0 0-6 3 3 0 0 0 0 6zM7 3a2 2 0 1 1 4 0 2 2 0 0 1-4 0z" />
              </svg>
            </h1>

          </div>
        </div>
        <div class="col-11">
          <div class="item-2">
            <h2>PHIM HÀNH ĐỘNG</h2>
          </div>
          
        </div>
      </div>
    </div>

    <?php
                // BƯỚC 2: TÌM TỔNG SỐ RECORDS
                $result = mysqli_query($conn, 'select count(cate_id) as total from tbl_phimhanhdong');
                $row = mysqli_fetch_assoc($result);
                $total_records = $row['total'];
                
                // BƯỚC 3: TÌM LIMIT VÀ CURRENT_PAGE
                $current_page = isset($_GET['page']) ? $_GET['page'] : 1;
                $limit = 30;
                
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
    <div class="film-body-container">
        <?php
        //tìm kiếm phim
        $sql = " ";
        if(isset($_POST["txt_search"])){
            $name = $_POST["txt_search"];
            $sql = "select * from tbl_phimhanhdong where cate_name like '%".$name."%'";
        }
        else
        $sql = "select * from tbl_phimhanhdong ORDER BY cate_id DESC LIMIT ".$start.",". $limit ;
        $result = mysqli_query($conn, $sql);
        if (mysqli_num_rows($result) > 0) {
            while ($row = mysqli_fetch_assoc($result)) {
                echo "<div class='box-b'>";
                echo "<div class='film-a'>";
                echo "<a href='#'>";
                echo "<img src='" . $row["intro_img"] . "' alt='' class='anh-film'>";
                echo"</a>";
                echo "</div>";   
                echo "<span class='film-title'>" . $row['cate_name'] . "</span>";
                echo "</div>";
            }
}
?>

        
    </div>
    <div class="pagination">
                    <?php 
                        // PHẦN HIỂN THỊ PHÂN TRANG
                        // BƯỚC 7: HIỂN THỊ PHÂN TRANG
 
                        // nếu current_page > 1 và total_page > 1 mới hiển thị nút prev
                        if ($current_page > 1 && $total_page > 1){
                            echo '<a href="phimhanhdong.php?page='.($current_page-1).'">Truoc</a> | ';
                        }
                        
                        // Lặp khoảng giữa
                        for ($i = 1; $i <= $total_page; $i++){
                            // Nếu là trang hiện tại thì hiển thị thẻ span
                            // ngược lại hiển thị thẻ a
                            if ($i == $current_page){
                                echo '<span>'.$i.'</span> | ';
                            }
                            else{
                                echo '<a href="phimhanhdong.php?page='.$i.'">'.$i.'</a> | ';
                            }
                        }
                        
                        // nếu current_page < $total_page và total_page > 1 mới hiển thị nút prev
                        if ($current_page < $total_page && $total_page > 1){
                            echo '<a href="phimhanhdong.php?page='.($current_page+1).'">Sau</a> | ';
                        }
                    ?>
                </div>

  </div>

  </div>
 
</body>

</html>