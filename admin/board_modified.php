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
        #overdueSection {
          
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

      <div class="col-lg-9 full_row">
        
    <!-- Board_Modified -->
    <?php
        require_once("./db_con.php");
        $page = $_GET["page"];
        $Board_content_sql = "SELECT * FROM board WHERE No='$page'";
        $result = $conn->query($Board_content_sql);
        $board_data = $result->fetch_assoc();
    ?>

    <div class="container">
        <h1>사내 게시판</h1><br>
        
        <div class="row">
            <div class="col-sm-4" style="font-size:13pt;">작성자 : <code style="font-family: 'Nanum Gothic', sans-serif;"><?php echo $board_data['Userid'];?></code></div>
        </div>
        
        <div class="row">
            <div class="col-sm-12">
            <p style="font-size:13pt;"> 제목 : <code style="font-family: 'Nanum Gothic', sans-serif;">
              <?php echo $board_data['Title'];?></code></p>
                <form action="./board_modified_write.php" method="POST" name="modified-form">
                <div class="form-group" id="overdueSection" class="col-xs-6 pull-right">
                    <textarea class="form-control" id="overdueSection" name = "content" id="content" placeholder="Modified Content Input" required autocomplete="off"rows="6" ><?php echo $board_data['Content'];?></textarea>               
                </div>
                
                <div class="form-group">
                    <br>
                    <input class="form-control" type="date" id='currentDate' name="date" readonly>
                    <script>document.getElementById('currentDate').value = new Date().toISOString().slice(0,10);</script>
                </div>
            </div>
        </div>
 

        <blockquote>
            <input type="hidden" name="page" value="<?php echo $page; ?>">
                <button type="submit" class="btn btn-info">수정</button>
            </form>
        </blockquote>
    </div>




      </div>
      <!-- /.col-lg-9 -->

    </div>

  </div>
  <!-- /.container -->



  <!-- Bootstrap core JavaScript -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js"></script>

</body>

</html>
