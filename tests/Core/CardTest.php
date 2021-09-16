<?php

namespace App\Tests\Core;

use App\Core\CardGame32;
use PHPUnit\Framework\TestCase;
use App\Core\Card;

class CardTest extends TestCase
{

  public function testName()
  {
    $card = new Card('As', 'Trèfle');
    $this->assertEquals('As', $card->getName());
    $card = new Card('2', 'Trèfle');
    $this->assertEquals('2', $card->getName());

  }

  public function testColor()
  {
    $card = new Card('As', 'Trèfle');
    $this->assertEquals('Trèfle', $card->getColor());
    $card = new Card('As', 'Pique');
    $this->assertEquals('Pique', $card->getColor());
  }

  public function testCompareSameCard()
  {
    $card1 = new Card('As', 'Trèfle');
    $card2 = new Card('As', 'Trèfle');
    $this->assertEquals(0, CardGame32::compare($card1,$card2));
  }

  public function testCompareSameNameNoSameColor()
  {
    $card1 = new Card('As', 'Pique');
    $card2 = new Card('As', 'Trèfle');
    $this->assertEquals(+1, CardGame32::compare($card1,$card2));
  }

  public function testCompareNoSameCardNoSameColor()
  {
      $card1 = new Card('As', 'Pique');
      $card2 = new Card('Roi', 'Trèfle');
      $this->assertEquals(+1, CardGame32::compare($card1,$card2));
  }

  public function testCompareNoSameCardSameColor()
  {
      $card1 = new Card('As', 'Coeur');
      $card2 = new Card('Roi', 'Coeur');
      $this->assertEquals(+1, CardGame32::compare($card1,$card2));
  }


  public function testToString()
  {
      $card1 = new Card('As', 'Coeur');
      $card2 = new Card('As', 'Coeur');
      $this->assertEquals(0, CardGame32::compare($card1,$card2));
  }

}
