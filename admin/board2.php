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
          <a href="/admin/board.php" class="list-group-item">사내게시판</a>
          <a href="/admin/board2.php" class="list-group-item active">광고문의게시판</a>
        </div>
      </div>
      <!-- /.col-lg-3 -->

      <div class="col-lg-9">
            <!-- Board_list -->
    <div class="container  full_row">
    <h1></h1><br><br>
    <table class="table table-hover">
        <thead>
            <tr style="font-size:12pt;">
                <th class="text-center">No</th>
                <th class="text-center">title</th>                      
                <th class="text-center">Date Created</th>
            </tr>
        </thead>
        <tbody class="text-center">
        <?php
                require_once("./db_con.php");
                $board_list_sql = "SELECT * FROM Message";
                $total_row_check = $conn->query($board_list_sql);
                $total_row = $total_row_check->num_rows;
    
                if (isset($_GET["page"])){
                    $start = ($_GET["page"]-1) * 10;
                    $page_sql = "SELECT * FROM Message ORDER BY No DESC LIMIT $start, 10";
        
                } else {
                    $page_sql = "SELECT * FROM Message ORDER BY No DESC LIMIT 10";
                }


                $result = $conn->query($page_sql);
                $flag = 1;
                while ($row = $result->fetch_assoc()){                  

                    $st = "white";

                    print "<tr class='$st'>";
                        print "<td>$row[No]</td>";
                        print "<td><a style='color: black;' href='./board_read2.php?page=$row[No]'>$row[Title]</a></td>";                        
                        print "<td>$row[Date]</td>";
                    print "</tr>";
                    $flag++;
                }
                /*
                $page_count = (int)($total_row / 10);
                if ($total_row % 10){ 
                    $page_count++;
                }
                
                $page_count--;
                */

                if (isset($_GET['page'])) { 
                    $page = $_GET['page']; 
                } else $page = 1;

                $page_count = ceil($total_row / 10);

                if (isset($_GET['page'])) { 
                    $page = $_GET['page']; 
                } else $page = 1;
               
                $prev = $page - 1;
                $next = $page + 1;
                ?>
        </tbody>
    </table>
   
    <nav aria-label="페이지">
        <ul class="pagination justify-content-center">

            <li class="page-item <?php if($page <= 1){ echo 'disabled'; } ?>">
                <a class="page-link"
                    href="<?php if($page <= 1){ echo '#'; } else { echo "?page=" . $prev; } ?>">Previous</a>
            </li>


            <?php for($i = 1; $i <= $page_count; $i++ ): ?>
            <li class="page-item <?php if($page == $i) {echo 'active'; } ?>">
                <a class="page-link" href="./board.php?page=<?= $i; ?>"> <?= $i; ?> </a>
            </li>
            <?php endfor; ?>

            <li class="page-item <?php if($page >= $page_count) { echo 'disabled'; } ?>">
                <a class="page-link"
                    href="<?php if($page >= $page_count){ echo '#'; } else {echo "?page=". $next; } ?>">Next</a>
            </li>
        </ul>
    </nav> 
    </div>


      </div>
      <!-- /.col-lg-9 -->

    </div>

  </div>
  <!-- /.container -->


  <!-- Bootstrap core JavaScript -->
    <script src="/js/jquery.min.js"></script>
    <script src="/js/bootstrap.bundle.min.js"></script>
    <script src="/js/scripts.js"></script>           
</body>

</html>
