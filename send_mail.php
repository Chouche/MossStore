<?php
ob_start();
session_start();
require_once 'dbconnect.php';

// Import PHPMailer classes into the global namespace
// These must be at the top of your script, not inside a function
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

//Load Composer's autoloader
require 'vendor/autoload.php';

if (isset($_SESSION['user'])) {
    // select logged in users detail
$res = $conn->query("SELECT * FROM users WHERE id=" . $_SESSION['user']);
$userRow = mysqli_fetch_array($res, MYSQLI_ASSOC);


if (isset($_GET['game']))

        $stmt = $conn->prepare("SELECT id, price, steam_key FROM steamkeys WHERE title = ? LIMIT 0, 1");
        
        $stmt->bind_param("s", $_GET['game']);
        $stmt->execute();

        $game = $stmt->get_result();
        $stmt->close();
        $steamkey = mysqli_fetch_array($game, MYSQLI_ASSOC);

        $stmt2 = $conn->prepare("DELETE FROM steamkeys WHERE id= ? ");
        
        $stmt2->bind_param("s", $steamkey['id']);
        $stmt2->execute();

        $game = $stmt2->get_result();
        $stmt2->close();
        



    $mail = new PHPMailer(true);                              // Passing `true` enables exceptions
    try {
        //Server settings
        $mail->SMTPDebug = 1;                               // Enable verbose debug output
        $mail->isSMTP();                                      // Set mailer to use SMTP
        $mail->Host = 'smtp.gmail.com';  // Specify main and backup SMTP servers
        $mail->SMTPAuth = true;                               // Enable SMTP authentication
        $mail->Username = '';                 // SMTP username
        $mail->Password = '';                           // SMTP password
        $mail->SMTPSecure = 'tls';                            // Enable TLS encryption, `ssl` also accepted
        $mail->Port = 587;                                    // TCP port to connect to

        //Recipients
        $mail->setFrom('jerome.hernanez@gmail.com', 'Jerome');
        $mail->addAddress($userRow['email']);     // Add a recipient
        $mail->addAddress('hernandez.jrme@yahoo.com');               // Name is optional
        
        $body = '<p><strong>Hello this is my first email with phpmail</strong></p><br>' . $steamkey['steam_key'] . ".";

        //Content
        $mail->isHTML(true);                                  // Set email format to HTML
        $mail->Subject = 'Here is the subject';
        $mail->Body    = $body;
        $mail->AltBody = strip_tags($body);

        $mail->send();
        echo 'Message has been sent';
    } catch (Exception $e) {
        echo 'Message could not be sent. Mailer Error: ', $mail->ErrorInfo;
    }

    header("Location: mail_sent.php");

}
