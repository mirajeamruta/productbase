<?php
if (!defined('BASEPATH')) {
	exit('No direct script access allowed');
}
	use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

class Onlineform extends CI_Controller
{
	public function __construct()
	{
		/*call CodeIgniter's default Constructor*/
		parent::__construct();
		$this->load->helper('form');
		$this->load->helper('url');

		/*load database libray manually*/
		$this->load->database();

		/*load Model*/
		$this->load->model('Onlineformmodel');
	}
	// edit_submit_index function

	function applyOnlineForm()
	{

require 'phpmailer/src/Exception.php';
require 'phpmailer/src/PHPMailer.php';
require 'phpmailer/src/SMTP.php';

$name = $_POST['firstname'];
$email = $_POST['email'];
$address=$_POST['address'];
$education=$_POST['qualifications'];
$experience=$_POST['experience'];
$pdfFileTmp = $_FILES['resume']['tmp_name']; // Use the 'tmp_name' key
$pdfName = $_FILES['resume']['name'];

if(isset($_POST["send"])){
    $mail = new PHPMailer(true);
    $mail->isSMTP();
    $mail->Host ='ssl://smtp.gmail.com:465';
    $mail->SMTPAuth = true;
    $mail->Username='webone@balunand.com';
    $mail->Password='KriyaSheela2023';
    $mail->SMTPSecure='ssl';
    $mail->Port=465;
    $mail->setFrom('webone@balunand.com','Kriyasheela');
    $mail->addAddress('webone@balunand.com');
    $mail->isHTML(true);
    $mail->Subject="Application Form";
    $mail->Body="<!DOCTYPE html>
<html>
    <head>
        <meta charset='utf-8'/>
        <title>PDF</title>
        <meta name='viewport' content='width=device-width,initial-scale=1.0'/>
         <style>
           
           .applicant_table,th,td
            {
                border: 1px solid #000;
                border-collapse: collapse;
                padding: 10px 58px;
            }
           table.applicant_table 
           {
            font-size: 14px;
           }
            th{
				text-align: center;
			}
          
           @media screen and (max-width: 600px)
          {
            
            table.applicant_table 
             {
                font-size: 14px;
            }
            .applicant_table, th, td 
            {
               border: 1px solid #000;
               border-collapse: collapse;
               padding: 10px 24px;
            }
             th{
				text-align: center;
			}
        }
         </style>
    </head>
    <body>
        <table class='applicant_table'>
            <tbody>
            <tr>
			  <th colspan='2'><h3>Applicant details</h3></th>
			</tr>
                <tr>
                    <th>Name</th>
                    <td>$name</td>
                </tr>
                <tr>
                    <th>Email Id</th>
                    <td>$email</td>
                </tr>
                <tr>
                    <th>Address</th>
                    <td>$address</td>
                </tr>
                <tr>
                    <th>Education</th>
                    <td>$education</td>
                </tr>
                <tr>
                    <th>Experience</th>
                    <td>$experience years</td>
                </tr>
            </tbody>
        </table>
    </body>
</html>";
	$mail->addAttachment($pdfFileTmp, $pdfName);
    $mail->send();
    echo "
    <script>
    alert('Application sent  successfully');
    document.location.href='https://balunand.com/';
    </script>";
}

	}
}
