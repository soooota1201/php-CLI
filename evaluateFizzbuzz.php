<?php
$evaluateFizzbuzz = new EvaluateFizzbuzz();
$evaluateFizzbuzz->execute();

class EvaluateFizzbuzz {

  //文言の関数
  protected function message($message) {
    echo escapeshellcmd($message) . "\n";
  }

  //入力待ちを表示する関数
  protected function ask($message) {
    $this->message($message);
    return trim(fgets(STDIN));
  }

  protected function listen() {
    $num = $this->ask('1000までの数字を入力してください');

    if(!is_numeric($num)) {
      return false;
    } elseif($num > 1000) {
      return false;
    } else {
      return $num;
    }
  }

  protected function fz($i)
  {
    return $i % 3 === 0 && $i % 5 === 0;
  }

  protected function fizz($i)
  {
    return $i % 3 === 0;
  }

  protected function buzz($i)
  {
    return $i % 5 === 0;
  }

  public function execute() {
    $num = $this->listen();

    if($num === false) {
      $this->message('1000以下の数字を入力してください。');
      return;
    }

    if ($this->fz($num)) {
      echo 'fizzbuzz' . "\n";
    } elseif ($this->fizz($num)) {
      echo 'fizz' . "\n";
    } elseif ($this->buzz($num)) {
      echo 'bizz' . "\n";
    }
    else {
      echo $num . "\n";
      $this->message('普通の数字でっせ');
    }
  }
}