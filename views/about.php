<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>About EventBooking</title>

    <!-- Include Bootstrap v4 CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.2/dist/css/bootstrap.min.css" rel="stylesheet">
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
                <li class="nav-item">
                    <a class="nav-link" href="<?php echo BASE_URI; ?>/">Home</a>
                </li>
                <li class="nav-item active">
                    <a class="nav-link" href="<?php echo BASE_URI; ?>/about">About</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="<?php echo BASE_URI; ?>/contact">Contact</a>
                </li>
            </ul>
        </div>
    </nav>

    <div class="container mt-3">
        <h3 class="border-bottom pb-2 mb-3">About Event Booking</h3>
        <p>
            This is the about page of EventBooking. Lorem ipsum dolor sit amet, consectetur adipiscing elit.
            Nulla vel nunc euismod, feugiat dui in, gravida purus. Nam in eros a justo suscipit rhoncus. Nulla auctor
            facilisis ante, in euismod odio semper ac. Quisque elementum, elit nec fermentum tempus, purus dolor
            blandit ligula, a fermentum dolor metus a arcu.
        </p>
    </div>

    <footer class="bg-light py-3 text-center">
        <p>Copyright &copy; 2023 | All rights reserved</p>
    </footer>
</body>

</html>
