<?php
$servername = "localhost";
$dbUsername = "root";
$dbPassword = "Babaman12!";
$dbName = "vrb";

// Create connection
$conn = mysqli_connect($servername, $dbUsername, $dbPassword, $dbName);

// Check connection
if (!$conn) {
  die("Connection failed: " . mysqli_connect_error());
}


if($_POST['type'] == "voltage") {
    $sql = "SELECT * FROM (SELECT * FROM measurement order by id DESC LIMIT 6) AS B ORDER BY id ASC;";
    //select * from (select * from tablename order by col1) AS T order by col2
    //select * from (select * from measurement order by id DESC LIMIT 6) AS B ORDER BY id ASC
    $result = mysqli_query($conn, $sql);
    $arrayResult = [];
    $resultArrayObj = new ArrayObject();

    if(mysqli_num_rows($result)> 0){

        while($row = mysqli_fetch_assoc($result)){
            $arrayResult['measurement'] = $row["measurement"];
            $arrayResult['date_time'] = $row["date_time"];
            
            $resultArrayObj->append($arrayResult);   
        }

        $json=json_encode($resultArrayObj,JSON_FORCE_OBJECT);

        echo $json;
    }else{
        echo json_encode(array("data"=>"no data"));
    }
    
}

function getData($conn){
    $sql = "SELECT * FROM measurement AS B ORDER BY id DESC LIMIT 6 ;";
    $result = mysqli_query($conn, $sql);
    $arrayResult = [];
    $resultArrayObj = new ArrayObject();
    echo "<div id='voltage_table'>";
        echo "<table id='voltageTable'>
                <tr>
                    <th>Date/Time</th>
                    <th>Measurement</th>
                </tr>";
        if(mysqli_num_rows($result)> 0){

            while($row = mysqli_fetch_assoc($result)){
                
                $arrayResult['measurement'] = $row["measurement"];
                $arrayResult['date_time'] = $row["date_time"];
                
                $resultArrayObj->append($arrayResult);
                echo "<tr>";
                echo "<td>".
                    $row["date_time"] .
                "</td>"
                ."<td>" 
                    . $row["measurement"] .
                "</td>";
                echo "</tr>";
                // echo "</p>";
                
            }
        echo "</table>";
    echo "</div>";
    $json=json_encode($resultArrayObj,JSON_FORCE_OBJECT);
    echo "<script>var measurementResult = " . $json . ";</script>";

    }else{
        echo "there is no data";
    }
}

function getDeviceStatus($conn){
    $sql = "SELECT status FROM devices where id = 1;";
    $result = mysqli_query($conn, $sql);
    $status = 0;
    if(mysqli_num_rows($result)> 0){
        while($row = mysqli_fetch_assoc($result)){
            $status = $row['status'];
        }
    }

    switch ($status) {
        case 0:
            return "Offline";
        case 1:
            return "Online";
        case 2:
            return "Running";
    }

}

//--------------this to see if the user has put data in all the fields for loging in-----------------
function emptyInputLogin($username, $pwd){
    $result;
    if(empty($username) || empty($pwd)){
        $result = true;
    }else{
        $result = false;
    }
    return $result;
}

//------------------This function takes all the user data and returns all the data -------------------------
function uidExist($conn, $username){
    $sql = "SELECT * FROM users WHERE `usersUid` = '" .$username."';";
    $result = mysqli_query($conn, $sql);
    $arrayResult = [];



    
    // echo "voor de if";
    if(mysqli_num_rows($result)> 0){
        // echo "na de if";
        
        while($row = mysqli_fetch_assoc($result)){
            $arrayResult['usersUid'] = $row["usersUid"];
            $arrayResult['usersPwd'] = $row["usersPwd"];
        }
    }
    return $arrayResult;

}

//---------------this function checks user input and validates it and signs him/her in---------
function loginUser($conn, $username, $pwd){
    $uidExists = uidExist($conn, $username);

    if(empty($uidExists)){
        header("location: /php/login.php?error=wronglogin");
        exit();
        
    }

    $usersPwd = $uidExists["usersPwd"];
    $checkHash = password_verify($pwd, $usersPwd);


    if($checkHash === false){
        header("location: /php/login.php?error=wrongpass");
    }else if($checkHash === true){
        session_start();
        $_SESSION["useruid"]=$uidExists["usersUid"];
        header("location: /index.php");
        
    }
}



?>