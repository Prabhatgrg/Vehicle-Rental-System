
<h1 class="h3 mb-2">Users</h1>

<?php

global $conn;

$stmt = $conn->prepare("SELECT user_fullname, user_login, user_email, user_phone, user_date FROM re_users");
$stmt->execute();
$result = $stmt->get_result();
$data = $result->fetch_all(MYSQLI_ASSOC);

// print_r($data);
foreach($data as $user) :
?>

<ul>
    <li><?php echo $user['user_fullname'];?></li>
    <li><?php echo $user['user_login'];?></li>
    <li><?php echo $user['user_email'];?></li>
    <li><?php echo $user['user_phone'];?></li>
    <li><?php echo $user['user_date'];?></li>
</ul>

<?php endforeach; ?>