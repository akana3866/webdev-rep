<?php

$filename = __DIR__ . 'data/results.txt';


$data = file_get_contents($filename);
$lines = explode("\n", trim($data));

$total_submissions = count($lines);

$character_counts = [
    'Homer' => 0,
    'Marge' => 0,
    'Lisa' => 0,
    'Bart' => 0
];

foreach ($lines as $line) {
    if (array_key_exists($line, $character_counts)) {
        $character_counts[$line]++;
    }
}

$total_percentage = 0;

foreach ($character_counts as $character => $count) {
    $total_percentage += $count;
}

?>

<!doctype html>
<html>
<head>
    <title>Quiz Results</title>
    <style>
        :root {
            --homer-color: #FFDEAD;
            --marge-color: #9ACD32;
            --lisa-color: #87CEFA;
            --bart-color: #FFA500;
        }
        body {
            font-family: Arial, sans-serif;
            font-size: 18px;
            color: #333;
        }
        h1 {
            text-align: center;
            font-size: 36px;
            margin-top: 50px;
        }
        .result {
            display: flex;
            margin: 50px 0;
            align-items: center;
            justify-content: space-between;
        }
        .result img {
            width: 150px;
            height: 150px;
            margin-right: 50px;
        }
        .result .bar {
            width: 60%;
            height: 20px;
            border-radius: 10px;
            background-color: #eee;
            position: relative;
        }
        .result .bar::after {
            content: "";
            display: block;
            position: absolute;
            top: 0;
            left: 0;
            height: 100%;
            border-radius: 10px;
        }
        .result .label {
            font-size: 24px;
        }
        .result .percentage {
            font-size: 18px;
            font-weight: bold;
            margin-left: 10px;
        }
        .result .bar.Homer::after {
            width: var(--homer-percentage);
            background-color: var(--homer-color);
        }
        .result .bar.Marge::after {
            width: var(--marge-percentage);
            background-color: var(--marge-color);
        }
        .result .bar.Lisa::after {
            width: var(--lisa-percentage);
            background-color: var(--lisa-color);
        }
        .result .bar.Bart::after {
            width: var(--bart-percentage);
            background-color: var(--bart-color);
        }
        footer {
            margin-top: 50px;
            text-align: center;
            color: #666;
        }
        footer p {
            margin: 5px 0;
        }
    </style>
</head>
<body>
    <h1>Quiz Results</h1>

    <p>Total submissions: <?= $total_submissions ?></p>

    <?php foreach ($character_counts as $character => $count) : ?>
        <div class="result">
            <img src="images/<?= $character ?>.png" alt="<?= $character ?>">
            <div class="bar <?= $character ?>"><span class="label"><?= $character ?></span></div>
            <span class="percentage"><?= round(($count / $total_submissions) * 100) ?>%</span>
        </div>
    <?php endforeach; ?>

    <a href="index.php">Back to Quiz</a>
    <button onclick="window.location.href='index.php'">Try Again</button>

</body>
</html>

<?php

function getColor($character) {
    switch ($character) {
        case 'Homer':
            return '#FFDEAD';
        case 'Marge':
            return '#9ACD32';
        case 'Lisa':
            return '#87CEFA';
        case 'Bart':
            return '#FFA500';
        default:
            return '#CCC';
    }
}

?>
