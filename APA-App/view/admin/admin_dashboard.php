<?php include '../db/config.php'; ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard</title>
    <link rel="stylesheet" href="../css/styles.css">
</head>
<body>
    <h1>Admin Dashboard</h1>

    <div class="matches-section">
        <h2>Scheduled Matches</h2>
        <table border="1">
            <thead>
                <tr>
                    <th>Challenger</th>
                    <th>Challenged</th>
                    <th>Schedule Date</th>
                    <th>Declare Winner</th>
                </tr>
            </thead>
            <tbody id="matches-body">
                <!-- Dynamic match rows will be inserted here -->
            </tbody>
        </table>
    </div>

    <script src="admin_dashboard.js"></script>
</body>
</html>
