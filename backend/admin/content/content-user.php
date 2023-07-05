
<h1 class="h3 mb-2">Users</h1>

<?php

global $conn;

$stmt = $conn->prepare("SELECT user_fullname, user_login, user_email, user_phone, user_date FROM re_users");
$stmt->execute();
$result = $stmt->get_result();
$data = $result->fetch_array();

print_r($data);

?>