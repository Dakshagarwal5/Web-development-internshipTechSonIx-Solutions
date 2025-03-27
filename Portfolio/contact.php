<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Check if required fields are not empty
    if (!empty($_POST['name']) && !empty($_POST['email']) && !empty($_POST['subject']) && !empty($_POST['message'])) {
        $name = htmlspecialchars($_POST["name"]);
        $email = filter_var($_POST["email"], FILTER_SANITIZE_EMAIL);
        $subject = htmlspecialchars($_POST["subject"]);
        $message = htmlspecialchars($_POST["message"]);

        // Your email details
        $to = "agarwaldaksh360@email.com";  // Replace with your actual email
        $email_subject = "New Contact Form Submission: {$subject}";
        $body = "Name: {$name}\nEmail: {$email}\nMessage: {$message}";
        $headers = "From: {$email}\r\nReply-To: {$email}\r\nX-Mailer: PHP/" . phpversion();

        // Send the email
        if (mail($to, $email_subject, $body, $headers)) {
            echo "Message sent successfully!";
        } else {
            echo "Failed to send message.";
        }
    } else {
        // Handle empty fields
        echo "Please fill in all the required fields.";
    }
}
?>
