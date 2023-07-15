<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Event Booking</title>

    <!-- Include Bootstrap v4 CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.2/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- Add jQuery library -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
</head>
<body class="container">
    <!-- Header -->
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <a class="navbar-brand" href="<?php echo BASE_URI; ?>/">BOOKING</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav"
            aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav ml-auto">
                <li class="nav-item active">
                    <a class="nav-link" href="<?php echo BASE_URI; ?>/">Home</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="<?php echo BASE_URI; ?>/about">About</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="<?php echo BASE_URI; ?>/">Contact</a>
                </li>
            </ul>
        </div>
    </nav>

    <form action="<?php echo BASE_URI; ?>/" method="POST" class="mb-3 mt-3 text-center">
        <input type="hidden" name="action" value="import">
        <input type="submit" value="Import JSON Data" class="btn btn-info">
    </form>

    <div class="container mt-3">
        <h3 class="border-bottom pb-2 mb-3">Filter Bookings</h3>
        <!-- Center Content - Filter Form -->
        <form id="filterForm" action="<?php echo BASE_URI; ?>/search" method="GET" class="mb-3">
            <div class="form-group row">
                <label for="employee_name" class="col-md-3 col-form-label font-weight-bold">Employee Name:</label>
                <div class="col-md-3">
                    <input class="form-control" type="text" id="employee_name" name="employee_name">
                </div>
            </div>

            <div class="form-group row">
                <label for="event_name" class="col-md-3 col-form-label font-weight-bold">Event Name:</label>
                <div class="col-md-3">
                    <input class="form-control" type="text" id="event_name" name="event_name">
                </div>
            </div>

            <div class="form-group row">
                <label for="event_date" class="col-md-3 col-form-label font-weight-bold">Event Date:</label>
                <div class="col-md-3">
                    <input class="form-control" type="date" id="event_date" name="event_date">
                </div>
            </div>

            <div class="form-group row">
                <div class="col-md-3 offset-md-3">
                    <button type="submit" class="btn btn-primary">Filter</button>
                    <button type="button" class="btn btn-secondary" onclick="return reset_filter()">Reset</button>
                </div>
            </div>
        </form>

        <div id="filterData"></div>
    </div>


    <footer class="bg-light py-3 text-center">
        <p>Copyright &copy; 2023 | All rights reserved</p>
    </footer>

    <script src="<?php echo BASE_URI; ?>/public/js/custom.js"></script>
    <script type="text/javascript">
        $(document).ready(function() {
            $('#filterForm').submit()
        })
    </script>
</body>
</html>
