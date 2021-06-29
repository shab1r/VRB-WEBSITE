<?php
include_once 'php/header.php';

?>


<?php if (isset($_SESSION["useruid"])): ?>

    <div id="voltage_table">
        <label><h4>Voltage / Time</h4></label>
        </br>
        <?php getData($conn); ?>
    </div>
      <main><label><h4>Voltage / Time</h4></label>
        <div id = "main_content">
            <canvas id="chart" style="width:100%;max-width:600px"></canvas>
        </div> 
      </main>
    <script>

        var voltageChart = new Chart("chart", {
            type: "line",
            data: {
                labels: updateXvalues(),
                datasets: [{ 
                data: updateYvalues(),
                borderColor: "green",
                fill: false,
                options: {
                    animation: false
                },}],
            },
            options: {
                legend: {display: false},
                animation: false
            }
        });
        
        var min = 0;
        var sec = 0;
        var milli = 0;

        var min2 = 0;
        var sec2 = 0;
        var milli2 = 0;

        var stoptime1 = true;
        var stoptime2 = true;

        function startTimer1() {
            if (stoptime1 == true) {
                    stoptime1 = false;
                    timerCycle1();
            }
        }
        function stopTimer1() {
        if (stoptime1 == false) {
                stoptime1 = true;
            }
        }

        function startTimer2() {
            if (stoptime2 == true) {
                    stoptime2 = false;
                    timerCycle2();
            }
        }
        function stopTimer2() {
        if (stoptime2 == false) {
                stoptime2 = true;
            }
        }

        function timerCycle1() {
            if (stoptime1 == false) {
                sec = parseInt(sec);
                milli = parseInt(milli);
                min = parseInt(min);

                milli = milli + 1;

                if (milli == 100) {
                    sec = sec + 1;
                    milli = 0;
                }
                if (sec == 60) {
                    min = min + 1;
                    sec = 0;
                    milli = 0;
                }

                if (milli < 10 || milli == 0) {
                    milli = '0' + milli;
                }
                if (min < 10 || min == 0) {
                    min = '0' + min;
                }
                if (sec < 10 || sec == 0) {
                    sec = '0' + sec;
                }
            }
            timer1.innerHTML = min + ':' + sec + ':' + milli;
            //timer2.innerHTML = min + ':' + sec + ':' + milli;
            setTimeout("timerCycle1()", 10);
        }

        function timerCycle2() {
            if (stoptime2 == false) {
                sec = parseInt(sec2);
                milli = parseInt(milli2);
                min = parseInt(min2);

                milli = milli + 1;

                if (milli == 100) {
                    sec = sec + 1;
                    milli = 0;
                }
                if (sec == 60) {
                    min = min + 1;
                    sec = 0;
                    milli = 0;
                }

                if (milli < 10 || milli == 0) {
                    milli = '0' + milli;
                }
                if (min < 10 || min == 0) {
                    min = '0' + min;
                }
                if (sec < 10 || sec == 0) {
                    sec = '0' + sec;
                }
            
                //timer1.innerHTML = min + ':' + sec + ':' + milli;
                timer2.innerHTML = min + ':' + sec + ':' + milli;
                setTimeout("timerCycle2()", 10);
            }
        }

        function resetTimer1() {
            timer1.innerHTML = "00:00:00";
            //timer2.innerHTML = "00:00:00";
            stoptime2 = true;
            hr = 0;
            sec = 0;
            min = 0;
        }

        function resetTimer2() {
            //timer1.innerHTML = "00:00:00";
            timer2.innerHTML = "00:00:00";
            stoptime2 = true;
            hr2 = 0;
            sec = 0;
            min = 0;
        }
    
        function getMeasurment () {
            var x = null
            $.ajax({
                async: false,
                global: false,
                url:"./includes/functions.inc.php",    //the page containing php script
                type: "post",    //request type,
                dataType: 'json',
                data: {type: "voltage"},
                
                success:function(result){
                    x = result
                }
            });
            return x
        }
        
    
        function updateXvalues() {
            var xValues = [];
            var measurementResult = getMeasurment()
                for (var key in measurementResult) {
                    if (measurementResult.hasOwnProperty(key)) {
                            let string = measurementResult[key].date_time;
                            let arrayString = string.split(" ");
                            let time = arrayString[1];
                    
                            arrayString = time.split(":");
                            
                            let minute = arrayString[1];
                            let seconds = arrayString[2];
                            
                            let timeString = String(minute) + ":" + String(seconds);
                    
                            xValues.push(timeString);
                        }
                }
                
            return xValues;
        }
    
        function updateYvalues() {
        
            let yValues = [];
            var measurementResult = getMeasurment()
            for (var key in measurementResult) {
            if (measurementResult.hasOwnProperty(key)) {
                    //xValues .= (key + " -> " + measurementResult[key].measurement);
                    yValues.push(measurementResult[key].measurement);
                }
            }
        
            return yValues;
        }
    
        
        
    </script>
    
    <!-- controls for motor 1 -->
    <div id="content1"> 
      <label for="motor1"><h4>Power Control Motor 1</h4></label>
        <br> 
            <div  class="motor1" action="post">
                <div class="sub_container">
                    <div>
                        <label class="labels" id="label_power" for="input_field">Fractional power</label>
                        <input id="input_field_motor_1" type="number" step="0.01" min="0" max="1" value="1" require placeholder="motor 1" />
                        <span class="validity"></span>
                        <button class="button_motor default_button" id="start_motor_1" onclick="startTimer1()">start motor 1</button>
                        <button class="button_motor default_button" id="stop_motor_1" onclick="stopTimer1()">stop motor 1</button>
                    </div>
                    <div>
                        <label class="labels" id="label_timer" for="timer_output">TIMER</label>
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
            <div class="sub_container">
                <div>
                    <label class="labels" id="label_power"  for="motor_power_input">Fractional power</label>
                    <input id="input_field_motor_2" type="number" step="0.01" min="0" max="1" value="1" require placeholder="motor 2"/>
                    <span class="validity"></span>
                    <button class="button_motor default_button" id="start_motor_2" onclick="startTimer2()">start motor 2</button>
                    <button class="button_motor default_button" id="stop_motor_2" onclick="stopTimer2()">stop motor 2</button>
                </div>
                <div>
                    <label class="labels" id="label_timer"  for="timer_output">TIMER</label>
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
            <button class="button_both_Motors default_button" id="start_both_motors" onclick="startTimer1();startTimer2()">Start Both Motors</button>
            <button class="button_both_Motors default_button" id="stop_both_motors" onclick="stopTimer1();stopTimer2()">Stop Both Motors</button>
            <button class="button_both_Timers default_button" id="reset_both_timers" onclick="restTimer1();restTimer2()">Reset Both Timers</button>
        </div>
    </div>
    
    
    <!-- Information like temperature and voltage of the battery -->
    <div id="content4">
        <label><h4>information</h4></label>
        <br>
        <div class="battery_info">
            <label class="labels" id="label_temp"  for="timer_output">TEMPERATUUR </label>
            <output id="temp_output">20 C</output>
            <br><br>
            
            <label class="labels" id=label_voltage_bat  for="voltage_bat_1_output">voltage 1</label>
            <output id="voltage_bat_1_output">10 V</output>
            <br><br>
            
            <label class="labels" id=label_voltage_bat  for="voltage_bat_2_output">voltage 2</label>
            <output id="voltage_bat_2_output">20 V</output>
        </div>
    </div>
    
    <div id="content5">
        <label><h4>Battery charge voltage</h4></label>
        <br>
        <div class="battery_charge">
            <input id="charge_battery" type="number" step="0.01" min="0" value="1" require placeholder="" />
            <br><br>
            <button class="button_charge_battery default_button" id="charge_battery_button_start" >Start</button>
            <button class="button_charge_battery default_button" id="charge_battery_button_stop" >Stop</button>
            <br><br>
        </div>
    </div>
    
<script>
    const timer1 = document.getElementById('timer_output_1');
    const timer2 = document.getElementById('timer_output_2');


    function addData(chart, label, data) {
        chart.data.labels = label
        chart.data.datasets.forEach((dataset) => {
            dataset.data = data;
        });
        chart.update();
    }
    
    setInterval(() => {
        $("#voltageTable").load("index.php #voltageTable")
        $("#online_status").load("index.php #online_status")
        // voltageChart.data.datasets[0].labels = updateXvalues()
        // voltageChart.data.datasets[0].data = updateYvalues()
        addData(voltageChart, updateXvalues(), updateYvalues())
        voltageChart.update()
    }, 1000);

</script>
<script type="text/javascript" src="../script/main.js"></script>

<?php else : ?>

    <?php 
        header("location: /php/login.php");
    ?>
<?php endif; ?>

<?php
include_once 'php/footer.php'
?>