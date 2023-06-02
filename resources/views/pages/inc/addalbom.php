<?php
if (isset($_POST["addalbom"])) {
    if (isset($_SESSION["user_id"])) {
        if (!isset($_FILES['img']['name'])) {
            echo 'Ошибка загрузки файла';
            echo '<script>console.log("Ошибка загрузки файла")</script>';
        }
        if (isset($_FILES["img"]['name'])) {
            $img = 'image/' . time() . $_FILES['img']['name'];
            $title = $_POST["name"];
            move_uploaded_file($_FILES['img']['tmp_name'], $img);
            $user_id_album = $user['id'];
            $sql_addalobom = "INSERT INTO `album` (author_id,img_src,title) VALUES ('$user_id_album','$img','$title')";
            $link->query($sql_addalobom);
            
            echo '<script>console.log("'.$sql_addalobom.'")</script>';
            echo '<script>document.location.href="?page=catalog"</script>';  
            echo '<script>console.log("файл загружан")</script>';
        }
        else {
            echo '<script>console.log("Пост запрос небыл принят")</script>';
        }
    }
}     
?>
<seciton class="addalbom">
    <div class="back-blur">
        <h1>форма добавления альбома</h1>

        <form method="POST" name="addalbom" class="form-albom" enctype="multipart/form-data">
            <div>
                <label class="button-img-cover" for="img-cover">Добавить обложку</label>
                <input accept=".png, .jpg, .jpeg" type="file" name="img" id="img-cover">
            </div>
            <div>
                <label for="title">Название альбома</label>
                <input type="text" name="name" id="title" placeholder="Название альбома">
            </div>
            <input class="submit_albom" name="addalbom" type="submit" value="Создать альбом">
        </form>
    </div>
</seciton>