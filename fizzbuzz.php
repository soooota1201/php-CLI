<?php
$fizzbuzz = new Fizzbuzz();
$fizzbuzz->execute();

class Fizzbuzz 
{
  protected function fz($i) {
    return $i % 3 === 0 && $i % 5 === 0;
  }

  protected function fizz($i) {
    return $i % 3 === 0;
  }
  
  protected function buzz($i) {
    return $i % 5 === 0;
  }

  public function execute() {
    $min = 1;
    $max = 100;
  
    for($i=$min; $i<=$max; $i++) {
      if($this->fz($i)) {
        echo 'fizzbuzz' . "\n";
      }
      elseif($this->fizz($i)) {
        echo 'fizz' . "\n";
      }
      elseif($this->buzz($i)) {
        echo 'bizz' . "\n";
      }
      // var_dump($i);
      else {
        echo $i . "\n";
      }
    }
  }
}