<?php

// use PHPMailer\PHPMailer\PHPMailer;

// require_once 'PHPMailer/Exception.php';
// require_once 'PHPMailer/PHPMailer.php';
// require_once 'PHPMailer/SMTP.php';

// $mail = new PHPMailer(true);

if (isset($_POST['submit-from'])) {
    $customerName = htmlspecialchars($_POST['name']);
    $mobileNumber = htmlspecialchars($_POST['phonenumber']);
    $email = htmlspecialchars($_POST['email']);

    // try {
    //     $mail = new PHPMailer;
    //     $mail->isSMTP();
    //     $mail->Host = 'smtp.gmail.com';
    //     $mail->Port = 587;
    //     $mail->SMTPAuth = true;
    //     $mail->Username = 'madworkdeveloper@gmail.com';
    //     $mail->Password = 'oklo toyb yeca iwex';
    //     $mail->SMTPSecure = 'tls';

    //     $mail->setFrom('leads@srikrishnadeveloppers.com', 'Lead From krishepearl Website');

        
    //     $mail->addAddress('leads@madworks.in', 'Lead From krishepearl Website');
     
      
    //     $mail->addReplyTo($_POST["email"], 'Lead From krishepearl Website');
    //     $mail->isHTML(true);
    //     $mail->Subject = "Lead From Srikrishna Developpers Website";
    //     $mail->Body = "Name: $customerName <br> Mobile No: $mobileNumber <br>  Email Id: $email";

    //     $mail->send();
        
    // } catch (Exception $e) {
    //     echo "Email sending failed: " . $mail->ErrorInfo;
    // }

    // mysql database connection 
    // $servername = "localhost";
    // $username = "u468158713_krishipearl";
    // $password = "Krishipearlpass@12345";
    // $database = "u468158713_krishipearl_db";


    $username = "root";
    $password = "";
    $database = "krishi";

    $conn = new mysqli($servername, $username, $password, $database);

    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

  
    $currentDateTime = date("Y-m-d H:i:s");

    $sql = "INSERT INTO `leads`(`Name`, `Email`, `Mobile`, `Date`) VALUES ('$customerName','$email','$mobileNumber','$currentDateTime')";

    if ($conn->query($sql) === TRUE) {
       
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }

    $conn->close();

    // if ($_SERVER["REQUEST_METHOD"] == "POST") {
    //     $api_url = "https://portal-api.clove.build/api/tpi/website/lead";
    //     $api_key = "obKvqUxJC5DiYMcGrCphNvIaNDHVd2f012vPvij7I8c=";

    //     $data = array(
    //         "property" => "Krishe Pearl",
    //         "name" => $_POST["name"],
    //         "email" => $_POST["email"],
    //         "mobileNo" => $_POST["phonenumber"],
    //         "source" => "website",
    //         // "subSource" => "",
    //         // "isOtpVerified" => false,
    //         // "sitevisitDate" => "",
    //         // "type" => "",
    //         // "configuration" => "1BHK",
    //         // "location" => "",
    //         // "budget" => "5L to 10L",
    //         // "facing" => "East",
    //         // "floor" => "1",
    //         // "visitedProject" => "",
    //         // "fundingSource" => "",
    //         // "minSize" => "1230",
    //         // "maxSize" => "3250"

    //     );

    //     $ch = curl_init($api_url);

    //     curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "POST");
    //     curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($data));
    //     curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    //     curl_setopt($ch, CURLOPT_HTTPHEADER, array(
    //         "x-api-key: " . $api_key,
    //         "Content-Type: application/json"
    //     )
    //     );

    //     $response = curl_exec($ch);

    //     if (curl_errno($ch)) {
    //         echo "cURL error: " . curl_error($ch);
    //     }

    //     curl_close($ch);

       
    // } else {
    //     echo "Invalid request method.";
    // }
}


?>
<!DOCTYPE html>
<html lang="en">
<link href="img/pearl-logo.png" rel="icon" />

<body>
   
    <?php
    include 'head.php';
    ?>

    <body>
       
        <?php
        include 'header.php';
        ?>
        <style>
            body {
                background: none;
            }
        </style>

        <body>
            <div style="margin: 0 auto;
             padding: 7rem;
             border-radius: 1rem;text-align: center; 
             margin-top:20px; font-size: 24px;">Thank you..!<br>We
                will Get Back to You soon..!<br><br><button onclick="history.back()"
                    style="padding: 10px 20px; font-size: 18px; background-color:#eab52b; color: white; border: none; border-radius: 5px; cursor: pointer;">Go
                    Back to Home</button></div>

         
            <?php
            include 'footer.php';
            ?>
          

        </body>
    </body>

</html>