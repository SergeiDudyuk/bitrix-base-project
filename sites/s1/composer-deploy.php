<?php
$commands = array(
    'composer update --no-dev --no-progress'
);

$startTime = microtime(true);

chdir('../..');

foreach ($commands as $command) {
    $tmp = shell_exec($command . " 2>&1 ");
    echo PHP_EOL . '$ ' . $command . PHP_EOL;
    echo $tmp . PHP_EOL;
}

$endTime = microtime(true);
$deployDuration = round($endTime - $startTime);

echo 'Elapsed time: ' . $deployDuration . ' seconds';