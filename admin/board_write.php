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
        #overdueWindow {
            text-align: left
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
        <h1 class="my-4"></h1>
        <div class="list-group">
          <a href="board.php" class="list-group-item active">사내게시판</a>
          <a href="board2.php" class="list-group-item">견적문의게시판</a>
        </div>
      </div>
      <!-- /.col-lg-3 -->

      <div class="col-lg-9 full_row">      
      <div class="container">
        <h1></h1>
        
        <div class="row">
            <div class="col-sm-12">
                
                <form action="./board_write_proc.php" method="POST" name="modified-form">
                <div class="form-group">
                  <label style="text-align:left" for="title" class="col-sm-2 control-label">제목</label>
                  <div class="col-sm-12">
                      <input class="form-control" name="title" id="title" maxlength="50" type="text" autofocus placeholder="Title Input" required autocomplete="off" >
                  </div>
               </div>

               <div class="form-group">
                  <label style="text-align:left" for="pw" class="col-sm-2 control-label">내용</label>
                  <div class="col-sm-12">
                      <textarea class="form-control" rows="5" name = "content" id="content" maxlength="500" type="text" placeholder="Content Input" required autocomplete="off"></textarea>
                  </div>
              </div>                
              <div class="form-group">
                  <div class="col-sm-12">
                    <br>
                    <input class="form-control" type="date" id='currentDate' name="date" readonly>
                    <script>document.getElementById('currentDate').value = new Date().toISOString().slice(0,10);</script>
                  </div>
              </div>         
              <div class="form-group">
                <div class="col-sm-12">
                <input type="hidden" name="page" value="">
                    <button type="submit" class="btn btn-info">저장</button>
                </form>
                </div> 
              </div>
            </div> 
          </div>
        </div>
 
    </div>
      <!-- /.col-lg-9 -->

    </div>

  </div>
  <!-- /.container -->

  <!-- Footer -->
  <footer class="py-3 bg-dark">
    <div class="container">
      <p class="m-0 text-center text-white">Copyright &copy; Your Website 2020</p>
    </div>
    <!-- /.container -->
  </footer>

  <!-- Bootstrap core JavaScript -->
    <script src="/js/jquery.min.js"></script>
    <script src="/js/bootstrap.bundle.min.js"></script>

</body>

</html>
