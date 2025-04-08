<?php

if ($_SERVER['REQUEST_METHOD'] === 'POST') {

$formData = $_POST;

echo json_encode($formData);
echo "<br/>";

// Initialiseer een array om de antwoorden te tellen
$antwoorden = [
  "human-fall_flat_2" => 0,
  "cult_of_the_lamb" => 0,
  "enter_the_gungeon" => 0,
  "golf_for_workgroups" => 0
];


// Loop door de POST data en tel de antwoorden
foreach($formData as $key => $value) {
	if (isset($antwoorden[$value])) {
            $antwoorden[$value]++;
        } 
	}


    // Zet de antwoorden om naar een JSON-string
    $jsonAnswers = json_encode($antwoorden);

    // Sla de JSON-string op in een cookie
    setcookie('questionnaire', $jsonAnswers, time() + (7 * 24 * 60 * 60), '/');


// Toon de resultaten
foreach ($antwoorden as $antwoord => $count) {
  echo "$antwoord: $count keer gekozen<br>";
}


}

?>