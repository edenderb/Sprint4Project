<?php
if (isset($_POST['submit'])) {
    if (isset($_POST['fname']) && isset($_POST['email']) &&
        isset($_POST['phone']) &&
        isset($_POST['psw']) && isset($_POST['psw_repeat'])) {

        $fname = $_POST['fname'];
        $email = $_POST['email'];
        $phone = $_POST['phone'];
        $psw = $_POST['psw'];
        $psw_rpt = $_POST['psw_repeat'];

        $host = "localhost";
        $dbUsername = "root";
        $dbPassword = "";
        $dbName = "ShahGhouse";

        $conn = new mysqli($host, $dbUsername, $dbPassword, $dbName);

        if ($conn->connect_error) {
            die('Could not connect to the database.');
        }
        else {
            $Select = "SELECT email FROM AdminRegister WHERE email = ? LIMIT 1";
            $Insert = "INSERT INTO AdminRegister(fname, email, phone, psw, psw_repeat) values(?, ?, ?, ?, ?);";

            $stmt = $conn->prepare($Select);
            $stmt->bind_param("s", $email);
            $stmt->execute();
            $stmt->bind_result($resultEmail);
            $stmt->store_result();
            $stmt->fetch();
            $rnum = $stmt->num_rows;

            if ($rnum == 0) {
                $stmt->close();

                $stmt = $conn->prepare($Insert);
                $stmt->bind_param("ssiss",$fname, $email, $phone, $psw, $psw_rpt);
                if ($stmt->execute()) {
                    echo "New record inserted sucessfully.";

                }
                else {
                    echo $stmt->error;
                }
            }
            else {
                echo "Someone already registers using this email.";
            }
            $stmt->close();
            $conn->close();
        }
    }
    else {
        echo "All field are required.";
        die();
    }
}
else {
    echo "Submit button is not set";
}
?>
<a href="homepage.php"> Home </a>
