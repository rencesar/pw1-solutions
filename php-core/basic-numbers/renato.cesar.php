<?php
foreach (range(0, 99) as $i) {
    if ($i < 10) {
      echo "0";
    }
    echo $i." ";
    if (($i+1) % 10 == 0) {
      echo "\n";
    }
}

foreach (range(99, 0) as $i) {
    if ($i < 10) {
      echo "0";
    }
    echo $i." ";
    if ($i % 10 == 0) {
      echo "\n";
    }
}

foreach (range(99, 0) as $i) {
    if ($i % 2 == 0) {
      continue;
    }
    if ($i < 10) {
      echo "0";
    }
    echo $i." ";
    if (($i-1) % 5 == 0) {
      echo "\n";
    }
}
?>