<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Ambil data dari form
    $username = $_POST['username'];
    $email = $_POST['email'];

    // Proses untuk mengirim email reset password
    // Misalnya, menggunakan PHPMailer atau fungsi mail() PHP bawaan

    // Contoh penggunaan PHPMailer (butuh library PHPMailer)
    // require 'vendor/autoload.php'; // Path to PHPMailer autoload.php

    // Gunakan SMTP untuk pengiriman email (contoh menggunakan Gmail)
    // $mail = new PHPMailer\PHPMailer\PHPMailer();
    // $mail->isSMTP();
    // $mail->Host = 'smtp.gmail.com';
    // $mail->SMTPAuth = true;
    // $mail->Username = 'your-email@gmail.com'; // Ganti dengan email pengirim
    // $mail->Password = 'your-password'; // Ganti dengan password email pengirim
    // $mail->SMTPSecure = 'tls';
    // $mail->Port = 587;

    // Kirim email
    // $mail->setFrom('your-email@gmail.com', 'SIPON Admin');
    // $mail->addAddress($email);
    // $mail->Subject = 'Reset Password Request';
    // $mail->Body    = 'Hello ' . $username . ', click the link to reset your password: <a href="http://your-domain.com/reset-password.php?username=' . $username . '">Reset Password</a>';
    // $mail->AltBody = 'Hello ' . $username . ', click the link to reset your password: http://your-domain.com/reset-password.php?username=' . $username;

    // if ($mail->send()) {
    //     echo 'Email sent successfully';
    // } else {
    //     echo 'Error sending email: ' . $mail->ErrorInfo;
    // }

    // Contoh sederhana tanpa PHPMailer (menggunakan mail() PHP bawaan)
    $subject = 'Reset Password Request';
    $message = 'Hello ' . $username . ', click the link to reset your password: http://your-domain.com/reset-password.php?username=' . $username;
    $headers = 'From: your-email@gmail.com' . "\r\n" .
        'Reply-To: your-email@gmail.com' . "\r\n" .
        'X-Mailer: PHP/' . phpversion();

    if (mail($email, $subject, $message, $headers)) {
        echo 'Email sent successfully';
    } else {
        echo 'Error sending email';
    }
}
?>
