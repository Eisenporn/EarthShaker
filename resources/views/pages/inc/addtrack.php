<?php
if (isset($_POST["addtrack"])) {
        $album_id = $_GET["id"];
        $title = $_POST["name"];
        if (isset($_FILES["track"]["name"])) {
        $original_filename = $_FILES['track']['name'];
        $target = 'music/'.time().$original_filename;
        $tmp = $_FILES['track']['tmp_name'];
        move_uploaded_file($_FILES['track']['tmp_name'], $target);
        $sql_addtrack = "INSERT INTO `track` (album_id,name_track, music_src) VALUES ('$album_id','$title','$target')";
        $link->query($sql_addtrack);
        echo '<script>console.log("'.$sql_addtrack.'")</script>';
        // echo '<script>document.location.href="?page=catalog"</script>';
    }
    else {
        echo '<script>console.log("Ошибка загрузки треков")</script>';
    }

}
?>

<seciton class="addalbom">
    <div class="back-blur">
        <h1>форма добавления треков в альбом</h1>
        <form method="POST" name="addtrack" class="form-albom" enctype="multipart/form-data">
            <div>
                <label class="btn-track" for="track">Добавить треки</label>
                <input accept=".mp3, .wav" type="file" name="track" id="track">
            </div>
            <div>
                <label for="title">Название трека</label>
                <input type="text" name="name" id="title" placeholder="Название трека">
            </div>
            <input class="submit_albom" name="addtrack" type="submit" value="Создать альбом">
        </form>
    </div>
</seciton>