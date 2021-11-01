<?php
require_once('PHPMailer/PHPMailerAutoload.php');
class Mail
{
        public static function sendMail($subject, $body, $address)
        {
                $mail = new PHPMailer();
                $mail->isSMTP();
                $mail->SMTPAuth = true;
                $mail->SMTPSecure = 'tls';
                $mail->Host = 'smtp.gmail.com';
                $mail->Port = '587';
                $mail->isHTML();
                $mail->Username = 'ezworkcompany@gmail.com';
                $mail->Password = 'NgQqKS4LQb&y';
                $mail->SetFrom('ezworkcompany@gmail.com');
                $mail->Subject = $subject;
                $mail->Body = $body;
                $mail->AddAddress($address);

                $mail->Send();
        }
}
