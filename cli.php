<?php 

$app = new App();
$app->execute();

class App 
{
  protected function message($message)
  {
    echo escapeshellcmd($message) . "\n";
  }

  protected function ask($message)
  {
    $this->message($message);
    return trim(fgets(STDIN));
    //標準入力
  }

  protected function listen()
  {
    $age = $this->ask('年齢を入力してください');

    if(!is_numeric($age)) {
      return false;
    } else {
      return $age;
    }
  }

  protected function isAdult($age) {
    return (20 <= $age);
  }

  protected function isOld($age)
  {
    return (80 <= $age);
  }

  public function execute()
  {
    $age = $this->listen();
    if(false === $age) {
      $this->message('年齢を入力して！！');
      return;
    }
    if ($this->isOld($age)) {
      $this->message('ご高齢です。');
    } elseif ($this->isAdult($age)) {
      $this->message('あなたは大人です。');
    } else {
      $this->message('お子ちゃまですね。早く寝なさい！！');
    }
  }
}