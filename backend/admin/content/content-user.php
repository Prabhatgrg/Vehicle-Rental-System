
<h1 class="h3 mb-2">Users</h1>

<?php

global $conn;

$stmt = $conn->prepare("SELECT user_fullname, user_login, user_email, user_phone, user_date FROM re_users");
$stmt->execute();
$result = $stmt->get_result();
$data = $result->fetch_all(MYSQLI_ASSOC);

// print_r($data);
?>

<table class="admin-users-table">
    <tr>
        <th>FullName</th>
        <th>UserName</th>
        <th>Email</th>
        <th>Phone</th>
        <th>Date</th>
    </tr>
    
    <?php foreach($data as $user) :?>
    
    <tr>
        <td data-label="FullName: "><?php echo $user['user_fullname'];?></td>
        <td data-label="UserName: "><?php echo $user['user_login'];?></td>
        <td data-label="Email: "><?php echo $user['user_email'];?></td>
        <td data-label="Phone: "><?php echo $user['user_phone'];?></td>
        <td data-label="Date: "><?php echo $user['user_date'];?></td>
    </tr>
    <?php endforeach; ?>
</table>
