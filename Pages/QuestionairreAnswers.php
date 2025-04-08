<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Haal de antwoorden op uit de POST-data
    $formData = $_POST;
    $answers = [];

    // Tel hoe vaak elk antwoord is gegeven
    foreach ($formData as $key => $value) {
        if (isset($answers[$value])) {
            $answers[$value]++;
        } else {
            $answers[$value] = 1;
        }
    }

    // Zet de antwoorden om naar een JSON-string
    $jsonAnswers = json_encode($answers);

    // Sla de JSON-string op in een cookie
    setcookie('questionnaire', $jsonAnswers, time() + (7 * 24 * 60 * 60), '/');

    // Toon de antwoorden als JSON
    echo '<script>';
    echo 'console.log(' . json_encode($answers) . ');';    
    echo '</script>';



    // Doorverwijzen naar een specifieke pagina
    header("Location: results.html");
    exit();

}
?>



