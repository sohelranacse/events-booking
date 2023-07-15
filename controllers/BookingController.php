<?php

class BookingController {
    private $bookingModel, $load;

    public function __construct(BookingModel $bookingModel) {
        $this->bookingModel = $bookingModel;
        $this->load = new Load();
    }

    public function index() {
        $this->load->view('bookings');
    }

    public function filterBookings($filters) {
        $filteredBookings = $this->bookingModel->getFilteredBookings($filters);
        $totalPrice = array_sum(array_column($filteredBookings, 'participation_fee'));

        header('Content-Type: application/json');
        echo json_encode(['bookings' => $filteredBookings, 'totalPrice' => number_format($totalPrice, 2)]);
    }

    public function saveBookingsFromJson() {
        $jsonFile = 'public/data.json';
        $action = isset($_POST['action']) ? $_POST['action'] : '';

        if ($action === 'import') {
            $json = file_get_contents($jsonFile);
            $bookings = json_decode($json, true);

            $batchSize = 1000; // Number of bookings to process in each batch
            $batch = []; // Store bookings to be inserted as a batch

            foreach ($bookings as $booking) {
                $batch[] = $booking;

                if (count($batch) >= $batchSize) {
                    $this->bookingModel->saveBatchBookings($batch);
                    $batch = []; // Reset the batch array
                }
            }

            // Insert any remaining bookings in the batch
            if (!empty($batch)) {
                $this->bookingModel->saveBatchBookings($batch);
                echo "JSON data imported successfully!";
            }
        }
    }

}
