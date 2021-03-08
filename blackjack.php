<?php

$game = new Game();
$game->execute();

class Card {
  public function marks()
  {
    return array("ダイヤ", "ハート", "スペード", "クラブ");
  }

  public function nos()
  {
    return array(1, 2, 3, 4, 5, 6, 7, 8, 9, 10, "J", "Q", "K");
  }
}

class Decks extends Card {
  public function draw()
  {
    $marks = $this->marks();
    $nos = $this->nos();

    $countMarks = count($marks);
    $countNos = count($nos);

    $randomMarks = rand(0, $countMarks -1);
    $randomNos = rand(0, $countNos -1); 

    return [$marks[$randomMarks], $nos[$randomNos]];
  }
}

class PlayerBase extends Decks {
  public function baseDraw($player)
  {
    $draw = $this->draw();
    echo $player . 'の引いたカードは' . $draw[0] . 'の' . $draw[1] . 'です。';
  }

  public function myselfTotal()
  {
    $draw = $this->draw();
    $no = $draw[1];
    $total = array();
    array_push($total, $no);
    $sum = array_sum($total);
    return $sum;
  }
}

class User extends PlayerBase {
  public function userDraw() {
    $this->baseDraw('あなた');
  }
}

class Dealer extends PlayerBase {
  public function dealerDraw()
  {
    $this->baseDraw('ディーラー');
  }
}

class Game {

  protected function message($message)
  {
    echo escapeshellcmd($message) . "\n";
  }

  protected function ask($message)
  {
    $this->message($message);
    return trim(fgets(STDIN));
  }

  public function listen() {
    $answer = $this->ask('カードを引きますか？引く場合はYを、引かない場合はNを入力してください');
    return $answer;
  }

  function execute() {
    $user = new User();
    $dealer = new Dealer();

    $this->message('======================== ブラックジャック =========================');
    $this->message('ゲームを開始します');
    echo $user->userDraw() . "\n";
    echo $user->userDraw() . "\n";
    echo $dealer->dealerDraw() . "\n";
    $this->listen();

    $answer = $this->listen();
    if (!$answer === 'Y' || !$answer === 'N') {
      echo 'YかNを入力してください';
    } elseif ($answer === 'N') {
      echo 'Nです。';
    } else {
      return 'OK';
    }
  }
}