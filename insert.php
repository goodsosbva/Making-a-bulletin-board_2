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

    $user_name = $_POST['name'];
    $user_msg = $_POST['message'];

    $sql = "INSERT INTO msg_board (name, message) VALUES ('$user_name', '$user_msg')"; 
    $result = mysqli_query($conn, $sql);
    
    if ($result === false) {
        echo '저장 못함!';
        error_log(mysqli_error($conn)); // 에러 로그 기록

    } else {
        echo '저장함!';
    }
    

    mysqli_close($conn); 

    print "<hr/><a href='index.php'>메인 화면으로</a>";

    ?>
    
</body>
</html>
