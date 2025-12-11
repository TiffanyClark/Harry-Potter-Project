<?php
// Define quiz questions and answers
$questions = [
    [
        "question" => "What is the name of Harry Potter's pet owl?",
        "options" => [
            "Crookshanks",
            "Hedwig",
            "Scabbers",
            "Errol"
        ],
        "answer" => 1 // Hedwig
    ],
    [
        "question" => "What platform at King's Cross Station does the Hogwarts Express depart from?",
        "options" => [
            "Platform 9",
            "Platform 9¾",
            "Platform 10",
            "Platform 8¾"
        ],
        "answer" => 1 // Platform 9¾
    ],
    [
        "question" => "Who is the headmaster of Hogwarts when Harry first attends?",
        "options" => [
            "Severus Snape",
            "Minerva McGonagall",
            "Albus Dumbledore",
            "Rubeus Hagrid"
        ],
        "answer" => 2 // Albus Dumbledore
    ],
    [
        "question" => "What house is known for bravery and courage?",
        "options" => [
            "Gryffindor",
            "Ravenclaw",
            "Slytherin",
            "Hufflepuff"
        ],
        "answer" => 0 // Gryffindor
    ],
    [
        "question" => "What position does Harry play on the Gryffindor Quidditch team?",
        "options" => [
            "Keeper",
            "Beater",
            "Chaser",
            "Seeker"
        ],
        "answer" => 3 // Seeker
    ]
];

// If form submitted, calculate score
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $score = 0;
    foreach ($questions as $index => $q) {
        if (isset($_POST["question_$index"]) && $_POST["question_$index"] == $q["answer"]) {
            $score++;
        }
    }
    // Redirect to results page with score
    header("Location: result.php?score=$score&total=" . count($questions));
    exit();
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Harry Potter Quiz</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
<div class="quiz-container">
    <h1>Harry Potter Quiz</h1>
    <form method="post" action="">
        <?php foreach ($questions as $index => $q): ?>
            <div class="question-block">
                <p><strong><?php echo ($index+1) . ". " . htmlspecialchars($q["question"]); ?></strong></p>
                <?php foreach ($q["options"] as $optIndex => $option): ?>
                    <label>
                        <input type="radio" name="question_<?php echo $index; ?>" value="<?php echo $optIndex; ?>">
                        <?php echo htmlspecialchars($option); ?>
                    </label><br>
                <?php endforeach; ?>
            </div>
        <?php endforeach; ?>
        <input type="submit" value="Submit Quiz" class="btn">
    </form>
</div>
</body>
</html>
