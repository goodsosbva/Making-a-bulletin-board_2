<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php

    $conn = mysqli_connect("localhost", "root", "123456", "khs_corp");
    if (!$conn) {
        echo 'Connected fail!'. mysqli_connect_error();
    
    } else {
    echo 'Connected successfully';
    }

    $number = $_POST['number'];
    $user_name = $_POST['name'];
    $user_msg = $_POST['message'];

    $sql = "UPDATE msg_board SET name = '$user_name', message = '$user_msg' WHERE number = '$number'"; 
    $result = mysqli_query($conn, $sql);
    
    if ($result === false) {
        echo '수정 못함!';
        error_log(mysqli_error($conn)); // 에러 로그 기록

    } else {
        echo '수정함!';
    }
    

    mysqli_close($conn); 

    print "<hr/><a href='index.php'>메인 화면으로</a>";

    ?>
    
</body>
</html>
