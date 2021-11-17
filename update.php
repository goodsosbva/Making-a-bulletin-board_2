<!-- 데이터베이스에 직접 가져오는 것 -->
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
    <title>글수정하기</title>
</head>
<body>
    <h1>수정하기</h1>
    <?php
    if ($row = mysqli_fetch_array($result)) {

    ?>
    <form action="insert_update.php" method="post">
        <input type="hidden" name="number" value="<?=$view_number?>">
        <p> 
            <!-- 이름을 입력하는 칸 -->
            <label for="name">제목</label>
            <input type="text" id="name" name="name" value="<?= $row['name'] ?>">
        </p>
            <!-- 메세지를 입력하는 칸 -->
            <label for="message">메세지</label>
            <textarea name="message" id="message" cols="30" rows="10"><?= $row['message'] ?></textarea>
        </p>
        <!-- 전송 버튼 -->
        <input type="submit" value="글쓰기">
    </form>
    <?php }
    
        mysqli_close($conn); 
    ?>
</body>
</html>