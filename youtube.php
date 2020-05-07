<?php
//https://yourdomain.com/youtube.php?v=ODrRiPuUSDU
$id = $_GET['v'];
$dt = file_get_contents("https://www.youtube.com/get_video_info?video_id=$id&el=embedded&ps=default&eurl=&gl=US&hl=en");
$data = urldecode($dt);
$arr = explode('&', $data);
$json = '';
foreach ($arr as $item) {
    $part = explode('=', $item);
    if ($part[0] == 'player_response') {
        array_shift($part);
        $json = implode('=', $part);
    }
}
$json = json_decode($json, true);
echo '<pre>' . print_r($json['streamingData'], true) . '</pre>';
die;
