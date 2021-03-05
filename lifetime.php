<?php

$lifetime = new LifeTime();
$lifetime->calc();

class LifeTime
{
  protected function message($message)
  {
    echo escapeshellcmd($message) . "\n";
  }

  protected function ask($message)
  {
    $this->message($message);
    return trim(fgets(STDIN));
  }

  protected function listen()
  {
    $age = $this->ask('ご自身の年齢を入力してください。');
    if(!is_numeric($age))
    {
      return false;
    } else {
      return $age;
    }
  }
  
  public function calc()
  {
    $age = $this->listen();
    if($age === false)
    {
      $this->ask('数字を入力してください');
      return;
    }
    $age90 = 90;
    $hoursOfaYear = 24 * 365;
    $restTime = $hoursOfaYear*($age90 - $age);
    echo 'あなたが90歳まで生きるとしたら死ぬまで残り' . $restTime . '時間です。';
  }
}