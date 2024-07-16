<?php
include "db-connection.php";

error_reporting(E_ALL);
     ini_set('display_errors', 1);
     $upcoming_appointments = "SELECT 
        a.user_id, 
        a.date,
        a.status, 
        a.appointment_id,
        d.first_name, 
        d.last_name, 
        d.specialization,
        h.hospital_name,
        h.hospital_address,
        s.start_time,
        s.end_time

        FROM 
            appointments a
        INNER JOIN 
            doctors d
        ON 
            a.doctor_id = d.doctor_id
        INNER JOIN 
            hospitals h
        ON
            d.hospital_id = h.hospital_id
        INNER JOIN
            slots s
        ON 
            a.slot_id = s.slot_id
        WHERE 
            status IN ('Pending', 'Confirmed')";

    $upcoming_results = $connect->query($upcoming_appointments);

    $completed_appointments = "SELECT 
        a.user_id, 
        a.date,
        a.status, 
        a.appointment_id,
        d.first_name, 
        d.last_name, 
        d.specialization,
        h.hospital_name,
        h.hospital_address,
        s.start_time,
        s.end_time

        FROM 
            appointments a
        INNER JOIN 
            doctors d
        ON 
            a.doctor_id = d.doctor_id
        INNER JOIN 
            hospitals h
        ON
            d.hospital_id = h.hospital_id
        INNER JOIN
            slots s
        ON 
            a.slot_id = s.slot_id
        WHERE
            status = 'Completed'";

    $completed_results = $connect->query($completed_appointments);
             
        $users = "SELECT * FROM users";
        $user_results = $connect->query($users);
    
        $query = "SELECT hospital_id, hospital_name FROM hospitals";
        $result = $connect->query($query);

        $hospital_options = "";
        while ($row = $result->fetch_assoc()) {
            $hospital_options .= "<option value='" . $row['hospital_id'] . "'>" . $row['hospital_name'] . "</option>";
        }

        $total_users = $user_results->num_rows;
        $total_appointments = $completed_results->num_rows + $upcoming_results->num_rows;
?>