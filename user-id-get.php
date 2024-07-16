<?php
session_start();
echo json_encode(['userId' => $_SESSION['user_id']]);