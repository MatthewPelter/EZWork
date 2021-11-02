<?php
require_once("./classes/DB.php");

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

//Load Composer's autoloader
require 'vendor/autoload.php';

function securityscan($data)
{
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    $data = addslashes($data);
    return $data;
}

if (isset($_POST['resetpassword'])) {
    $cstrong = True;
    $token = bin2hex(openssl_random_pseudo_bytes(64, $cstrong));
    $email = securityscan($_POST['email']);
    $result = mysqli_query($conn, "SELECT id FROM clients WHERE email='$email'");
    $user_id = mysqli_fetch_assoc($result);
    $sql = "INSERT INTO password_tokens(token, user_id) VALUES ('" . sha1($token) . "', '" . $user_id['id'] . "')";
    $setToken = mysqli_query($conn, $sql);
    //Create an instance; passing `true` enables exceptions
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

        //Recipients
        $mail->setFrom('ezworkcompany@gmail.com', 'EZ-Work');
        $mail->addAddress($email);     //Add a recipient
        //Content

        $subject = 'Forgot Password!';
        /*$body = "Hi [name],<br />

        There was a request to change your password!<br />
        
        If you did not make this request then please ignore this email.<br />
        
        Otherwise, please click this link to change your password: <a href='https://ez-work.herokuapp.com/change-password.php?token=$token'>https://ez-work.herokuapp.com/change-password.php?token=$token</a>";*/

        $body = "<!DOCTYPE html>

        <html
          lang="en"
          xmlns:o="urn:schemas-microsoft-com:office:office"
          xmlns:v="urn:schemas-microsoft-com:vml"
        >
          <head>
            <title></title>
            <meta charset="utf-8" />
            <meta content="width=device-width, initial-scale=1.0" name="viewport" />
            <!--[if mso
              ]><xml
                ><o:OfficeDocumentSettings
                  ><o:PixelsPerInch>96</o:PixelsPerInch
                  ><o:AllowPNG /></o:OfficeDocumentSettings></xml
            ><![endif]-->
            <!--[if !mso]><!-->
            <link
              href="https://fonts.googleapis.com/css?family=Open+Sans"
              rel="stylesheet"
              type="text/css"
            />
            <link
              href="https://fonts.googleapis.com/css?family=Cabin"
              rel="stylesheet"
              type="text/css"
            />
            <!--<![endif]-->
            <style>
              * {
                box-sizing: border-box;
              }
        
              body {
                margin: 0;
                padding: 0;
              }
        
              th.column {
                padding: 0;
              }
        
              a[x-apple-data-detectors] {
                color: inherit !important;
                text-decoration: inherit !important;
              }
        
              #MessageViewBody a {
                color: inherit;
                text-decoration: none;
              }
        
              p {
                line-height: inherit;
              }
        
              @media (max-width: 620px) {
                .icons-inner {
                  text-align: center;
                }
        
                .icons-inner td {
                  margin: 0 auto;
                }
        
                .row-content {
                  width: 100% !important;
                }
        
                .image_block img.big {
                  width: auto !important;
                }
        
                .stack .column {
                  width: 100%;
                  display: block;
                }
              }
            </style>
          </head>
          <body
            style="
              background-color: #d9dffa;
              margin: 0;
              padding: 0;
              -webkit-text-size-adjust: none;
              text-size-adjust: none;
            "
          >
            <table
              border="0"
              cellpadding="0"
              cellspacing="0"
              class="nl-container"
              role="presentation"
              style="
                mso-table-lspace: 0pt;
                mso-table-rspace: 0pt;
                background-color: #d9dffa;
              "
              width="100%"
            >
              <tbody>
                <tr>
                  <td>
                    <table
                      align="center"
                      border="0"
                      cellpadding="0"
                      cellspacing="0"
                      class="row row-1"
                      role="presentation"
                      style="
                        mso-table-lspace: 0pt;
                        mso-table-rspace: 0pt;
                        background-color: #cfd6f4;
                      "
                      width="100%"
                    >
                      <tbody>
                        <tr>
                          <td>
                            <table
                              align="center"
                              border="0"
                              cellpadding="0"
                              cellspacing="0"
                              class="row-content stack"
                              role="presentation"
                              style="
                                mso-table-lspace: 0pt;
                                mso-table-rspace: 0pt;
                                color: #000000;
                              "
                              width="600"
                            >
                              <tbody>
                                <tr>
                                  <th
                                    class="column"
                                    style="
                                      mso-table-lspace: 0pt;
                                      mso-table-rspace: 0pt;
                                      font-weight: 400;
                                      text-align: left;
                                      vertical-align: top;
                                      padding-top: 20px;
                                      padding-bottom: 0px;
                                      border-top: 0px;
                                      border-right: 0px;
                                      border-bottom: 0px;
                                      border-left: 0px;
                                    "
                                    width="100%"
                                  >
                                    <table
                                      border="0"
                                      cellpadding="0"
                                      cellspacing="0"
                                      class="image_block"
                                      role="presentation"
                                      style="
                                        mso-table-lspace: 0pt;
                                        mso-table-rspace: 0pt;
                                      "
                                      width="100%"
                                    >
                                      <tr>
                                        <td
                                          style="
                                            width: 100%;
                                            padding-right: 0px;
                                            padding-left: 0px;
                                          "
                                        >
                                          <div align="center" style="line-height: 10px">
                                            <img
                                              alt="Card Header with Border and Shadow Animated"
                                              class="big"
                                              src="logo/animated_header.gif"
                                              style="
                                                display: block;
                                                height: auto;
                                                border: 0;
                                                width: 600px;
                                                max-width: 100%;
                                              "
                                              title="Card Header with Border and Shadow Animated"
                                              width="600"
                                            />
                                          </div>
                                        </td>
                                      </tr>
                                    </table>
                                  </th>
                                </tr>
                              </tbody>
                            </table>
                          </td>
                        </tr>
                      </tbody>
                    </table>
                    <table
                      align="center"
                      border="0"
                      cellpadding="0"
                      cellspacing="0"
                      class="row row-2"
                      role="presentation"
                      style="
                        mso-table-lspace: 0pt;
                        mso-table-rspace: 0pt;
                        background-color: #d9dffa;
                        background-image: url('logo/body_background_2.png');
                        background-position: top center;
                        background-repeat: repeat;
                      "
                      width="100%"
                    >
                      <tbody>
                        <tr>
                          <td>
                            <table
                              align="center"
                              border="0"
                              cellpadding="0"
                              cellspacing="0"
                              class="row-content stack"
                              role="presentation"
                              style="
                                mso-table-lspace: 0pt;
                                mso-table-rspace: 0pt;
                                color: #000000;
                              "
                              width="600"
                            >
                              <tbody>
                                <tr>
                                  <th
                                    class="column"
                                    style="
                                      mso-table-lspace: 0pt;
                                      mso-table-rspace: 0pt;
                                      font-weight: 400;
                                      text-align: left;
                                      vertical-align: top;
                                      padding-left: 50px;
                                      padding-right: 50px;
                                      padding-top: 15px;
                                      padding-bottom: 15px;
                                      border-top: 0px;
                                      border-right: 0px;
                                      border-bottom: 0px;
                                      border-left: 0px;
                                    "
                                    width="100%"
                                  >
                                    <table
                                      border="0"
                                      cellpadding="10"
                                      cellspacing="0"
                                      class="text_block"
                                      role="presentation"
                                      style="
                                        mso-table-lspace: 0pt;
                                        mso-table-rspace: 0pt;
                                        word-break: break-word;
                                      "
                                      width="100%"
                                    >
                                      <tr>
                                        <td>
                                          <div style="font-family: sans-serif">
                                            <div
                                              style="
                                                font-size: 14px;
                                                mso-line-height-alt: 16.8px;
                                                color: #506bec;
                                                line-height: 1.2;
                                                font-family: Helvetica Neue, Helvetica,
                                                  Arial, sans-serif;
                                              "
                                            >
                                              <p style="margin: 0; font-size: 14px">
                                                <strong
                                                  ><span style="font-size: 38px"
                                                    >Forgot your password?</span
                                                  ></strong
                                                >
                                              </p>
                                            </div>
                                          </div>
                                        </td>
                                      </tr>
                                    </table>
                                    <table
                                      border="0"
                                      cellpadding="10"
                                      cellspacing="0"
                                      class="text_block"
                                      role="presentation"
                                      style="
                                        mso-table-lspace: 0pt;
                                        mso-table-rspace: 0pt;
                                        word-break: break-word;
                                      "
                                      width="100%"
                                    >
                                      <tr>
                                        <td>
                                          <div style="font-family: sans-serif">
                                            <div
                                              style="
                                                font-size: 14px;
                                                mso-line-height-alt: 16.8px;
                                                color: #40507a;
                                                line-height: 1.2;
                                                font-family: Helvetica Neue, Helvetica,
                                                  Arial, sans-serif;
                                              "
                                            >
                                              <p style="margin: 0; font-size: 14px">
                                                <span style="font-size: 16px"
                                                  >Hey, we received a request to reset
                                                  your password.</span
                                                >
                                              </p>
                                            </div>
                                          </div>
                                        </td>
                                      </tr>
                                    </table>
                                    <table
                                      border="0"
                                      cellpadding="10"
                                      cellspacing="0"
                                      class="text_block"
                                      role="presentation"
                                      style="
                                        mso-table-lspace: 0pt;
                                        mso-table-rspace: 0pt;
                                        word-break: break-word;
                                      "
                                      width="100%"
                                    >
                                      <tr>
                                        <td>
                                          <div style="font-family: sans-serif">
                                            <div
                                              style="
                                                font-size: 14px;
                                                mso-line-height-alt: 16.8px;
                                                color: #40507a;
                                                line-height: 1.2;
                                                font-family: Helvetica Neue, Helvetica,
                                                  Arial, sans-serif;
                                              "
                                            >
                                              <p style="margin: 0; font-size: 14px">
                                                <span style="font-size: 16px"
                                                  >Let’s get you a new one!</span
                                                >
                                              </p>
                                            </div>
                                          </div>
                                        </td>
                                      </tr>
                                    </table>
                                    <table
                                      border="0"
                                      cellpadding="0"
                                      cellspacing="0"
                                      class="button_block"
                                      role="presentation"
                                      style="
                                        mso-table-lspace: 0pt;
                                        mso-table-rspace: 0pt;
                                      "
                                      width="100%"
                                    >
                                      <tr>
                                        <td
                                          style="
                                            padding-bottom: 20px;
                                            padding-left: 10px;
                                            padding-right: 10px;
                                            padding-top: 20px;
                                            text-align: left;
                                          "
                                        >
                                          <!--[if mso]><v:roundrect xmlns:v="urn:schemas-microsoft-com:vml" xmlns:w="urn:schemas-microsoft-com:office:word" href="http://www.example.com/" style="height:48px;width:212px;v-text-anchor:middle;" arcsize="34%" stroke="false" fillcolor="#506bec"><w:anchorlock/><v:textbox inset="5px,0px,0px,0px"><center style="color:#ffffff; font-family:Arial, sans-serif; font-size:15px"><!
                                          [endif]--><a
                                            href="https://ez-work.herokuapp.com/change-password.php?token=<?php echo $token; ?>"
                                            style="
                                              text-decoration: none;
                                              display: inline-block;
                                              color: #ffffff;
                                              background-color: #506bec;
                                              border-radius: 16px;
                                              width: auto;
                                              border-top: 0px solid TRANSPARENT;
                                              border-right: 0px solid TRANSPARENT;
                                              border-bottom: 0px solid TRANSPARENT;
                                              border-left: 0px solid TRANSPARENT;
                                              padding-top: 8px;
                                              padding-bottom: 8px;
                                              font-family: Helvetica Neue, Helvetica,
                                                Arial, sans-serif;
                                              text-align: center;
                                              mso-border-alt: none;
                                              word-break: keep-all;
                                            "
                                            target="_blank"
                                            ><span
                                              style="
                                                padding-left: 25px;
                                                padding-right: 20px;
                                                font-size: 15px;
                                                display: inline-block;
                                                letter-spacing: normal;
                                              "
                                              ><span
                                                style="
                                                  font-size: 16px;
                                                  line-height: 2;
                                                  word-break: break-word;
                                                  mso-line-height-alt: 32px;
                                                "
                                                ><span
                                                  data-mce-style="font-size: 15px; line-height: 30px;"
                                                  style="
                                                    font-size: 15px;
                                                    line-height: 30px;
                                                  "
                                                  ><strong
                                                    >RESET MY PASSWORD</strong
                                                  ></span
                                                ></span
                                              ></span
                                            ></a
                                          >
                                          <!--[if mso]></center></v:textbox></v:roundrect><![endif]-->
                                        </td>
                                      </tr>
                                    </table>
                                    <table
                                      border="0"
                                      cellpadding="10"
                                      cellspacing="0"
                                      class="text_block"
                                      role="presentation"
                                      style="
                                        mso-table-lspace: 0pt;
                                        mso-table-rspace: 0pt;
                                        word-break: break-word;
                                      "
                                      width="100%"
                                    >
                                      <tr>
                                        <td>
                                          <div style="font-family: sans-serif">
                                            <div
                                              style="
                                                font-size: 14px;
                                                mso-line-height-alt: 16.8px;
                                                color: #40507a;
                                                line-height: 1.2;
                                                font-family: Helvetica Neue, Helvetica,
                                                  Arial, sans-serif;
                                              "
                                            >
                                              <p style="margin: 0; font-size: 14px">
                                                <span style="font-size: 14px"
                                                  >Having trouble?
                                                  <a
                                                    href="https://ez-work.herokuapp.com/"
                                                    rel="noopener"
                                                    style="
                                                      text-decoration: none;
                                                      color: #40507a;
                                                    "
                                                    target="_blank"
                                                    title="@socialaccount"
                                                    ><strong>@ez-work</strong></a
                                                  ></span
                                                >
                                              </p>
                                            </div>
                                          </div>
                                        </td>
                                      </tr>
                                    </table>
                                    <table
                                      border="0"
                                      cellpadding="10"
                                      cellspacing="0"
                                      class="text_block"
                                      role="presentation"
                                      style="
                                        mso-table-lspace: 0pt;
                                        mso-table-rspace: 0pt;
                                        word-break: break-word;
                                      "
                                      width="100%"
                                    >
                                      <tr>
                                        <td>
                                          <div style="font-family: sans-serif">
                                            <div
                                              style="
                                                font-size: 14px;
                                                mso-line-height-alt: 16.8px;
                                                color: #40507a;
                                                line-height: 1.2;
                                                font-family: Helvetica Neue, Helvetica,
                                                  Arial, sans-serif;
                                              "
                                            >
                                              <p style="margin: 0; font-size: 14px">
                                                Didn’t request a password reset? You can
                                                ignore this message.
                                              </p>
                                            </div>
                                          </div>
                                        </td>
                                      </tr>
                                    </table>
                                  </th>
                                </tr>
                              </tbody>
                            </table>
                          </td>
                        </tr>
                      </tbody>
                    </table>
                    <table
                      align="center"
                      border="0"
                      cellpadding="0"
                      cellspacing="0"
                      class="row row-3"
                      role="presentation"
                      style="mso-table-lspace: 0pt; mso-table-rspace: 0pt"
                      width="100%"
                    >
                      <tbody>
                        <tr>
                          <td>
                            <table
                              align="center"
                              border="0"
                              cellpadding="0"
                              cellspacing="0"
                              class="row-content stack"
                              role="presentation"
                              style="
                                mso-table-lspace: 0pt;
                                mso-table-rspace: 0pt;
                                color: #000000;
                              "
                              width="600"
                            >
                              <tbody>
                                <tr>
                                  <th
                                    class="column"
                                    style="
                                      mso-table-lspace: 0pt;
                                      mso-table-rspace: 0pt;
                                      font-weight: 400;
                                      text-align: left;
                                      vertical-align: top;
                                      padding-top: 0px;
                                      padding-bottom: 5px;
                                      border-top: 0px;
                                      border-right: 0px;
                                      border-bottom: 0px;
                                      border-left: 0px;
                                    "
                                    width="100%"
                                  >
                                    <table
                                      border="0"
                                      cellpadding="0"
                                      cellspacing="0"
                                      class="image_block"
                                      role="presentation"
                                      style="
                                        mso-table-lspace: 0pt;
                                        mso-table-rspace: 0pt;
                                      "
                                      width="100%"
                                    >
                                      <tr>
                                        <td
                                          style="
                                            width: 100%;
                                            padding-right: 0px;
                                            padding-left: 0px;
                                          "
                                        >
                                          <div align="center" style="line-height: 10px">
                                            <img
                                              alt="Card Bottom with Border and Shadow Image"
                                              class="big"
                                              src="logo/bottom_img.png"
                                              style="
                                                display: block;
                                                height: auto;
                                                border: 0;
                                                width: 600px;
                                                max-width: 100%;
                                              "
                                              title="Card Bottom with Border and Shadow Image"
                                              width="600"
                                            />
                                          </div>
                                        </td>
                                      </tr>
                                    </table>
                                  </th>
                                </tr>
                              </tbody>
                            </table>
                          </td>
                        </tr>
                      </tbody>
                    </table>
                    <table
                      align="center"
                      border="0"
                      cellpadding="0"
                      cellspacing="0"
                      class="row row-4"
                      role="presentation"
                      style="mso-table-lspace: 0pt; mso-table-rspace: 0pt"
                      width="100%"
                    >
                      <tbody>
                        <tr>
                          <td>
                            <table
                              align="center"
                              border="0"
                              cellpadding="0"
                              cellspacing="0"
                              class="row-content stack"
                              role="presentation"
                              style="
                                mso-table-lspace: 0pt;
                                mso-table-rspace: 0pt;
                                color: #000000;
                              "
                              width="600"
                            >
                              <tbody>
                                <tr>
                                  <th
                                    class="column"
                                    style="
                                      mso-table-lspace: 0pt;
                                      mso-table-rspace: 0pt;
                                      font-weight: 400;
                                      text-align: left;
                                      vertical-align: top;
                                      padding-left: 10px;
                                      padding-right: 10px;
                                      padding-top: 10px;
                                      padding-bottom: 20px;
                                      border-top: 0px;
                                      border-right: 0px;
                                      border-bottom: 0px;
                                      border-left: 0px;
                                    "
                                    width="100%"
                                  >
                                    <table
                                      border="0"
                                      cellpadding="10"
                                      cellspacing="0"
                                      class="image_block"
                                      role="presentation"
                                      style="
                                        mso-table-lspace: 0pt;
                                        mso-table-rspace: 0pt;
                                      "
                                      width="100%"
                                    >
                                      <tr>
                                        <td>
                                          <div align="center" style="line-height: 10px">
                                            <a
                                              href="https://ez-work.herokuapp.com/"
                                              style="outline: none"
                                              tabindex="-1"
                                              target="_blank"
                                              ><img
                                                alt="Your Logo"
                                                src="logo/logo.svg"
                                                style="
                                                  display: block;
                                                  height: auto;
                                                  border: 0;
                                                  width: 145px;
                                                  max-width: 100%;
                                                "
                                                title="Your Logo"
                                                width="145"
                                            /></a>
                                          </div>
                                        </td>
                                      </tr>
                                    </table>
                                    <table
                                      border="0"
                                      cellpadding="10"
                                      cellspacing="0"
                                      class="social_block"
                                      role="presentation"
                                      style="
                                        mso-table-lspace: 0pt;
                                        mso-table-rspace: 0pt;
                                      "
                                      width="100%"
                                    >
                                      <tr>
                                        <td>
                                          <table
                                            align="center"
                                            border="0"
                                            cellpadding="0"
                                            cellspacing="0"
                                            class="social-table"
                                            role="presentation"
                                            style="
                                              mso-table-lspace: 0pt;
                                              mso-table-rspace: 0pt;
                                            "
                                            width="72px"
                                          >
                                            <tr>
                                              <td style="padding: 0 2px 0 2px">
                                                <a
                                                  href="https://www.instagram.com/"
                                                  target="_blank"
                                                  ><img
                                                    alt="Instagram"
                                                    height="32"
                                                    src="logo/instagram2x.png"
                                                    style="
                                                      display: block;
                                                      height: auto;
                                                      border: 0;
                                                    "
                                                    title="instagram"
                                                    width="32"
                                                /></a>
                                              </td>
                                              <td style="padding: 0 2px 0 2px">
                                                <a
                                                  href="https://www.twitter.com/"
                                                  target="_blank"
                                                  ><img
                                                    alt="Twitter"
                                                    height="32"
                                                    src="logo/twitter2x.png"
                                                    style="
                                                      display: block;
                                                      height: auto;
                                                      border: 0;
                                                    "
                                                    title="twitter"
                                                    width="32"
                                                /></a>
                                              </td>
                                            </tr>
                                          </table>
                                        </td>
                                      </tr>
                                    </table>
                                    <table
                                      border="0"
                                      cellpadding="10"
                                      cellspacing="0"
                                      class="text_block"
                                      role="presentation"
                                      style="
                                        mso-table-lspace: 0pt;
                                        mso-table-rspace: 0pt;
                                        word-break: break-word;
                                      "
                                      width="100%"
                                    >
                                      <tr>
                                        <td>
                                          <div style="font-family: sans-serif">
                                            <div
                                              style="
                                                font-size: 14px;
                                                mso-line-height-alt: 16.8px;
                                                color: #97a2da;
                                                line-height: 1.2;
                                                font-family: Helvetica Neue, Helvetica,
                                                  Arial, sans-serif;
                                              "
                                            >
                                              <p
                                                style="
                                                  margin: 0;
                                                  font-size: 14px;
                                                  text-align: center;
                                                "
                                              >
                                                +(123) 456–7890
                                              </p>
                                            </div>
                                          </div>
                                        </td>
                                      </tr>
                                    </table>
                                    <table
                                      border="0"
                                      cellpadding="10"
                                      cellspacing="0"
                                      class="text_block"
                                      role="presentation"
                                      style="
                                        mso-table-lspace: 0pt;
                                        mso-table-rspace: 0pt;
                                        word-break: break-word;
                                      "
                                      width="100%"
                                    >
                                      <tr>
                                        <td>
                                          <div style="font-family: sans-serif">
                                            <div
                                              style="
                                                font-size: 14px;
                                                mso-line-height-alt: 16.8px;
                                                color: #97a2da;
                                                line-height: 1.2;
                                                font-family: Helvetica Neue, Helvetica,
                                                  Arial, sans-serif;
                                              "
                                            >
                                              <p
                                                style="
                                                  margin: 0;
                                                  font-size: 14px;
                                                  text-align: center;
                                                "
                                              >
                                                This link will expire in the next 24
                                                hours.<br />Please feel free to contact
                                                us at ezworkcompany@gmail.com.
                                              </p>
                                            </div>
                                          </div>
                                        </td>
                                      </tr>
                                    </table>
                                    <table
                                      border="0"
                                      cellpadding="10"
                                      cellspacing="0"
                                      class="text_block"
                                      role="presentation"
                                      style="
                                        mso-table-lspace: 0pt;
                                        mso-table-rspace: 0pt;
                                        word-break: break-word;
                                      "
                                      width="100%"
                                    >
                                      <tr>
                                        <td>
                                          <div style="font-family: sans-serif">
                                            <div
                                              style="
                                                font-size: 14px;
                                                mso-line-height-alt: 16.8px;
                                                color: #97a2da;
                                                line-height: 1.2;
                                                font-family: Helvetica Neue, Helvetica,
                                                  Arial, sans-serif;
                                              "
                                            >
                                              <p
                                                style="
                                                  margin: 0;
                                                  text-align: center;
                                                  font-size: 12px;
                                                "
                                              >
                                                <span style="font-size: 12px"
                                                  >Copyright© 2021 EZ-Work.</span
                                                >
                                              </p>
                                              <p
                                                id="m_8010100107078456808text01"
                                                style="
                                                  margin: 0;
                                                  text-align: center;
                                                  font-size: 12px;
                                                "
                                              >
                                                <span style="font-size: 12px"
                                                  ><a
                                                    href="http://www.example.com/"
                                                    rel="noopener"
                                                    style="
                                                      text-decoration: underline;
                                                      color: #97a2da;
                                                    "
                                                    target="_blank"
                                                    title="Unsubscribe "
                                                    >Unsubscribe</a
                                                  >
                                                  | <a
                                                    href="http://www.example.com/"
                                                    rel="noopener"
                                                    style="
                                                      text-decoration: underline;
                                                      color: #97a2da;
                                                    "
                                                    target="_blank"
                                                    title="Manage your preferences"
                                                    >Manage your preferences</a
                                                  > | <a
                                                    href="http://www.example.com/"
                                                    rel="noopener"
                                                    style="
                                                      text-decoration: underline;
                                                      color: #97a2da;
                                                    "
                                                    target="_blank"
                                                    title="Privacy Policy"
                                                    >Privacy Policy</a
                                                  ></span
                                                >
                                              </p>
                                            </div>
                                          </div>
                                        </td>
                                      </tr>
                                    </table>
                                  </th>
                                </tr>
                              </tbody>
                            </table>
                          </td>
                        </tr>
                      </tbody>
                    </table>
                    <table
                      align="center"
                      border="0"
                      cellpadding="0"
                      cellspacing="0"
                      class="row row-5"
                      role="presentation"
                      style="mso-table-lspace: 0pt; mso-table-rspace: 0pt"
                      width="100%"
                    >
                      <tbody>
                        <tr>
                          <td>
                            <table
                              align="center"
                              border="0"
                              cellpadding="0"
                              cellspacing="0"
                              class="row-content stack"
                              role="presentation"
                              style="
                                mso-table-lspace: 0pt;
                                mso-table-rspace: 0pt;
                                color: #000000;
                              "
                              width="600"
                            >
                              <tbody>
                                <tr>
                                  <th
                                    class="column"
                                    style="
                                      mso-table-lspace: 0pt;
                                      mso-table-rspace: 0pt;
                                      font-weight: 400;
                                      text-align: left;
                                      vertical-align: top;
                                      padding-top: 5px;
                                      padding-bottom: 5px;
                                      border-top: 0px;
                                      border-right: 0px;
                                      border-bottom: 0px;
                                      border-left: 0px;
                                    "
                                    width="100%"
                                  >
                                    <table
                                      border="0"
                                      cellpadding="0"
                                      cellspacing="0"
                                      class="icons_block"
                                      role="presentation"
                                      style="
                                        mso-table-lspace: 0pt;
                                        mso-table-rspace: 0pt;
                                      "
                                      width="100%"
                                    >
                                      <tr>
                                        <td
                                          style="
                                            color: #9d9d9d;
                                            font-family: inherit;
                                            font-size: 15px;
                                            padding-bottom: 5px;
                                            padding-top: 5px;
                                            text-align: center;
                                          "
                                        >
                                          <table
                                            cellpadding="0"
                                            cellspacing="0"
                                            role="presentation"
                                            style="
                                              mso-table-lspace: 0pt;
                                              mso-table-rspace: 0pt;
                                            "
                                            width="100%"
                                          >
                                            <tr>
                                              <td style="text-align: center">
                                                <!--[if vml]><table align="left" cellpadding="0" cellspacing="0" role="presentation" style="display:inline-block;padding-left:0px;padding-right:0px;mso-table-lspace: 0pt;mso-table-rspace: 0pt;"><![endif]-->
                                                <!--[if !vml]><!-->
                                                <table
                                                  cellpadding="0"
                                                  cellspacing="0"
                                                  class="icons-inner"
                                                  role="presentation"
                                                  style="
                                                    mso-table-lspace: 0pt;
                                                    mso-table-rspace: 0pt;
                                                    display: inline-block;
                                                    margin-right: -4px;
                                                    padding-left: 0px;
                                                    padding-right: 0px;
                                                  "
                                                >
                                                  <!--<![endif]-->
                                                </table>
                                              </td>
                                            </tr>
                                          </table>
                                        </td>
                                      </tr>
                                    </table>
                                  </th>
                                </tr>
                              </tbody>
                            </table>
                          </td>
                        </tr>
                      </tbody>
                    </table>
                  </td>
                </tr>
              </tbody>
            </table>
            <!-- End -->
          </body>
        </html>
        "

        $mail->isHTML(true);                                  //Set email format to HTML
        $mail->Subject = $subject;
        $mail->Body = $body;

        $mail->send();
        echo 'Message has been sent';
    } catch (Exception $e) {
        echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
    }


    //header("Location: ./login/index");
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link href="https://fonts.googleapis.com/css2?family=Montserrat&display=swap" rel="stylesheet" />

    <title>Forgot Password?</title>

    <style type="text/css">
        body {
            margin: 0;
            font-family: "Montserrat", sans-serif;
        }

        h1 {
            font-weight: 300;
            letter-spacing: 2px;
            font-size: 48px;
        }

        h2 {
            font-weight: 300;
        }

        h3 {
            font-weight: 300;
        }

        p {
            letter-spacing: 1px;
            font-size: 14px;
            color: #333333;
        }

        .btn {
            background: linear-gradient(60deg,
                    rgba(0, 172, 193, 1) 0%,
                    rgba(84, 58, 183, 1) 100%);
            color: white;
            padding: 20px 60px;
            text-decoration: none;
            border-radius: 10%;
            box-shadow: rgba(0, 0, 0, 0.2) 0px 2px 14px;
        }

        .btn a {
            background: linear-gradient(60deg,
                    rgba(0, 172, 193, 1) 0%,
                    rgba(84, 58, 183, 1) 100%);
            color: white;
            padding: 20px 60px;
            text-decoration: none;
            border-radius: 10%;
            box-shadow: rgba(0, 0, 0, 0.2) 0px 2px 14px;
        }

        .header {
            position: relative;
            text-align: center;
            background: linear-gradient(60deg,
                    rgba(84, 58, 183, 1) 0%,
                    rgba(0, 172, 193, 1) 100%);
            color: white;
        }

        .logo {
            width: 50px;
            fill: white;
            padding-right: 15px;
            display: inline-block;
            vertical-align: middle;
        }

        .inner-header {
            height: 65vh;
            width: 100%;
            margin: 0;
            padding: 0;
            position: relative;
            line-height: 2rem;
        }

        .textBox {
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
        }

        .flex {
            /*Flexbox for containers*/
            display: flex;
            justify-content: center;
            align-items: center;
            text-align: center;
        }

        .waves {
            position: relative;
            width: 100%;
            height: 15vh;
            margin-bottom: -7px;
            /*Fix for safari gap*/
            min-height: 100px;
            max-height: 150px;
        }

        .content {
            position: relative;
            height: 20vh;
            text-align: center;
            background-color: white;
        }

        /* Animation */

        .parallax>use {
            animation: move-forever 25s cubic-bezier(0.55, 0.5, 0.45, 0.5) infinite;
        }

        .parallax>use:nth-child(1) {
            animation-delay: -2s;
            animation-duration: 7s;
        }

        .parallax>use:nth-child(2) {
            animation-delay: -3s;
            animation-duration: 10s;
        }

        .parallax>use:nth-child(3) {
            animation-delay: -4s;
            animation-duration: 13s;
        }

        .parallax>use:nth-child(4) {
            animation-delay: -5s;
            animation-duration: 20s;
        }

        @keyframes move-forever {
            0% {
                transform: translate3d(-90px, 0, 0);
            }

            100% {
                transform: translate3d(85px, 0, 0);
            }
        }

        /*Shrinking for mobile*/
        @media (max-width: 768px) {
            .waves {
                height: 40px;
                min-height: 40px;
            }

            .content {
                height: 30vh;
            }

            h1 {
                font-size: 24px;
            }
        }
    </style>
