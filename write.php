<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>글쓰기</title>
</head>
<body>
    <h1>글쓰기</h1>
    <form action="insert.php" method="post">
        <p> 
            <!-- 이름을 입력하는 칸 -->
            <label for="name">제목</label>
            <input type="text" id="name" name="name">
        </p>
            <!-- 메세지를 입력하는 칸 -->
            <label for="message">메세지</label>
            <textarea name="message" id="message" cols="30" rows="10"></textarea>
        </p>
        <!-- 전송 버튼 -->
        <input type="submit" value="글쓰기">
    </form>

</body>
</html>