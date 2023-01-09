<?php
$data = [];
$resource = fopen('books.txt','r');
while([$id, $title, $date, $user] = fgetcsv($resource)) {
    $data[$user][] = $title;
}

if (empty($data)) {
    echo "Nothing to show" . PHP_EOL;
    die();
}

$max = 0;
$winner = '';
echo 'Users:' . PHP_EOL;
foreach (array_keys($data) as $user) {
    echo ">> $user" . PHP_EOL;
    if (count($data[$user]) > $max) {
        $max = count($data[$user]);
        $winner = $user;
    }
}
echo PHP_EOL . PHP_EOL;
echo 'Winner:' . PHP_EOL;
echo ">> $winner with $max books" . PHP_EOL;

echo PHP_EOL . PHP_EOL;

echo 'Titles:' . PHP_EOL;
foreach ($data as $user) {
    foreach ($user as $item) {
        echo ">> $item" . PHP_EOL;
    }
}