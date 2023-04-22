<?php

// Check if the email field is set and not empty
if(isset($_POST['email']) && !empty($_POST['email'])) {
	$email = $_POST['email'];
	
	// Generate a unique code for the password reset link
	$unique_code = bin2hex(random_bytes(16)); // 32 character hexadecimal string
	
	// Set the email subject and message
	$subject = "Forgot Your Password? Let us help you reset it.";
	$message = "Dear [Username],\n\nWe received a request to reset your password for your account on [Website Name]. If you did not make this request, please ignore this email.\n\nIf you did request a password reset, please use the button below to reset your password. This link will expire in 10 minutes, so please act quickly.\n\n<button><a href='https://example.com/reset_password.php?code=$unique_code'>Reset My Password</a></button>\n\nPlease note that this is a one-time use link and can only be used to reset your password once. If you encounter any issues, please contact our support team at [Support Email].\n\nThank you for using [Website Name]!\n\nBest regards,\n\n[Your Name]";

	// Set the email headers
	$headers = "From: [Your Name] <noreply@example.com>\r\n";
	$headers .= "Reply-To: [Your Name] <noreply@example.com>\r\n";
	$headers .= "Content-type: text/html\r\n";

	// Send the email
	if(mail($email, $subject, $message, $headers)) {
		echo "Password reset email sent to $email";
	} else {
		echo "Failed to send password reset email";
	}
} else {
	echo "Email field is not set or empty";
}

?>
