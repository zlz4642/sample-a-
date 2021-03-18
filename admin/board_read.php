<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>KIPY Website</title>

  <!-- Bootstrap core CSS -->
  <link href="../css/bootstrap.min.css" rel="stylesheet">

  <!-- Custom styles for this template -->
  <link href="../css/shop-item.css" rel="stylesheet">
  <link href="../css/styles.css" rel="stylesheet" />
  <style>
        .container .full_row {
            min-height: 600px;       
        }
        .board-2 {
          flex: 0 0 16.6666666667%;
          max-width: 16.6666666667%;
          padding: 8px;
          border: 1px dotted gray;
          text-align: center;
        }
        .board-8 {
          flex: 0 0 66.6666666667%;
          max-width: 66.6666666667%;
          padding: 8px;
          border: 1px dotted gray;
          text-align: left;
          background-color: beige;
        }
  </style>
</head>

<body>

  <!-- Navigation -->
    <nav class="navbar navbar-expand-lg bg-secondary text-uppercase fixed-top" id="mainNav">
        <div class="container">
            <a class="navbar-brand js-scroll-trigger" href="/admin/board.php">KIPY</a>
            <button
                class="navbar-toggler navbar-toggler-right text-uppercase font-weight-bold bg-primary text-white rounded"
                type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive"
                aria-expanded="false" aria-label="Toggle navigation">
                Menu
                <i class="fas fa-bars"></i>
            </button>
            <div class="collapse navbar-collapse" id="navbarResponsive">
                <ul class="navbar-nav ml-auto">
                    <li class="nav-item mx-0 mx-lg-1"><a class="nav-link py-3 px-0 px-lg-3 rounded js-scroll-trigger"
                            href="/admin/board.php">게시판</a></li>
                    <li class="nav-item mx-0 mx-lg-1"><a class="nav-link py-3 px-0 px-lg-3 rounded js-scroll-trigger"
                            href="/admin/logout.php">logout</a></li>
                </ul>
            </div>
        </div>
    </nav>

  <!-- Page Content -->
  <div class="container">

    <div class="row">

      <div class="col-lg-3">
        <h1 class="my-4">게시판</h1>
        <div class="list-group">
          <a href="board.php" class="list-group-item active">사내게시판</a>
          <a href="board2.php" class="list-group-item">견적문의게시판</a>
        </div>
      </div>
      <!-- /.col-lg-3 -->

      <div class="col-lg-9">
        <!-- Board_Read -->
        <?php
        require_once("./db_con.php");
        $page = $_GET["page"];
        $Board_content_sql = "SELECT * FROM board WHERE No='$page'";
        $result = $conn->query($Board_content_sql);
        $board_data = $result->fetch_assoc();
    ?>

    <div class="container full_row">
        <h1></h1>
        <br /><br />
        <div class="row">
          <div class="board-2">작성자</div>
          <div class="board-8"><?php echo $board_data['Userid'];?></div>
          <div class="w-100"></div>
          <div class="board-2">제목</div>
          <div class="board-8"><?php echo $board_data['Title'];?></div>
          <div class="w-100"></div>
          <div class="board-2">내용</div>
          <div class="board-8"><?php 
            $c_specialty = str_replace("\r\n", "<br>", $board_data['Content']); 
            echo  $c_specialty; 
            ?></div>
          <div class="w-100"></div>       
          <div class="board-2">등록일</div>
          <div class="board-8"><?php echo $board_data['Date']; ?></div>
          <div class="w-100"></div>
        </div>   
        <div class="row">   
          <blockquote>
              <a href="./user_check_mod.php?page=<?php echo $page;?>" class="btn btn-warning" role="button">수정</a>
              <a href="./user_check_del.php?page=<?php echo $page;?>" class="btn btn-danger" role="button">삭제</a>
              <a href="./board.php" class="btn btn-info" role="button">목록</a> 
          </blockquote>
        </div>
    </div>
    <br><br><br> 
  





      </div>
      <!-- /.col-lg-9 -->

    </div>

  </div>
  <!-- /.container -->



  <!-- Bootstrap core JavaScript -->
    <script src="/js/jquery.min.js"></script>
    <script src="/js/bootstrap.bundle.min.js"></script>

</body>

</html>
