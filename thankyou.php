<?php
use PHPMailer\PHPMailer;
use PHPMailer\Exception;

// Include PHPMailer files
require 'PHPMailer/Exception.php';
require 'PHPMailer/PHPMailer.php';
require 'PHPMailer/SMTP.php';

$name = $_POST['name'];
$phone = $_POST['phone'];
$sai = $_POST['mail'];
$message=$_POST['message'];

// Database connection
$conn = new mysqli('localhost', 'root', '', '');
if ($conn->connect_error) {
    die('Connection error: ' . $conn->connect_error);
} else {
    // Prepare and execute database insertion
    $stmt = $conn->prepare('INSERT INTO krishpearl_leads (name, phone, mail, message) VALUES (?, ?, ?)');
    $stmt->bind_param('ssss', $name, $phone, $sai, $message); 
    $stmt->execute();    
    // Close statement and connection
    $stmt->close();
    $conn->close();
}
?>

<!--head-->
 <?php
    include 'head.php';
    ?>

<body>
<!--header-->
 <?php
    include 'header.php';
    ?>

<body>
    <div style="background: white;width: 50%;margin: 0 auto;
             padding: 2rem;box-shadow: 1px 2px 3px 4px #0000005e;
             border-radius: 1rem;text-align: center; 
             margin-top: 50px; font-size: 24px;">Thank you..!<br>We
        will Get Back to You soon..!<br><br><button onclick="history.back()"
            style="padding: 10px 20px; font-size: 18px; background-color:#eab52b; color: white; border: none; border-radius: 5px; cursor: pointer;">Go
            Back to Home</button></div>

    <!-- Footer Start -->
    <?php
    include 'footer.php';
    ?>
    <!-- Footer End -->
    
</body>
</html>