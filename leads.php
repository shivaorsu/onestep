<?php
$servername = "localhost";
$username = "root";
$password = "";
$database = "krishi";




$conn = new mysqli($servername, $username, $password, $database);


if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}


$correct_username = "skd";
$correct_password = "skd@123";


if (isset($_POST['username']) && isset($_POST['password']) && $_POST['username'] == $correct_username && $_POST['password'] == $correct_password) {

    ?>
    <!DOCTYPE html>
    <html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>LEADS Dashboard</title>
        <link href="img/pearl-logo.png" rel="icon" />
        <style>
            body {
                font-family: Arial, sans-serif;
                margin: 0;
                padding: 0;
                background-color: #f4f4f4;
            }

            .container {
                max-width: 1005px;
                margin: 39px auto;
                padding: 9px background-color: #fff;
                border-radius: 5px;
                box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            }

            h1,
            h2 {
                text-align: center;
                margin-bottom: 20px;
            }

            table {
                width: 100%;
                border-collapse: collapse;
                margin-top: 20px;
            }

            th,
            td {
                padding: 10px;
                border-bottom: 1px solid #ddd;
                text-align: left;
            }

            th {
                background-color: #f2f2f2;
            }

            tr:hover {
                background-color: #f9f9f9;
            }

            form {
                max-width: 300px;
                margin: 0 auto;
                padding: 20px;
                background-color: #fff;
                border-radius: 5px;
                box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            }

            input[type="text"],
            input[type="password"],
            input[type="submit"] {
                width: 100%;
                padding: 10px;
                margin-bottom: 10px;
                border: 1px solid #ccc;
                border-radius: 3px;
                box-sizing: border-box;
            }

            input[type="submit"] {
                background-color: #007bff;
                color: #fff;
                cursor: pointer;
            }

            input[type="submit"]:hover {
                background-color: #0056b3;
            }

            .button {
                width: 100%;
                padding: 10px;
                margin-bottom: 10px;
                border: 1px solid #ccc;
                border-radius: 3px;
                box-sizing: border-box;
            }
        </style>
    </head>

    <body>
        <div class="container">
            <h1>Welcome to LEADS Dashboard</h1>
            <form action="leads.php" method="GET">
                <label for="startfilter">From:</label>
                <input type="date" id="startfilter" name="startfilter" required><br>
                <label for="endfilter">To:</label>
                <input type="date" id="endfilter" name="endfilter" required><br>
                <input type="submit" value="Filter">
            </form>
            <?php
            if (isset($_GET['startfilter']) && !empty($_GET['startfilter']) && isset($_GET['endfilter']) && !empty($_GET['endfilter'])) {
                $start_date = date('Y-m-d', strtotime($_GET['startfilter']));
                echo "<p>Start Date: $start_date</p>";
                $end_date = date('Y-m-d', strtotime($_GET['endfilter']));
                echo "<p>End Date: $end_date</p>";
            }
            ?>
            <table>
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Name</th>
                        <th>Mobile</th>
                        <th>Email</th>
                        <th>Date</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    if (isset($_GET['startfilter']) && !empty($_GET['startfilter']) && isset($_GET['endfilter']) && !empty($_GET['endfilter'])) {
                        $sql = "SELECT id, Name,  Email, Mobile,  Date FROM `leads` WHERE Date BETWEEN '$start_date' and '$end_date'";
                    } else {
                        $sql = "SELECT id, Name,  Email, Mobile,  Date FROM `leads`";
                    }
                    $result = $conn->query($sql);
                    if ($result->num_rows > 0) {
                        while ($row = $result->fetch_assoc()) {
                            echo "<tr>";
                            echo "<td>" . $row['id'] . "</td>";
                            echo "<td>" . $row['Name'] . "</td>";

                            echo "<td>" . $row['Email'] . "</td>";
                            echo "<td>" . $row['Mobile'] . "</td>";

                            echo "<td>" . $row['Date'] . "</td>";
                            echo "</tr>";
                        }


                    } else {
                        echo "<tr><td colspan='7'>No records found</td></tr>";
                    }
                    ?>
                </tbody>
            </table>
            <button class="button" onclick="fnExcelReport();">Download</button>
        </div>
        <script>
            function fnExcelReport() {

            }
        </script>
    </body>

    </html>
    <?php
} else {

    ?>
    <!DOCTYPE html>
    <html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Login</title>
        <style>
            body {
                font-family: Arial, sans-serif;
                margin: 0;
                padding: 0;
                background-color: #f4f4f4;
                display: flex;
                justify-content: center;
                align-items: center;
                height: 100vh;
            }

            form {
                max-width: 300px;
                padding: 20px;
                background-color: #fff;
                border-radius: 5px;
                box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            }

            input[type="text"],
            input[type="password"],
            input[type="submit"] {
                width: 100%;
                padding: 10px;
                margin-bottom: 10px;
                border: 1px solid #ccc;
                border-radius: 3px;
                box-sizing: border-box;
            }

            input[type="submit"] {
                background-color: #007bff;
                color: #fff;
                cursor: pointer;
            }

            input[type="submit"]:hover {
                background-color: #0056b3;
            }
        </style>
    </head>

    <body>
        <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post" style="width: 30%;
    height: 42%;">
            <h2>Krishipearl</h2>
            <label for="username">Username:</label><br>
            <input type="text" id="username" name="username" required><br>
            <label for="password">Password:</label><br>
            <input type="password" id="password" name="password" required><br>
            <input type="submit" value="Login">
        </form>
    </body>

    </html>
    <?php
}
?>