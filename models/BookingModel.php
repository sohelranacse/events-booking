<?php

class BookingModel {
    private $db;

    public function __construct(PDO $db) {
        $this->db = $db;
    }

    public function saveBatchBookings($bookings) {
        try {
            $this->db->beginTransaction();

            $bookingStmt = $this->db->prepare("INSERT INTO booking (participation_id, employee_name, employee_mail, event_id, participation_fee, event_date) VALUES (?, ?, ?, ?, ?, ?)");
            $eventStmt = $this->db->prepare("INSERT INTO events (event_id, event_name) VALUES (?, ?)");

            foreach ($bookings as $booking) {
                $eventExists = $this->checkIfEventExists($booking['event_id']);
                if (!$eventExists) {
                    $eventStmt->execute([$booking['event_id'], $booking['event_name']]);
                }

                $bookingStmt->execute([
                    $booking['participation_id'],
                    $booking['employee_name'],
                    $booking['employee_mail'],
                    $booking['event_id'],
                    $booking['participation_fee'],
                    $booking['event_date'],
                ]);
            }

            $this->db->commit();
        } catch (PDOException $e) {
            $this->db->rollBack();
            // Handle the exception as per your requirement
        }
    }
    private function checkIfEventExists($event_id) {
        $stmt = $this->db->prepare("SELECT event_id FROM events WHERE event_id = ?");
        $stmt->execute([$event_id]);
        return $stmt->fetch(PDO::FETCH_COLUMN);
    }

    public function getFilteredBookings($filters = array()) {
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

        $stmt = $this->db->prepare("
            SELECT a.*, b.event_name
            FROM booking a
            INNER JOIN events b ON (a.event_id = b.event_id)
            $whereClause
        ");
        $stmt->execute($params);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
}
