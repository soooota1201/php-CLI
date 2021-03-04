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
    return $age;
  }

  public function calc()
  {
    $age = $this->listen();
    $age90 = 90;
    $timeOfaYear = 24 * 365;
    $restTime = ($timeOfaYear)*($age90 - $age);
    echo 'あなたが90歳まで生きるとしたら死ぬまで残り' . $restTime . '時間です。';
  }

}