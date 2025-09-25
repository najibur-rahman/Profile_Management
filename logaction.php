<?php
if (isset($_POST['login'])) {
    include 'connect.php';

    $l_name = $_POST['email'];
    $l_pass = $_POST['Pass'];

    $check = mysqli_query($connect, "SELECT * FROM register WHERE (regUserName='$l_name' OR regEmail='$l_name') AND regPassword='$l_pass' AND is_verified=1");

    if(mysqli_num_rows($check)>0){
        session_start();
        $user_data = mysqli_fetch_assoc($check);
        $_SESSION['userid'] = $user_data['id'];
        $_SESSION['uname'] = $l_name;
        echo "<script>location.href='dashboard.php'</script>";
    } else {
        echo "<script>alert('Invalid credentials or email not verified'); location.href='login.php'</script>";
    }
} else {
    echo "<script>alert('Do not access from URL'); location.href='login.php'</script>";
}
?>