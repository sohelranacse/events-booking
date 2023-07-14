<!DOCTYPE html>
<html>
<head>
    <title>Bookings</title>
</head>
<body>
    <h1>Bookings</h1>

    <form action="index.php" method="POST">
        <input type="hidden" name="action" value="import">
        <input type="submit" value="Import JSON Data">
    </form>

    <hr>

    <h2>Filter Bookings</h2>
    <form action="index.php" method="GET">
        <label for="employee_name">Employee Name:</label>
        <input type="text" name="employee_name" value="<?php echo isset($_GET['employee_name']) ? $_GET['employee_name'] : ''; ?>">

        <label for="event_name">Event Name:</label>
        <input type="text" name="event_name" value="<?php echo isset($_GET['event_name']) ? $_GET['event_name'] : ''; ?>">

        <label for="event_date">Event Date:</label>
        <input type="date" name="event_date" value="<?php echo isset($_GET['event_date']) ? $_GET['event_date'] : ''; ?>">

        <input type="submit" value="Filter">
    </form>

    <hr>

    <h2>Filtered Results</h2>
    <table>
        <thead>
            <tr>
                <th>Participation ID</th>
                <th>Employee Name</th>
                <th>Employee Mail</th>
                <th>Event ID</th>
                <th>Event Name</th>
                <th>Participation Fee</th>
                <th>Event Date</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($filteredBookings as $booking): ?>
                <tr>
                    <td><?php echo $booking['participation_id']; ?></td>
                    <td><?php echo $booking['employee_name']; ?></td>
                    <td><?php echo $booking['employee_mail']; ?></td>
                    <td><?php echo $booking['event_id']; ?></td>
                    <td><?php echo $booking['event_name']; ?></td>
                    <td><?php echo $booking['participation_fee']; ?></td>
                    <td><?php echo $booking['event_date']; ?></td>
                </tr>
            <?php endforeach; ?>
            <tr>
                <td colspan="5" style="text-align: right;"><strong>Total:</strong></td>
                <td><?php echo $totalPrice; ?></td>
                <td></td>
            </tr>
        </tbody>
    </table>
</body>
</html>
