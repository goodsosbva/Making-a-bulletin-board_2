<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>khs 게시판</title>
</head>
<body>
    <h1>게시판</h1>
    <h2>삭제 결과</h2>
    <ul>
    <?php
         $conn = mysqli_connect("localhost", "root", "123456", "khs_corp");
         if (!$conn) {
             echo 'Connected fail!'. mysqli_connect_error();
         
         } else {
         echo 'Connected successfully!';
         }
         // table(msg_board)에서 글을 조회
         // SELECT * FROM 테이블명

         $user_delnum = $_POST['delnum'];
         // 넘버에 해당하는 데이터 삭제
         $sqlDEL = "DELETE FROM msg_board WHERE number = $user_delnum";
         mysqli_query($conn, $sqlDEL);

         $sql = "SELECT * FROM msg_board";
         $result = mysqli_query($conn, $sql);
         $list = '';
        
         // echo 값을 그대로 출력
         // print 도 동일
         // print_r 배열, 객체 모양을 그대로 출력
         // var_dump print_r 보다 더 상세하게 출력
         // print_r($result);
         // $ row 배열 <- 인덱스 번호로 접근할 수 있다는 것.
         while ($row = mysqli_fetch_array($result)) {
            $list = $list."<li>{$row['number']}: <a href=\"view.php?number={$row
            ['number']}\">{$row['name']}</a></li>";
        
         }
         echo $list;

         mysqli_close($conn);
    ?>
    </ul>
    <p>
    <?php
        echo $user_delnum.'번째 데이터가 삭제됨!.';
    ?>
    </p>
    <p><a href="index.php">메인화면으로 돌아가기</a></p> 
</body>
</html>