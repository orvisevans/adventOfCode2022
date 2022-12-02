<?php
# https://adventofcode.com/2022/day/1#part2

function main() {
  $file = "calorie-counting-input.txt";
  
  # Load a file's contents to a string
  $contents = file_get_contents($file);
  
  # split the string with a delimeter
  $lines = explode("\n", $contents);

  # add an extra empty line at the end to make sure we consider the last elf's sum
  $lines[] = "";
  
  # We want the sums for the 3 elves carrying the most
  $maxElfSums = [0, 0, 0];
  $currentElfSum = 0;
  
  # Loop through the entries
  foreach($lines as $entry) {
    if (empty($entry)) {
      # At an empty line, remember the max sums for the 3 max of [last & 3max] elves.
      $toCompare = array_merge([$currentElfSum], $maxElfSums);
      $maxElfSums = max3Entries($toCompare);
  
      # Reset the elf sum in prep for the next elf
      $currentElfSum = 0;
    } else {
      # Add to the current elf's sum
      $currentElfSum += (int)$entry;
    }
  }

  # Sum the top 3 elves
  $sumTop3 = array_sum($maxElfSums);
  
  # echo out
  echo $sumTop3;
  echo "\n";
}

function max3Entries($arr) {
  # Sort in reverse order
  rsort($arr);

  #return 3 highest-value entries
  $slice = array_slice($arr, 0, 3);
  return $slice;
}

main();