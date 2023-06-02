<?php 
    require ('./connect.php');
    if (isset($_GET)) {
        $albom_id = $_GET["id"];
        $sql_albom = "SELECT * FROM `album` WHERE id='$albom_id'";
        echo '<script>console.log('.$sql_albom.')</script>';
        $result_albom = $link->query($sql_albom);
        $albom = $result_albom->fetch_assoc();
        $json_albom = json_encode($albom, JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES | JSON_NUMERIC_CHECK);

        $response = [
            'success' => true,
            'message' => 'Запрос отправлен успешно'
        ];
        die(json_encode($response));
    } else {
        $response = [
            'success' => false,
            'message' => 'Запрос отклонен',
        ];
        die(json_encode($response));
    }
?>