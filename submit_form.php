<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Collect form data
    $name = htmlspecialchars($_POST['name']);
    $email = htmlspecialchars($_POST['email']);
    $phone = htmlspecialchars($_POST['phone']);
    $service_type = htmlspecialchars($_POST['service_type']);
    $message = htmlspecialchars($_POST['message']);
    
    // Email details
    $to = "musaarj2020@gmail.com";
    $subject = "New Quote Request from Suakshitha Nursery Website";
    $headers = "From: $email\r\n";
    $headers .= "Reply-To: $email\r\n";
    $headers .= "Content-Type: text/html; charset=UTF-8\r\n";
    
    // Email body
    $email_body = "
    <html>
    <body>
    <h2>New Quote Request - Suakshitha Nursery</h2>
    <p><strong>Name:</strong> $name</p>
    <p><strong>Email:</strong> $email</p>
    <p><strong>Phone:</strong> $phone</p>
    <p><strong>Service Type:</strong> $service_type</p>
    <p><strong>Message:</strong><br>$message</p>
    <p><em>This email was sent from the Suakshitha Nursery website contact form.</em></p>
    </body>
    </html>
    ";
    
    // Send email
    if (mail($to, $subject, $email_body, $headers)) {
        // Redirect to thank you page
        header("Location: thank-you.html");
        exit();
    } else {
        echo "Sorry, there was an error sending your message. Please try again later.";
    }
}
?>
