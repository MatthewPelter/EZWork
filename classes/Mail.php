<?php

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

require '../vendor/autoload.php';

class Mail
{
        public static function sendMail($subject, $body, $address)
        {

                $mail = new PHPMailer(true);

                try {
                        //Server settings
                        $mail->isSMTP();                                            //Send using SMTP
                        $mail->Host       = 'smtp.gmail.com';                     //Set the SMTP server to send through
                        $mail->SMTPAuth   = true;                                   //Enable SMTP authentication
                        $mail->Username   = 'ezworkcompany@gmail.com';                     //SMTP username
                        $mail->Password   = 'NgQqKS4LQb&y';                               //SMTP password
                        $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;            //Enable implicit TLS encryption
                        $mail->Port       = 465;                                    //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`

                        // $getEmailSQL = "SELECT email FROM clients WHERE id='$user_id'";
                        // $getEmailResult = mysqli_query($conn, $getEmailSQL);
                        // $fetchRow = mysqli_fetch_assoc($getEmailResult);
                        // $email = $fetchRow['email'];

                        //Recipients
                        $mail->setFrom('ezworkcompany@gmail.com', 'EZ-Work');
                        $mail->addAddress($address);     //Add a recipient
                        //Content

                        $mail->isHTML(true);                                  //Set email format to HTML
                        $mail->Subject = $subject;
                        $mail->Body = $body;

                        $mail->send();
                        echo 'Message has been sent';
                } catch (Exception $e) {
                        echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
                }
        }
}
