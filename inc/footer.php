<footer id="contactUsSection">
        <div class="container">
            <div class="row">
                <div class="col-md-2 footer-item">
                    <img src="assets/img/school_logos/pitlogo.png" class="img-fluid mb-2"
                        alt="USA Logo" style="width: 14rem;">
                    <br><br>
                </div>
                <div class="col-md-4 footer-item">
                    <h4>Contact us</h4>
                    <ul class="menu-list">

                    <address>
                           
                           <dt><b>Address</b></dt>
                       <dd class="pl-3"><?= $_settings->info('school_address') ?></dd>
                       <dt><b>Email</b></dt>
                       <dd class="pl-3"><?= $_settings->info('school_email') ?></dd>
                       <dt><b>Telephone #</b></dt>
                       <dd class="pl-3"><?= $_settings->info('school_tel_no') ?></dd>
                       <dt><b>Mobile #</b></dt>
                       <dd class="pl-3"><?= $_settings->info('school_mobile') ?></dd>
                       </address>

                    </ul>
                </div>
                <div class="col-md-6 footer-item last-item">
                    <h4>Contact Us</h4>
                    <div class="contact-form">
                        <form id="contact footer-contact" action="#" method="post">
                            <div class="row">
                                <div class="col-lg-12 col-md-12 col-sm-12">
                                    <fieldset>
                                        <input name="name" type="text" class="form-control" id="name"
                                            placeholder="Enter your Name" required="">
                                    </fieldset>
                                </div>
                                <div class="col-lg-12 col-md-12 col-sm-12">
                                    <fieldset>
                                        <input name="email" type="text" class="form-control" id="email"
                                            pattern="[^ @]*@[^ @]*" placeholder="E-Mail Address" required="">
                                    </fieldset>
                                </div>
                                <div class="col-lg-12">
                                    <fieldset>
                                        <textarea name="message" rows="6" class="form-control" id="message" placeholder="Your Message"
                                            required=""></textarea>
                                    </fieldset>
                                </div>
                                <div class="col-lg-12">
                                    <fieldset>
                                        <button type="submit" id="form-submit" class="filled-button">
                                             Send Message 
                                        </button>
                                    </fieldset>
                                </div>
                            </div>
                        </form>
                    </div>
                </div> 
                <div class="mr-md-auto text-center text-md-left" style="margin-top: 100px">
                    <div class="copyright">
                        &copy; <strong><span>STUDENTS' GRADE INFORMATION SYSTEM</span></strong> - <?php echo date('Y'); ?> - Program by: <strong style="color:white">Wendel Luche and Jessie Cuna</strong>
                    </div>
                    <div class="credits">
                        The Talented Students Behind This Project
                    </div>
                </div>
            </div>
        </div>
    </footer>
    <!-- Add this in the head section of your HTML -->
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>

    <?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'vendor/autoload.php'; // Adjust the path based on your project structure

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $_POST["name"];
    $email = $_POST["email"];
    $message = $_POST["message"];

    $to = "wendelluche23@gmail.com"; // Replace with your Gmail address
    $subject = "New Contact Form Submission";

    // PHPMailer Initialization
    $mail = new PHPMailer(true);
    
    try {
        //Server settings
        $mail->isSMTP(); // Set mailer to use SMTP
        $mail->Host       = 'smtp.gmail.com'; // Specify the SMTP server
        $mail->SMTPAuth   = true; // Enable SMTP authentication
        $mail->Username   = 'wendelluche23@gmail.com'; // Replace with your Gmail address
        $mail->Password   = '8b3237yB'; // Replace with your App Password
        $mail->SMTPSecure = 'tls'; // Enable TLS encryption
        $mail->Port       = 587; // TCP port to connect to

        //Recipients
        $mail->setFrom($email, $name);
        $mail->addAddress($to);

        //Content
        $mail->isHTML(true);
        $mail->Subject = $subject;
        $mail->Body    = "Name: $name<br>Email: $email<br>Message:<br>$message";

        $mail->send();

        // Trigger SweetAlert success message
        echo '<script>
                Swal.fire({
                    title: "Success!",
                    text: "Your message has been sent successfully.",
                    icon: "success",
                    confirmButtonText: "OK"
                });
              </script>';
    } catch (Exception $e) {
        // Trigger SweetAlert error message
        echo '<script>
                Swal.fire({
                    title: "Error!",
                    text: "There was an error sending your message. Please try again later.",
                    icon: "error",
                    confirmButtonText: "OK"
                });
              </script>';
    }
}
?>
