<?php
// $_POST['phone'] = '01712345678';

// Start the session
session_start();

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "jobsite";
$conn = new mysqli($servername, $username, $password, $dbname);

// send otp
if (isset($_POST['phone'])) {

    // check valid phone number
    function validate_phone_number($phone_number)
    {
        if (preg_match('/(^(01){1}[3456789]{1}(\d){8})$/', $phone_number)) {
            // the format /^[0-9]{11}+$/ will check for phone number with 11 digits and only numbers
            return true;
        } else {
            return false;
        }
    }
    $phone = $_POST['phone'];
    if (validate_phone_number($phone) == false) {
        echo "Invalid phone number!";
        exit;
    }

    // check phone number in db users table 



    $sql = "SELECT * FROM users WHERE phone = '$phone'";
    $result = $conn->query($sql);
    if ($result) {
        if (mysqli_num_rows($result) <= 0) {
            echo 'number not found, please register first!';
            exit;
        }
    } else {
        echo 'error in processing!';
        exit;
    }


    // generate 4 digit OTP


    function generateNumericOTP($n)
    {
        $generator = "1357902468";

        $result = "";

        for ($i = 1; $i <= $n; $i++) {
            $result .= substr($generator, (rand() % (strlen($generator))), 1);
        }

        return $result;
    }


    $otp = generateNumericOTP(4);






    // $data=array('status'=>'ok','msg'=>'OTP has been sent, please confirm OTP');
    // echo json_encode($data);
    // exit();
    //success  


    //set session for phone and OTP value

    // send otp 
    if (isset($phone) && isset($otp)) {
        // metrotel sms api
        $api_key = 'C20011586187c1f6d99aa5.18006622';
        $senderid = '8809612441960';

        $url = "https://portal.metrotel.com.bd/smsapi";
        $data = [
            "api_key" => $api_key,
            "type" => "text",
            "contacts" => $phone,
            "senderid" => $senderid,
            "msg" => "Metro JOb OTP: " . $otp,
        ];
        // $ch = curl_init();
        // curl_setopt($ch, CURLOPT_URL, $url);
        // curl_setopt($ch, CURLOPT_POST, 1);
        // curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
        // curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        // curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
        // $response = curl_exec($ch);
        // curl_close($ch);



        // Set session variables
        $_SESSION["phone"] = $phone;
        $_SESSION["otp"] = '1234';
        // return response.
        echo true;
    } else {
        //failed
        echo "internal server error!.";
    }
}

// verify otp
if (isset($_POST['otp'])) {

    // check valid otp with regex

    function validate_otp($otp)
    {
        if (preg_match('/(^(\d){4})$/', $otp)) {
            return true;
        } else {
            return false;
        }
    }
    $otp = $_POST['otp'];
    if (validate_otp($otp) == false) {
        echo "Invalid otp!";
        exit;
    }

    // check otp  with session
    if ($_POST["otp"] != $_SESSION["otp"]) {
        echo "otp doesn't match";
        exit;
    }
    $phone = $_SESSION['phone'];

    $sql = "SELECT * FROM users WHERE phone = '$phone'";
    $result = $conn->query($sql);
    if ($result) {
        if (mysqli_num_rows($result) <= 0) {
            echo 'number not found, please register first!';
            exit;
        }
    } else {
        echo 'error in processing!';
        exit;
    }

    $data = $result->fetch_assoc();

    $_SESSION['userid'] = $data['userid'];
    $_SESSION['name'] = $data['name'];
    $_SESSION['personflag'] = $data['personflag'];
    $_SESSION['login'] = true;
    echo true;

    unset($_SESSION['phone']);
    unset($_SESSION['otp']);






    // success
    // get user details and set session like phone, id, name etc

    // failed

    // return response

}