</head>

<body>
    <div class="header">
        <!--Content before waves-->
        <div class="inner-header flex">
            <div class="textBox">
                <h1>forgot your password?</h1>
                <h2>just enter your email..</h2>
                <form action="forgot-password.php" method="post">
                    <input type="text" name="email" value="" placeholder="Email ...">
                    <input type="submit" name="resetpassword" value="Reset Password">
                </form>

                <a class="btn" href="https://ez-work.herokuapp.com/login/index">Go Back</a>
            </div>
        </div>
        <!--Waves Container-->
        <div>
            <svg class="waves" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" viewBox="0 24 150 28" preserveAspectRatio="none" shape-rendering="auto">
                <defs>
                    <path id="gentle-wave" d="M-160 44c30 0 58-18 88-18s 58 18 88 18 58-18 88-18 58 18 88 18 v44h-352z" />
                </defs>
                <g class="parallax">
                    <use xlink:href="#gentle-wave" x="48" y="0" fill="rgba(255,255,255,0.7" />
                    <use xlink:href="#gentle-wave" x="48" y="3" fill="rgba(255,255,255,0.5)" />
                    <use xlink:href="#gentle-wave" x="48" y="5" fill="rgba(255,255,255,0.3)" />
                    <use xlink:href="#gentle-wave" x="48" y="7" fill="#fff" />
                </g>
            </svg>
        </div>
        <!--Waves end-->
    </div>
    <!--Header ends-->

    <!--Content starts-->
    <div class="content flex">
        <p>Team Apex | 2021 | BCS 430W</p>
    </div>
    <!--Content ends-->
</body>

</html>