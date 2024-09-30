<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Form fields
    $name = htmlspecialchars($_POST['name']);
    $email = htmlspecialchars($_POST['email']);
    $message = htmlspecialchars($_POST['message']);

    // reCAPTCHA validation
    $secret = 'YOUR_RECAPTCHA_SECRET_KEY';
    $response = $_POST['g-recaptcha-response'];
    $remoteip = $_SERVER['REMOTE_ADDR'];

    // Verify reCAPTCHA
    $recaptchaUrl = 'https://www.google.com/recaptcha/api/siteverify';
    $recaptchaResponse = file_get_contents($recaptchaUrl . '?secret=' . $secret . '&response=' . $response . '&remoteip=' . $remoteip);
    $recaptchaData = json_decode($recaptchaResponse);

    if ($recaptchaData->success) {
        // Send email
        $to = 'tarnold2030@gmail.com'; // Your email address
        $subject = 'New Contact Us Message';
        $headers = "From: " . $email . "\r\n";
        $headers .= "Reply-To: " . $email . "\r\n";
        $headers .= "Content-Type: text/html; charset=UTF-8\r\n";

        $emailContent = "<h2>Contact Us Message</h2>";
        $emailContent .= "<p><strong>Name:</strong> $name</p>";
        $emailContent .= "<p><strong>Email:</strong> $email</p>";
        $emailContent .= "<p><strong>Message:</strong><br>" . nl2br($message) . "</p>";

        if (mail($to, $subject, $emailContent, $headers)) {
            echo "Message sent successfully!";
        } else {
            echo "Failed to send the message.";
        }
    } else {
        echo "reCAPTCHA verification failed.";
    }
}
?>
