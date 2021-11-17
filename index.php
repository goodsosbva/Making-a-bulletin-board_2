<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>khs 게시판</title>
    <link rel="stylesheet" href="css/style.css">
</head>
<body>

    <ul class="gnb">
        <li><a href="http://goodsosbva.dothome.co.kr/">현성s페이지 가기</a></li>
        <li><a href="#">회원가입</a></li>
        <li><a href="#">로그인</a></li>
    </ul>
    <h1 class="logo">
        <a href="index.php"><img src="img/logo.png" alt="로고">khs 게시판</a>
    </h1>
    <hr>
    <h2 class="g1">
        <a href="#"><img src="img/g0.png" alt="목록">글 목록</a>
    </h2>
    </hr>
    <ul>

    <?php
         $conn = mysqli_connect("localhost", "root", "123456", "khs_corp");
         if (!$conn) {
             echo 'Connected fail!'. mysqli_connect_error();
         
         } else {
         echo '[제목 목록]';
         }
         // table(msg_board)에서 글을 조회
         // SELECT * FROM 테이블명
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
    ?>
    </ul>

    <hr>
        <h3 class="g2">
        <a href="write.php"><img src="img/g1.png" alt="글쓰기">글쓰기</a>
        <!-- <p><a href="write.php">글 쓰기</a></p> -->
        </h3>
    <hr> <!-- 글을 나누는 용도 -->
    <h2 class="g3">
        <a href="#"><img src="img/g2.png" alt="글검색">글 검색</a>
    </h2>
    <form action="search_result.php" method="post">
        <h3>검색할 키워드를 입력하세용!</h3>
        <p>
            <label for="search">키워드:</label>
            <input type="text" id="search" name="skey">
        </p>
        <input type="submit" value="검색">
    </form>
    <hr>
    <h2 class="g4">
        <a href="#"><img src="img/g3.png" alt="글삭제">글 삭제</a>
    </h2>
    <form action="delete.php" method="post">
        <h3>삭제할 메세지 번호를 입력하세용!</h3>
        <p>
            <label for="search">번호:</label>
            <input type="text" id="msgel" name="delnum">
        </p>
        <input type="submit" value="삭제">
    </form>    
</body>
</html>