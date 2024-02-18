<?php
// update_status.php
session_start();

// Get parameters from the URL
$userId = $_GET['userId']; // Use the provided userId, not session_id()
$newStatus = $_GET['status'];

$file = "user_data.txt";

// Read all lines from the file
$lines = file($file, FILE_IGNORE_NEW_LINES);

// Update the status for the specified user
foreach ($lines as &$line) {
    list($lineUserId, $userIp, $country, $region, $city, $status) = explode('|', $line);
    if ($lineUserId === $userId) {
        $line = "$lineUserId|$userIp|$country|$region|$city|$newStatus";
        break;
    }
}

// Write the updated content back to the file
file_put_contents($file, implode("\n", $lines));

// Return a response
$response = ['status' => 'success'];

// If approved, include the redirect IP in the response
if ($newStatus === 'approved') {
    $response['redirectIp'] = $userIp;
}

echo json_encode($response);
?>
