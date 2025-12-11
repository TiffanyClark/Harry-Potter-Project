<?php
$score = isset($_GET['score']) ? (int)$_GET['score'] : 0;
$total = isset($_GET['total']) ? (int)$_GET['total'] : 0;
?>

<!DOCTYPE html>
<html>
<head>
    <title>Harry Potter Quiz Results</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
<div class="quiz-container">
    <h1>Results</h1>
    <p>You scored <strong><?php echo $score; ?></strong> out of <strong><?php echo $total; ?></strong>.</p>

    <?php if ($score === $total): ?>
        <p>🦁 True Gryffindor! You aced all <?php echo $total; ?> questions — ten points to your house!</p>
    <?php elseif ($score >= 4): ?>
        <p>⚡ Excellent work! You’re well on your way to becoming a Hogwarts scholar.</p>
    <?php elseif ($score >= 2): ?>
        <p>📚 Not bad! Keep studying your spellbooks and you’ll master the wizarding world soon.</p>
    <?php else: ?>
        <p>🪄 Don’t worry, even the greatest witches and wizards had to start somewhere. Try again!</p>
    <?php endif; ?>

    <a href="index.php" class="btn">Try Again</a>
</div>
</body>
</html>
