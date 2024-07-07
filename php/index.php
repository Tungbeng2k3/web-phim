<?php
    require("connect.php");

    session_start();
    //kiem tra xem dang nhap hay chua
    if(!$_SESSION["emaill"]){
        header("location:../login.php");
    }
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="icon" type="images/x-con" href="../images/icons8-play-48.png">
  <title>Xem Phim Online Chất Lượng Cao</title>
  <link href="../web/bootstrap.min.css" rel="stylesheet" />
  <script src="../web/js/bootstrap.bundle.min.js"></script>
  <link rel="stylesheet" href="../css/bootstrap.min.css">
  <link rel="stylesheet" href="../css/home_style.css">
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto:400,400i,700,700i&display=swap">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css"
    integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA=="
    crossorigin="anonymous" referrerpolicy="no-referrer" />

</head>

<body>
  <div class="fixed-menu" id="wrapper">
    <div id="header">
      <div class="container">
        <nav class="container">
          <!-- logo -->
          <a href="#" id="logo">
            <img src="../images/phim1080.png" alt="logo_web" width="120" height="22"></a>
          <div id="main-menu">
            <div id="navi-menu">
              <!-- menu -->
              <nav>
                <ul id="cate-menu">
                  <li><a href="#">THỂ LOẠI</a>
                    <ul class="sub-menu">
                      <li><a href="#">Hành Động</a></li>
                      <li><a href="#">Tình Cảm</a></li>
                      <li><a href="#">Hài Hước</a></li>
                      <li><a href="#">Thần Thoại</a></li>
                      <li><a href="#">Âm Nhạc</a></li>
                      <li><a href="#">Khoa Học</a></li>
                      <li><a href="#">Phiêu Lưu</a></li>
                      <li><a href="#">Hoạt Hình</a></li>
                      <li><a href="#">Kinh Dị</a></li>
                      <li><a href="#">Thể Thao</a></li>
                      <li><a href="#">Bí Ẩn</a></li>
                    </ul>
                  </li>
                  <li><a href="#">QUỐC GIA</a>
                    <ul class="sub-menu">
                      <li><a href="#">Mỹ </a></li>
                      <li><a href="#">Hàn</a></li>
                      <li><a href="#">Trung Quốc</a></li>
                      <li><a href="#">Nhật</a></li>
                      <li><a href="#">Châu Âu</a></li>
                      <li><a href="#">Châu Á</a></li>
                      <li><a href="#">Khác</a></li>
                    </ul>
                  </li>
                  <li><a href="#">PHIM LẺ</a>
                    <ul class="sub-menu">
                      <li><a href="#">Mới Nhất</a></li>
                      <li><a href="#">Năm 2023</a></li>
                      <li><a href="#">Năm 2022</a></li>
                      <li><a href="#">Năm 2021</a></li>
                      <li><a href="#">Năm 2020</a></li>
                      <li><a href="#">Năm 2019</a></li>
                      <li><a href="#">Năm 2018</a></li>
                      <li><a href="#">Năm 2017</a></li>
                      <li><a href="#">Năm 2016</a></li>
                      <li><a href="#">Năm 2015</a></li>
                      <li><a href="#">Tất cả</a></li>
                    </ul>
                  </li>
                  <li><a href="#">PHIM BỘ</a>
                    <ul class="sub-menu">
                      <li><a href="#">Mỹ </a></li>
                      <li><a href="#">Hàn</a></li>
                      <li><a href="#">Trung Quốc</a></li>
                      <li><a href="#">Nhật</a></li>
                      <li><a href="#">Châu Âu</a></li>
                      <li><a href="#">Châu Á</a></li>
                      <li><a href="#">Khác</a></li>
                    </ul>
                  </li>
                  <li><a href="#">CHIẾU RẠP</a></li>
                  <li><a href="#">SẮP CHIẾU</a></li>
                </ul>
                <div class="nav-search">
                  <form action="" id="search-box">
                    <input type="text" placeholder="Tìm kiếm phim..." name="" id="search-text">
                    <i class="fa-solid fa-magnifying-glass"></i>
                  </form>
                </div>
              </nav>

            </div>
          </div>


          <!-- user-icon -->
          <div class="user_icon">
            <a href="register.php">
              <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="#fff" class="bi bi-person-circle"
                viewBox="0 0 16 16">
                <path d="M11 6a3 3 0 1 1-6 0 3 3 0 0 1 6 0z" />
                <path fill-rule="evenodd"
                  d="M0 8a8 8 0 1 1 16 0A8 8 0 0 1 0 8zm8-7a7 7 0 0 0-5.468 11.37C3.242 11.226 4.805 10 8 10s4.757 1.225 5.468 2.37A7 7 0 0 0 8 1z" />
              </svg>
              <br>
              <?php echo"" .$_SESSION['emaill'];?>
              <a href="">Đăng xuất</a>
            </a>
            
          </div>
        </nav>
      </div>


    </div>

  </div>
  <!-- body -->
  <div class="body-main">
    <div class="main-container">
      <div class="row">
        <div class="col-9">
          <div class="logo">
            <svg style="color: red; margin-top: -15px;" xmlns="http://www.w3.org/2000/svg" width="30" height="30"
              fill="currentColor" class="bi bi-camera-reels" viewBox="0 0 16 16">
              <path d="M6 3a3 3 0 1 1-6 0 3 3 0 0 1 6 0zM1 3a2 2 0 1 0 4 0 2 2 0 0 0-4 0z" />
              <path
                d="M9 6h.5a2 2 0 0 1 1.983 1.738l3.11-1.382A1 1 0 0 1 16 7.269v7.462a1 1 0 0 1-1.406.913l-3.111-1.382A2 2 0 0 1 9.5 16H2a2 2 0 0 1-2-2V8a2 2 0 0 1 2-2h7zm6 8.73V7.27l-3.5 1.555v4.35l3.5 1.556zM1 8v6a1 1 0 0 0 1 1h7.5a1 1 0 0 0 1-1V8a1 1 0 0 0-1-1H2a1 1 0 0 0-1 1z" />
              <path d="M9 6a3 3 0 1 0 0-6 3 3 0 0 0 0 6zM7 3a2 2 0 1 1 4 0 2 2 0 0 1-4 0z" />
            </svg>
            <a href="#">PHIM ĐỀ CỬ</a>
          </div>
        </div>

        <div style="margin-top: 10px;" class="col-3">
          <div id="chu-a">Xem tất cả</div><i style="margin-top: 3px;" class="fa-solid fa-film"></i>
        </div>



        <!-- anh phim -->

        <div class="container-film">
          <?php
          echo"<div class='film-body-container'>";
            echo"<div class='box-a'>";
              echo"<div id='film-a' class='film-1'>";
              echo"<a href='http://127.0.0.1:5504/home/home_link.html'>";
              echo"<img class='anh-film-a' src='../images/diadang.png' alt='' >";
              echo"</a>";
              echo"</div>";
              echo"<span class='film-title'>địa đàng sụp đổ</span>";
            echo"</div>";
           
            
              $sql = "SELECT * from tbl_homeindex ORDER BY cate_id DESC" ;
              $result = mysqli_query($conn, $sql);
              if (mysqli_num_rows($result) > 0) {
                  while ($row = mysqli_fetch_assoc($result)) {
                    echo "<div class='box-b'>";
                    echo" <div class='film-a'>";
                    echo"<a href='#'>";
                    echo "<img src='" . $row["intro_img"] . "' alt='' class='anh-film'>";
                echo"</a>";
                echo "</div>";   
                echo "<span class='film-title'>" . $row['cate_name'] . "</span>";
                echo "</div>";

                  }}
                  ?>
                  
            
           
          </div>
        </div>

      </div>
    </div>
    

    <div class="body-film-2">
      <div class="title_1">
        <img style="width: 100%;height: 70px;" src="../images/nen popcorn.jpg" alt="Cinque Terre">
        <div class="center">
          <p>PHIM CHIẾU RẠP</p>
          <div class="topright">
            <img style="width: 100px;height: 100px;" src="../images/popcorn-svgrepo-com (1).svg" alt="">
          </div>
        </div>
      </div>
      <div class="bg-film-2">
        <div style="margin-top: 0;" class="main-container">
          <div class="film-body-container-b">
            <div class="film-b"><img src="../images/f1b.jpg" alt=""><span class="film-title">Ác quỷ ma sơ 2</span></div>
            <div class="film-b"><img src="../images/f3b.jpg" alt=""><span class="film-title">Thiện ác đối đầu 3</span>
            </div>
            <div class="film-b"><img src="../images/f4b.jpg" alt=""><span class="film-title">Nhiệm vụ bất khả thi
                7</span></div>
            <div class="film-b"><img src="../images/f2b.jpg" alt=""><span class="film-title">Bộ đôi báo thù</span></div>
            <div class="film-b"><img src="../images/f5b.jpg" alt=""><span class="film-title">Biệt đội đánh thuê 4</span>
            </div>
            <div class="film-b"><img src="../images/f6b.jpg" alt=""><span class="film-title">Không ai sẽ cứu bạn</span>
            </div>
            <div class="film-b"><img src="../images/f7b.jpg" alt=""><span class="film-title">địa đàng sụp đổ</span>
            </div>
            <div class="film-b"><img src="../images/f8b.jpg" alt=""><span class="film-title">Tay đua cự phách</span>
            </div>
            <div class="film-b"><img src="../images/f9b.jpg" alt=""><span class="film-title">Blue Beetle: bọ hung
                xanh</span></div>
            <div class="film-b"><img src="../images/f10b.jpg" alt=""><span class="film-title">Trừng phạt</span></div>
          </div>
        </div>
      </div>


    </div>
    <!-- ranking -->
    <div class="body-main">
      <div class="main-container">
        <div class="row">
          <div class="col-9">
            <div class="logo">
              <svg style="color: red; margin-top: -15px;" xmlns="http://www.w3.org/2000/svg" width="30" height="30"
                fill="currentColor" class="bi bi-camera-reels" viewBox="0 0 16 16">
                <path d="M6 3a3 3 0 1 1-6 0 3 3 0 0 1 6 0zM1 3a2 2 0 1 0 4 0 2 2 0 0 0-4 0z" />
                <path
                  d="M9 6h.5a2 2 0 0 1 1.983 1.738l3.11-1.382A1 1 0 0 1 16 7.269v7.462a1 1 0 0 1-1.406.913l-3.111-1.382A2 2 0 0 1 9.5 16H2a2 2 0 0 1-2-2V8a2 2 0 0 1 2-2h7zm6 8.73V7.27l-3.5 1.555v4.35l3.5 1.556zM1 8v6a1 1 0 0 0 1 1h7.5a1 1 0 0 0 1-1V8a1 1 0 0 0-1-1H2a1 1 0 0 0-1 1z" />
                <path d="M9 6a3 3 0 1 0 0-6 3 3 0 0 0 0 6zM7 3a2 2 0 1 1 4 0 2 2 0 0 1-4 0z" />
              </svg>
              <a href="#">BẢNG XẾP HẠNG</a>
            </div>
          </div>

          <div class="col-3"></div>
        </div>
      </div>
    </div>
    <!-- ranking -->
    <div style="margin-top: 0;" class="main-container">
      <div class="cate_rank">
        <div class="top-rank">
          <div class="rank">
            <img src="../images/f1b.jpg" alt="">
            <div class="number">1</div>
          </div>
          <div class="rank">
            <img src="../images/f2b.jpg" alt="">
            <div class="number">2</div>
          </div>
          <div class="rank">
            <img src="../images/f3b.jpg" alt="">
            <div class="number">3</div>
          </div>
          <div class="rank">
            <img src="../images/f4b.jpg" alt="">
            <div class="number">4</div>
          </div>
          <div class="rank">
            <img src="../images/f5b.jpg" alt="">
            <div class="number">5</div>
          </div>
        </div>
      </div>
    </div>
   

      <div class="body-film-2">
        <div class="title_1">
          <img style="width: 100%;height: 70px;" src="../images/nen popcorn.jpg" alt="Cinque Terre">
          <div class="center">
            <p>BỘ SƯU TẬP</p>

          </div>
        </div>

        <div class="layout3">
          <div style="margin-top: 0;" class="main-container">
            <div class="film-body-container-e">
              <div class="film-e"><img
                  src="https://s198.imacdn.com/ff/2021/03/08/a0d904ad483598b6_bcaf2bb0f6a9f95a_55737161520379431.jpg"
                  alt=""></div>
              <div class="film-e"><img
                  src="https://s198.imacdn.com/ff/2019/10/26/0c2f054dbbcc519e_f5ea1f644016067e_36993157209593121.jpg"
                  alt="">
              </div>
              <div class="film-e"><img
                  src="https://s198.imacdn.com/ff/2019/10/26/aa4cf62a8a41a8d0_a1bf98941af6ad02_40433157209595111.jpg"
                  alt=""></div>
              <div class="film-e"><img src="https://s198.imacdn.com/ff/2019/10/26/f0de54c9fa04599a_31bb313de0a7d8e2_46641157209606931.jpg
              " alt=""></div>
              <div class="film-e"><img
                  src="https://s198.imacdn.com/ff/2019/10/26/59cd8f092f6dd6fc_3aaacac701101d2a_49148157209609171.jpg"
                  alt="">
              </div>
              <div class="film-e"><img
                  src="https://s198.imacdn.com/ff/2019/10/26/49b4e06978defb37_8c148f128dc8d81e_41562157209621361.jpg"
                  alt="">
              </div>
              <div class="film-e"><img
                  src="	https://s198.imacdn.com/ff/2020/12/21/910d5cd341d55be1_e1c9d72b3465ab77_9058160852063491.jpg"
                  alt="">
              </div>
              <div class="film-e"><img
                  src="https://s198.imacdn.com/ff/2020/04/25/24875423cf93c11c_7d846b3e82c05490_29652158779284741.jpg"
                  alt="">



              </div>
            </div>
          </div>


        </div>








      </div>
</body>

</html>