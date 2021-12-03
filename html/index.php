<!-- set up php for file -->
<?php

session_start();
// if logged in go to home if not go to login
$is_session_valid = 0;
if (isset($_SESSION['valid'])) {
    if (!empty($_SESSION['valid'])) {
        if ($_SESSION['valid'] == '1') {
            $is_session_valid = 1;
        }
    }
}
if ($is_session_valid == 0) {
    header("Location: login.php");
} else {
    header("Location: home.php");
}

?>
