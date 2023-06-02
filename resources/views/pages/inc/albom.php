<?php
$albom_id = $_GET["id"];
$sql_albom = 'SELECT * FROM `album`, `track` WHERE album.id = '.$albom_id.' AND track.album_id = '.$albom_id.'';
$result_albom = $link->query($sql_albom);
// $albom = $result_albom->fetch_assoc();
$arr_json = [];
while ($albom = $result_albom->fetch_assoc()){
    $json_get_albom = json_encode($albom, JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES | JSON_NUMERIC_CHECK);
    $arr_json[] = $json_get_albom;
    $title = $albom['title'];
    $img_preview = $albom['img_src'];
}
$arr_json_in_js = json_encode($arr_json, JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES | JSON_NUMERIC_CHECK);
// var_dump($arr_json_in_js);
// var_dump($json_get_albom);

?>
<script>
    const jsonPhp = <?= $arr_json_in_js ?>;
    
    const title = '<?= $title ?>';
    const imgPreview = '<?= $img_preview ?>';

</script>
<script src="js/albom.js" defer></script>
<script src="js/player.js" defer></script>

<section class="albom">
    <div class="albom--view">
        <div class="albom--main">
            <div class="cover"></div>
            <div>
                <div>
                    <h1 class="title-albom">DOUBLE TAP</h1>
                    <h2 class="author">GOING QUANTUM & HAYVE</h2>
                </div>
                <div class="cover--img">
                    <img src="image/B03v4lsGaiA.jpg" alt="">
                    <img src="image/F-JcoYh2FuU.jpg" alt="">
                </div>
                <button class="see_release">Прослушать</button>
            </div>
        </div>
    </div>
</section>

<section class="albom--list">
    <div>
        <h2>Трек лист</h2>
        <a href="">Редактировать альбом</a>
    </div>
    <div>
        <ul>
            
        </ul>
    </div>
    <div>
        <a href="?page=addtrack&id=<?= $albom_id ?>" class="add_trek_to_albom"><button><img src="icon/svg/cross_add.svg" alt="">Добавить Трек</button></a>
    </div>
</section>