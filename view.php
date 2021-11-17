<?php
         $conn = mysqli_connect("localhost", "root", "123456", "khs_corp");
         if (!$conn) {
             echo 'Connected fail!'. mysqli_connect_error();
         
         } else {
             echo 'Connected successfully';
         }
         // table(msg_board)에서 글을 조회
         // SELECT * FROM 테이블명

         $view_number = $_GET['number'];
         $sql = "SELECT * FROM msg_board WHERE number = $view_number";
         $result = mysqli_query($conn, $sql);
               
    ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>view - khs 게시판</title>
</head>
<body>
    <h1>게시판</h1>
    <h2>글 내용</h2>
    <?php
    if ($row = mysqli_fetch_array($result)) {

    ?>
    <h3>글번호: <?= $row['number'] ?>/ 글쓴이: <?= $row['name'] ?> <h3>
    <div>
        <?= $row['message'] ?>
    </div>
    <?php }
    
        mysqli_close($conn); 
    ?>
    <p><a href="index.php">메인화면으로 돌아가기</a></p>
    <p><a href="update.php?number=<?= $row['number'] ?>">수정하기</a></p>
      
</body>
</html> 