<?php

class BookingController {
    private $model;

    public function __construct(BookingModel $model) {
        $this->model = $model;
    }

    public function saveBookingsFromJson1($jsonFile) { // not used
        $json = file_get_contents($jsonFile);
        $bookings = json_decode($json, true);

        foreach ($bookings as $booking) {
            $this->model->saveBooking($booking);
        }
    }
    public function saveBookingsFromJson2($jsonFile) {
        $batchSize = 1000; // Number of bookings to process in each batch
        $batch = []; // Store bookings to be inserted as a batch

        $file = fopen($jsonFile, 'r');
        $lineCounter = 0;

        while (($line = fgets($file)) !== false) {
            $booking = json_decode($line, true);

            if ($booking !== null) {
                $batch[] = $booking;
                $lineCounter++;

                if (count($batch) >= $batchSize) {
                    $this->model->saveBatchBookings($batch);
                    $batch = []; // Reset the batch array
                }
            }
        }

        fclose($file);

        // Insert any remaining bookings in the batch
        if (!empty($batch)) {
            $this->model->saveBatchBookings($batch);
        }

        echo "Imported $lineCounter lines from the JSON file.";
    }

    public function saveBookingsFromJson($jsonFile) {
        $json = file_get_contents($jsonFile);
        $bookings = json_decode($json, true);

        $batchSize = 1000; // Number of bookings to process in each batch
        $batch = []; // Store bookings to be inserted as a batch

        foreach ($bookings as $booking) {
            $batch[] = $booking;

            if (count($batch) >= $batchSize) {
                $this->model->saveBatchBookings($batch);
                $batch = []; // Reset the batch array
            }
        }

        // Insert any remaining bookings in the batch
        if (!empty($batch)) {
            $this->model->saveBatchBookings($batch);
        }
    }



    public function filterBookings($filters) {
        $filteredBookings = $this->model->getFilteredBookings($filters);
        $totalPrice = array_sum(array_column($filteredBookings, 'participation_fee'));
        include 'views/bookings.php';
    }
}
