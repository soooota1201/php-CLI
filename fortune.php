<?php

$dayoffortune = new DayOfFortune();
echo $dayoffortune->answer();

class DayOfFortune {

  protected function fortune()
  {
    $fortune = array(
      "大吉",
      "中吉",
      "小吉",
      "吉",
      "末吉",
      "凶",
      "大凶"
    );

    $count = count($fortune);
    $random = rand(0, $count - 1);

    echo $fortune[$random];
  }

  public function answer()
  {
    $answer = $this->fortune();
    echo $answer . "\n";
    if($answer === '大吉') {
      echo '最高やな';
    } else {
      echo 'ぼちぼちいこか';
    }
  }
}