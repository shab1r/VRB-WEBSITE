<?php
include_once 'php/header.php';
?>

<footer>Device status
    <br/>
    <br/>
    <br/><label class="labels" id=label_temp  for="timer_output">Raspberry pi connection status: </label>
        <output id="online_status"><?php echo getDeviceStatus($conn) ?></output>
        <br/><br/><label class="labels" id=label_temp  for="timer_output">Raspberry pi motor 1 status: </label>
        <output id="temp_output">Off</output>
        <br/><br/><label class="labels" id=label_temp  for="timer_output">Raspberry pi motor 2 status: </label>
        <output id="temp_output">Off</output>
</footer>