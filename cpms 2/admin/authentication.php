<?php
if (isset($_SESSION['loggedIn'])) {
    $email = validate($_SESSION['loggedInUser']['email']);
    $query = "SELECT * FROM admins WHERE email='$email' LIMIT 1";

    // Execute the query
    $result = mysqli_query($conn, $query);

    if ($result) {
        if (mysqli_num_rows($result) == 0) {
            logoutSession();
            redirect('../login.php', 'Access Denied!!');
        } else {
            $row = mysqli_fetch_assoc($result);

            if ($row['is_ban'] == 1) {
                logoutSession();
                redirect('../login.php', 'Your account has been banned');
            }
        }
    } else {
        // Handle the case where the query fails
        redirect('../login.php', 'Error in fetching user data');
    }
} else {
    redirect('../login.php', 'Please Login to Continue');
}
?>
