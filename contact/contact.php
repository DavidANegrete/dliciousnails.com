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
$pageTitle = "D'Licous nails email me";
$section = "contact";
include(ROOT_PATH . 'inc/head.php');
include(ROOT_PATH . 'inc/header.php'); ?>
<div class="container"> 
 <!-- Contacts -->
 <div id="contacts">
   <div class="row">    
     <!-- Alignment -->
    <div class="col-sm-offset-3 col-sm-6">
       <!-- Form itself -->
          <form name="sentMessage" class="well" id="contactForm"  novalidate>
           <legend>Contact me</legend>
         <div class="control-group">
                    <div class="controls">
            <input type="text" class="form-control" 
                   placeholder="Full Name" id="name" required
                       data-validation-required-message="Please enter your name" />
              <p class="help-block"></p>
           </div>
             </div>     
                <div class="control-group">
                  <div class="controls">
            <input type="email" class="form-control" placeholder="Email" 
                            id="email" required
                       data-validation-required-message="Please enter your email" />
        </div>
        </div>  
              
               <div class="control-group">
                 <div class="controls">
                 <textarea rows="10" cols="100" class="form-control" 
                       placeholder="Message" id="message" required
               data-validation-required-message="Please enter your message" minlength="5" 
                       data-validation-minlength-message="Min 5 characters" 
                        maxlength="999" style="resize:none"></textarea>
        </div>
               </div>        
         <div id="success"> </div> <!-- For success/fail messages -->
        <button type="submit" class="btn btn-primary pull-right">Send</button><br />
          </form>
    </div>
      </div>
    </div>
   </div>



<?php include(ROOT_PATH . 'inc/footer.php') ?>