<?php
// admin.php

$file = "user_data.txt";

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Admin Page</title>
    <!-- Add Bootstrap CSS link -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
</head>
<body>

<div class="container mt-4">
    <h2>User Data</h2>

    <table class="table table-bordered">
        <thead class="thead-dark">
        <tr>
            <th>User ID</th>
            <th>IP</th>
            <th>Country</th>
            <th>Region</th>
            <th>City</th>
            <th>Status</th>
            <th>Actions</th>
        </tr>
        </thead>
        <tbody>

        <?php
        $lines = file($file, FILE_IGNORE_NEW_LINES);

        foreach ($lines as $line) {
            list($sessionId, $ip, $country, $region, $city, $status) = explode('|', $line);

            echo '<tr>';
            echo "<td>$sessionId</td>";
            echo "<td>$ip</td>";
            echo "<td>$country</td>";
            echo "<td>$region</td>";
            echo "<td>$city</td>";
            echo "<td>$status</td>";
            echo '<td>';
            if ($status == 'pending') {
                echo '<button class="btn btn-success" onclick="approveUser(\'' . $sessionId . '\')">Approve</button>';
                echo '<button class="btn btn-danger ml-2" onclick="rejectUser(\'' . $sessionId . '\')">Reject</button>';
            }
            echo '</td>';
            echo '</tr>';
        }
        ?>

        </tbody>
    </table>
</div>

<!-- Add Bootstrap JS and Popper.js -->
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>

<script>
    function approveUser(userId) {
        // Use AJAX to update user status to 'Approved'
        updateStatus(userId, 'approved');
    }

    function rejectUser(userId) {
        // Use AJAX to update user status to 'Rejected'
        updateStatus(userId, 'rejected');
    }

    function updateStatus(userId, newStatus) {
        // Use AJAX to update user status
        var xhr = new XMLHttpRequest();
        xhr.open('GET', 'update_status.php?userId=' + userId + '&status=' + newStatus, true);
        xhr.onreadystatechange = function () {
            if (xhr.readyState === 4 && xhr.status === 200) {
                var response = JSON.parse(xhr.responseText);
                if (response.status === 'success') {
                    // If approved, reload the page
                    location.reload();
                } else {
                    alert('Failed to update status.');
                }
            }
        };
        xhr.send();
    }
</script>

</body>
</html>
