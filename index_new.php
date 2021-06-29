<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
  <link rel="stylesheet" type="text/css" href="../css/new_style.css">
  <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.5.0/Chart.min.js"></script>
    
</head>
<body>
<nav class="navbar navbar-inverse">
    <div class="container-fluid">
        <div class="navbar-header">
        <a class="navbar-brand" href="#">Vanadium redox flow battery</a>
        </div>
        <ul class="nav navbar-nav">
        <li class="active"><a href="#">Home</a></li>
        </ul>
    </div>
</nav>
<div class="container-fluid">
        <div class="row">
            <div class="col-sm-5" style="background-color:#373F51;">
                <div class="row">
                    <div class="col-sm-12" style="background-color:#A9BCD0;"></br></br></br></br></br></br></br></br></br></div>
                    <div class="col-sm-12" style="background-color:#D8DBE2;"></br></br></br></br></br></br></br></br></br></div>
                    <div class="col-sm-12" style="background-color:#A9BCD0;"></br></br></br></br></br></br></br></br></br></div>
                    <div class="col-sm-12" style="background-color:#373F51;">
                        <div class="col-sm-6" style="background-color:#58A4B0;">
                            <label for="motor1"><h4>Motor & Timer Control</h4></label></br>
                            <button class="button_both_Motors default_button" id="start_both_motors" >Start Both Motors</button></br></br>
                            <button class="button_both_Motors default_button" id="stop_both_motors" >Stop Both Motors</button></br></br>
                            <button class="button_both_Timers default_button" id="reset_both_timers" >Reset Both Timers</button></br></br></br></br></br>
                        </div>
                        <div class="col-sm-6" style="background-color:#D8DBE2;">
                        <label><h4>Information</h4></label>
                        <div class="battery_info">
                            <label class="labels" id=label_temp  for="timer_output">TEMPERATUUR </label>
                            <output id="temp_output">20 C</output>
                            <label class="labels" id=label_voltage_bat  for="voltage_bat_1_output">Voltage 1</label>
                            <output id="voltage_bat_1_output">10 V</output>
                            <label class="labels" id=label_voltage_bat  for="voltage_bat_2_output">Voltage 2</label>
                            <output id="voltage_bat_2_output">20 V</output></br>
                        </div>
                    </div>
                    </div>
                </div>
            </div>
            
            <div class="col-sm-7" style="background-color:#373F51;">
            </br></br>
            <canvas id="myChart" style="width:100%;max-width:600px"></canvas>
            </br></br></br></br></br></br></br></br></br></br></br>
            </br></br></br></br></br></br></br>
            </br></br></br></br></br></br>
            </br></br>
            </div>
            <script>
                var xValues = [100,200,300,400,500,600,700,800,900,1000];

                new Chart("myChart", {
                type: "line",
                data: {
                    labels: xValues,
                    datasets: [{ 
                    data: [1600,1700,1700,1900,2000,2700,4000,5000,6000,7000],
                    borderColor: "green",
                    fill: false
                    }]
                },
                options: {
                    legend: {display: false}
                }
                });
            </script>
        </div>
    </div>
</div>

</body>
</html>