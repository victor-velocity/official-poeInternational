<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Get form data
    $name = $_POST['name'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];

    // Email recipient
    $to = "info@poeinternational.com"; // Replace with your email
    
    // Email subject
    $subject = "New Consultation Request from $name";
    
    // Email message
    $message = "Name: $name\n";
    $message .= "Email: $email\n";
    $message .= "Phone: $phone\n";
    
    // Headers
    $headers = "From: $email\r\n";
    $headers .= "Reply-To: $email\r\n";
    
    // Send email
    $mail_sent = mail($to, $subject, $message, $headers);
    
    // Send response back
    header('Content-Type: application/json');
    if ($mail_sent) {
        echo json_encode(['success' => true, 'message' => 'Thank you! We will contact you soon.']);
    } else {
        echo json_encode(['success' => false, 'message' => 'Sorry, there was an error. Please try again.']);
    }
    exit;
}
?>