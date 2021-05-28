<?php
include_once 'header.php'
?>

  <main>Main</main>

<!-- controls for motor 1 -->
<div id="content1"> 
  <label for="motor1"><h4>Power Control Motor 1</h4></label>
    <br> 
        <div  class="motor1" action="post">
            <div class=sub_container>
                <div>
                    <label class="labels" id=label_power for="input_field">Fractional power</label>
                    <input id="input_field_motor_1" type="number" step="0.01" min="0" max="1" value="1" require placeholder="motor 1" />
                    <span class="validity"></span>
                    <button class="button_motor default_button" id="start_motor_1" >start motor 1</button>
                    <button class="button_motor default_button" id="stop_motor_1" >stop motor 1</button>
                </div>
                <div>
                    <label class="labels" id=label_timer for="timer_output">TIMER</label>
                    <output id="timer_output_1">00:00:00</output>
                    <button class="button_timer default_button" id="reset_timer_1">reset timer 1</button>
                </div>
            </div>
        </div>
</div>


<!-- controls for motor 2 -->
<div id="content2"> 
    <label for="motor2"><h4>Power Control Motor 2</h4></label>
    <br> 
    <div  class="motor2">
        <div class=sub_container>
            <div>
                <label class="labels" id=label_power  for="motor_power_input">Fractional power</label>
                <input id="input_field_motor_2" type="number" step="0.01" min="0" max="1" value="1" require placeholder="motor 2"/>
                <span class="validity"></span>
                <button class="button_motor default_button" id="start_motor_2">start motor 2</button>
                <button class="button_motor default_button" id="stop_motor_2" >stop motor 2</button>
            </div>
            <div>
                <label class="labels" id=label_timer  for="timer_output">TIMER</label>
                <output id="timer_output_2">00:00:00</output>
                <button class="button_timer default_button" id="reset_timer_1">reset timer 2</button>
            </div>
        </div>
    </div>
</div>

<!-- controls for both motor and timers  -->
<div id="content3">
    <label for="motor1"><h4>Motor & Timer Control</h4></label>
    <br>
    <div >
        <button class="button_both_Motors default_button" id="start_both_motors" >Start Both Motors</button>
        <button class="button_both_Motors default_button" id="stop_both_motors" >Stop Both Motors</button>
        <button class="button_both_Timers default_button" id="reset_both_timers" >Reset Both Timers</button>
    </div>
</div>


<!-- Information like temperature and voltage of the battery -->
<div id="content4">
    <label><h4>information</h4></label>
    <br>
    <div class="battery_info">
        <label class="labels" id=label_temp  for="timer_output">TEMPERATUUR </label>
        <output id="temp_output">20 C</output>
        <br><br>
        
        <label class="labels" id=label_voltage_bat  for="voltage_bat_1_output">voltage 1</label>
        <output id="voltage_bat_1_output">10 V</output>
        <br><br>
        
        <label class="labels" id=label_voltage_bat  for="voltage_bat_2_output">voltage 2</label>
        <output id="voltage_bat_2_output">20 V</output>
    </div>
</div>

<script type="text/javascript" src="../script/main.js"></script>

<?php
include_once 'footer.php'
?>