<?php
header('Content-Type: application/json');
header('Access-Control-Allow-Origin: *');
header('Access-Control-Allow-Methods: POST');
header('Access-Control-Allow-Headers: Content-Type');

// Check if request is POST
if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    http_response_code(405);
    echo json_encode(['error' => 'Method not allowed']);
    exit;
}

// Get form type
$formType = $_POST['form_type'] ?? '';

// Validate form type
if (!in_array($formType, ['contact', 'donation'])) {
    http_response_code(400);
    echo json_encode(['error' => 'Invalid form type']);
    exit;
}

// Process contact form
if ($formType === 'contact') {
    $name = sanitizeInput($_POST['contact-name'] ?? '');
    $email = sanitizeInput($_POST['contact-email'] ?? '');
    $subject = sanitizeInput($_POST['contact-subject'] ?? '');
    $message = sanitizeInput($_POST['contact-message'] ?? '');
    
    // Validate required fields
    if (empty($name) || empty($email) || empty($subject) || empty($message)) {
        http_response_code(400);
        echo json_encode(['error' => 'All fields are required']);
        exit;
    }
    
    // Validate email
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        http_response_code(400);
        echo json_encode(['error' => 'Invalid email address']);
        exit;
    }
    
    // Send email (you would integrate with your email service here)
    $success = sendContactEmail($name, $email, $subject, $message);
    
    if ($success) {
        echo json_encode(['success' => 'Message sent successfully']);
    } else {
        http_response_code(500);
        echo json_encode(['error' => 'Failed to send message']);
    }
}

// Process donation form
if ($formType === 'donation') {
    $name = sanitizeInput($_POST['donor-name'] ?? '');
    $email = sanitizeInput($_POST['donor-email'] ?? '');
    $amount = floatval($_POST['amount'] ?? 0);
    $purpose = sanitizeInput($_POST['donation-purpose'] ?? 'general');
    
    // Validate required fields
    if (empty($name) || empty($email) || $amount <= 0) {
        http_response_code(400);
        echo json_encode(['error' => 'Invalid donation details']);
        exit;
    }
    
    // Validate email
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        http_response_code(400);
        echo json_encode(['error' => 'Invalid email address']);
        exit;
    }
    
    // Log donation attempt (you would integrate with your payment processor here)
    $success = processDonation($name, $email, $amount, $purpose);
    
    if ($success) {
        echo json_encode([
            'success' => 'Donation processed successfully',
            'redirect' => 'donate.html?amount=' . $amount . '&purpose=' . $purpose
        ]);
    } else {
        http_response_code(500);
        echo json_encode(['error' => 'Failed to process donation']);
    }
}

function sanitizeInput($input) {
    return htmlspecialchars(strip_tags(trim($input)));
}

function sendContactEmail($name, $email, $subject, $message) {
    // Email configuration
    $to = 'info@ntu-ongoni.org'; // Replace with your actual email
    $headers = "From: $email\r\n";
    $headers .= "Reply-To: $email\r\n";
    $headers .= "Content-Type: text/html; charset=UTF-8\r\n";
    
    $emailSubject = "Contact Form: $subject";
    $emailBody = "
    <html>
    <body>
        <h2>New Contact Form Submission</h2>
        <p><strong>Name:</strong> $name</p>
        <p><strong>Email:</strong> $email</p>
        <p><strong>Subject:</strong> $subject</p>
        <p><strong>Message:</strong></p>
        <p>$message</p>
    </body>
    </html>
    ";
    
    // In a production environment, you would use a proper email service
    // For now, we'll just log it
    error_log("Contact form submission: $name, $email, $subject");
    
    return true; // Simulated success
}

function processDonation($name, $email, $amount, $purpose) {
    // Log donation details
    $logEntry = date('Y-m-d H:i:s') . " - Donation: $name, $email, $amount, $purpose\n";
    file_put_contents('donations.log', $logEntry, FILE_APPEND | LOCK_EX);
    
    // In a real implementation, you would:
    // 1. Integrate with a payment processor (Stripe, PayPal, etc.)
    // 2. Store donation details in a database
    // 3. Send confirmation emails
    // 4. Generate receipts
    
    return true; // Simulated success
}
?>
