<?php
# https://adventofcode.com/2022/day/1


$file = "calorie-counting-input.txt";

# Load a file's contents to a string
$contents = file_get_contents($file);

# split the string with a delimeter
$lines = explode("\n", $contents);


$currentElfSum = 0;
$maxElfSum = 0;

# Loop through the entries
foreach($lines as $entry) {
  if (empty($entry)) {
    # Reset at an empty line
    $currentElfSum = 0;
  } else {
    # Add to the current elf's sum
    $currentElfSum += (int)$entry;

    # Remember the largest sum so far
    $maxElfSum = max($currentElfSum, $maxElfSum);
  }
}

echo $maxElfSum;
echo "\n";