<?php

class BookingModel {
    private $db;

    public function __construct(PDO $db) {
        $this->db = $db;
    }

    public function saveBooking($booking) { // not used
        $stmt = $this->db->prepare("INSERT INTO bookings (participation_id, employee_name, employee_mail, event_id, event_name, participation_fee, event_date, version) VALUES (?, ?, ?, ?, ?, ?, ?, ?)");
        $stmt->execute([
            $booking['participation_id'],
            $booking['employee_name'],
            $booking['employee_mail'],
            $booking['event_id'],
            $booking['event_name'],
            $booking['participation_fee'],
            $booking['event_date'],
            isset($booking['version']) ? $booking['version'] : null
        ]);
    }
    public function saveBatchBookings($bookings) {
        try {
            $this->db->beginTransaction();

            $stmt = $this->db->prepare("INSERT INTO bookings (participation_id, employee_name, employee_mail, event_id, event_name, participation_fee, event_date, version) VALUES (?, ?, ?, ?, ?, ?, ?, ?)");

            foreach ($bookings as $booking) {
                $stmt->execute([
                    $booking['participation_id'],
                    $booking['employee_name'],
                    $booking['employee_mail'],
                    $booking['event_id'],
                    $booking['event_name'],
                    $booking['participation_fee'],
                    $booking['event_date'],
                    isset($booking['version']) ? $booking['version'] : null
                ]);
            }

            $this->db->commit();
        } catch (PDOException $e) {
            $this->db->rollBack();
            // Handle the exception as per your requirement
        }
    }

    public function getFilteredBookings($filters) {
        $where = [];
        $params = [];

        if (!empty($filters['employee_name'])) {
            $where[] = "employee_name LIKE ?";
            $params[] = "%" . $filters['employee_name'] . "%";
        }

        if (!empty($filters['event_name'])) {
            $where[] = "event_name LIKE ?";
            $params[] = "%" . $filters['event_name'] . "%";
        }

        if (!empty($filters['event_date'])) {
            $where[] = "event_date = ?";
            $params[] = $filters['event_date'];
        }

        $whereClause = '';
        if (!empty($where)) {
            $whereClause = "WHERE " . implode(" AND ", $where);
        }

        $stmt = $this->db->prepare("SELECT * FROM bookings $whereClause");
        $stmt->execute($params);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
}
