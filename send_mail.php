<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Collect and sanitize form inputs
    $first_name = htmlspecialchars(strip_tags(trim($_POST['first_name'])));
    $last_name = htmlspecialchars(strip_tags(trim($_POST['last_name'])));
    $email = filter_var(trim($_POST['email']), FILTER_SANITIZE_EMAIL);
    $message = htmlspecialchars(strip_tags(trim($_POST['message'])));

    // Check if inputs are not empty
    if (!empty($first_name) && !empty($last_name) && !empty($email) && !empty($message)) {
        // Your email address
        $to = "your-email@example.com";
        $subject = "New Contact Form Submission";

        // Email content
        $email_content = "First Name: $first_name\n";
        $email_content .= "Last Name: $last_name\n";
        $email_content .= "Email: $email\n\n";
        $email_content .= "Message:\n$message\n";

        // Email headers
        $headers = "From: $email";

        // Send email
        if (mail($to, $subject, $email_content, $headers)) {
            // Redirect to a thank you page (or display a success message)
            echo "Thank you for your message. It has been sent.";
        } else {
            // Display an error message
            echo "Oops! Something went wrong, and we couldn't send your message.";
        }
    } else {
        // Display an error message
        echo "Please fill in all fields.";
    }
} else {
    // Display an error message
    echo "There was a problem with your submission, please try again.";
}
?>