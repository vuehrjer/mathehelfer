<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = htmlspecialchars($_POST['name']);
    $email = htmlspecialchars($_POST['_replyto']);
    $subject = htmlspecialchars($_POST['subject']);
    $message = htmlspecialchars($_POST['message']);
    $time = htmlspecialchars($_POST['time']);

    $to = "your-email@domain.com"; // Ersetzen Sie dies durch Ihre World4You E-Mail-Adresse
    $headers = "From: " . $email . "\r\n" .
               "Reply-To: " . $email . "\r\n" .
               "X-Mailer: PHP/" . phpversion();

    $full_message = "Name: $name\n" .
                    "E-Mail: $email\n" .
                    "Bevorzugte Unterrichtszeiten: $time\n" .
                    "Nachricht:\n$message";

    if (mail($to, $subject, $full_message, $headers)) {
        echo "Vielen Dank für Ihre Nachricht. Ich werde mich so bald wie möglich bei Ihnen melden.";
    } else {
        echo "Entschuldigung, es gab ein Problem beim Senden Ihrer Nachricht. Bitte versuchen Sie es später erneut.";
    }
} else {
    echo "Ungültige Anfrage.";
}
?>
