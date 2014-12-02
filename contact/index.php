<?php 

require_once("../inc/config.php");

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = trim($_POST["name"]);
    $email = trim($_POST["email"]);
    $message = trim($_POST["message"]);

    if ($name == "" OR $email == "" OR $message == "") {
        $error_message = "You must specify a value for name, email address, and message.";
    }

    if (!isset($error_message)) {
        foreach( $_POST as $value ){
            if( stripos($value,'Content-Type:') !== FALSE ){
                $error_message = "There was a problem with the information you entered.";
            }
        }
    }

    if (!isset($error_message) && $_POST["address"] != "") {
        $error_message = "Your form submission has an error.";
    }

    require_once(ROOT_PATH . "inc/phpmailer/class.phpmailer.php");
    $mail = new PHPMailer();

    if (!isset($error_message) && !$mail->ValidateAddress($email)){
        $error_message = "You must specify a valid email address.";
    }

    if (!isset($error_message)) {
        $email_body = "";
        $email_body = $email_body . "Name: " . $name . "<br>";
        $email_body = $email_body . "Email: " . $email . "<br>";
        $email_body = $email_body . "Message: " . $message;

        $mail->SetFrom($email, $name);
        $address = "orders@shirts4mike.com";
        $mail->AddAddress($address, "Shirts 4 Mike");
        $mail->Subject    = "Shirts 4 Mike Contact Form Submission | " . $name;
        $mail->MsgHTML($email_body); 

        if($mail->Send()) {
            header("Location: " . BASE_URL . "contact/?status=thanks");
            exit;
        } else {
          $error_message = "There was a problem sending the email: " . $mail->ErrorInfo;
        }

    }
}

?><?php 
$pageTitle = "D'Licous | Reach Me";
$section = "contact";
include(ROOT_PATH . 'inc/head.php');
include(ROOT_PATH . 'inc/header.php'); ?>

<div class="container">
  <div class="jumbotron">
    <div class="row">
          <div class="col-sm-6">
            <p class="text-center lead">To schedule an appointment simply give us a call during working hours. 
            Your call will be returned promptly if you happen to get a message during normal business hours.</p>
            <p class="text-center lead">If you want something special done for a special occasion book your appointment at least 3 weeks in advance.</p>
            <p class="text-center lead">Appointments are available: <br>11am - 7pm<br>Tuesday - Saturday</p>
     
            <p href="tel:915-228-5638"><span class="text-left glyphicon glyphicon-earphone" aria-hidden="true"> 915.228.5638</span></p>
          </div>
          <div class="col-sm-6">
            <p class="lead"><small>You can upload a picture of a set of nails you have seen and want done and we will get back to you!</small></p>
                        <!-- Form itself -->
            <form name="sentMessage" class="well" id="contactForm" novalidate="">
              <div class="control-group">
                  <div class="controls">
                    <input type="text" class="form-control" placeholder="name" id="name"
                    required="" data-validation-required-message="Name">
                    <p class="help-block">
                    </p>
                  </div>
                </div>
              <div class="control-group">
                <div class="controls">
                  <input type="email" class="form-control" placeholder="email" id="email"
                  required="" data-validation-required-message="Please enter your email">
                </div>
              </div>
              <div class="control-group">
                <div class="controls">
                  <textarea rows="10" cols="100" class="form-control" placeholder="message"
                  id="message" required="" data-validation-required-message="Please enter your message"
                  minlength="5" data-validation-minlength-message="Min 5 characters" maxlength="999"
                  style="resize:none"></textarea>
                </div>
              </div>
              <div class="form-group">
                <label>Add an image</label>
                <input type="file" class="form-control" >
              </div>
              <div id="success">
                <!-- Do somemthing when sent -->
              </div>
              <!-- For success/fail messages -->
              <button type="submit" class="btn btn-primary pull-right">
                Send
              </button>
              <br>
            </form>
          </div>
    </div>
</div> <!-- Jumbotron  -->
<?php include(ROOT_PATH . 'inc/footer.php') ?>

