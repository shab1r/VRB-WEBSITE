$(document).ready(function() {
  // This function is ment to post data to the api
  function post_func(json_data) {
    $.post("http://95.217.181.53:2000/api", json_data, function(data) {
      console.log(JSON.stringify(data));
    });
  }

  $(
    "#start_motor_1, #stop_motor_1, #start_motor_2, #stop_motor_2, #reset_timer_1, #reset_timer_2, #start_both_motors, #stop_both_motors, #reset_both_timers, #charge_battery_button_start, #charge_battery_button_stop"
  ).click(function() {
    var headtype; 
    var motor_id;
    var timer_id;
    var action;
    var fractional_power;
    var voltage;

    if (this.id == "start_motor_1") {
      headtype = 1;
      motor_id = 1; //motor 1
      action = 1; // power on
      fractional_power = parseFloat($("#input_field_motor_1").val());
      var array_motor_1 = [headtype, motor_id, action, fractional_power];
      var json_data = JSON.stringify({ message: array_motor_1 });
      post_func(json_data);
    } else if (this.id == "stop_motor_1") {
      headtype = 1;
      motor_id = 1; //motor 1
      action = 2; //power off
      fractional_power = 0;
      var array_motor_1 = [headtype, motor_id, action, fractional_power];
      var json_data = JSON.stringify({ message: array_motor_1 });
      post_func(json_data);
    } else if (this.id == "start_motor_2") {
      headtype = 1;
      motor_id = 2; //motor 2
      action = 1; //power on
      fractional_power = parseFloat($("#input_field_motor_2").val());
      var array_motor_2 = [headtype, motor_id, action, fractional_power];
      var json_data = JSON.stringify({ message: array_motor_2 });
      post_func(json_data);
    } else if (this.id == "stop_motor_2") {
      headtype = 1;
      motor_id = 2; //motor 2
      action = 2; //power off
      fractional_power = 0;
      var array_motor_2 = [headtype, motor_id, action, fractional_power];
      var json_data = JSON.stringify({ message: array_motor_2 });
      post_func(json_data);
    } else if (this.id == "start_both_motors") {
      headtype = 1;
      motor_id = 3; //both motors
      action = 1; //power on
      fractional_power = 1;
      fractional_power_motor_1 = parseFloat($("#input_field_motor_1").val());
      fractional_power_motor_2 = parseFloat($("#input_field_motor_2").val());
      var array_both_motor_1 = [headtype, motor_id, action, fractional_power_motor_1];
      var array_both_motor_2 = [headtype, motor_id, action, fractional_power_motor_2];
      var json_data_motor_1 = JSON.stringify({ message: array_both_motor_1 });
      var json_data_motor_2 = JSON.stringify({ message: array_both_motor_2 });
      post_func(json_data_motor_1);
      post_func(json_data_motor_2);
    } else if (this.id == "stop_both_motors") {
      headtype = 1;
      motor_id = 3; //both motors
      action = 2; //power off
      fractional_power = 0;
      var array_both_motor = [headtype, motor_id, action, fractional_power];
      var json_data = JSON.stringify({ message: array_both_motor });
      post_func(json_data);
    } else if (this.id == "reset_timer_1") {
      headtype = 2;
      timer_id = 1; //timer 1
      action = 3; //reset
      var array_timer_1 = [headtype, timer_id, action];
      var f = JSON.stringify({ message: array_timer_1 });
      post_func(f);
    } else if (this.id == "reset_timer_2") {
      headtype = 2;
      timer_id = 2; // timer 2
      action = 3; //3 means reset
      var array_timer_2 = [headtype, timer_id, action];
      var json_data = JSON.stringify({ message: array_timer_2 });
      post_func(json_data);
    } else if (this.id == "reset_both_timers") {
      headtype = 2;
      timer_id = 3; // both timer
      action = 3; //3 means reset
      var array_timer_2 = [headtype, timer_id, action];
      var json_data = JSON.stringify({ message: array_timer_2 });
      post_func(json_data);
    }else if (this.id == "charge_battery_button_start") {
      headtype = 3;
      action = 1; //1 means start
      voltage = parseFloat($("#charge_battery").val());

      var array_charge_voltage_start = [headtype, action, voltage];
      var json_data = JSON.stringify({ message: array_charge_voltage_start });
      post_func(json_data);
    }else if (this.id == "charge_battery_button_stop") {
      headtype = 3;
      action = 2; // 2 means stop
      voltage = 0;

      var array_charge_voltage_stop = [headtype, action, voltage];
      var json_data = JSON.stringify({ message: array_charge_voltage_stop });
      post_func(json_data);
    }
  });
});
