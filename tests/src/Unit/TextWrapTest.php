<?php

namespace Galoa\ExerciciosPhp\Tests\TextWrap;

use Galoa\ExerciciosPhp\TextWrap\Resolucao;
use PHPUnit\Framework\TestCase;

/**
 * Tests for Galoa\ExerciciosPhp\TextWrap\Resolucao.
 *
 * @codeCoverageIgnore
 */
class TextWrapTest extends TestCase {

  /**
   * Test Setup.
   */
  public function setUp() {
    $this->resolucao = new Resolucao();
    $this->baseString = "Se vi mais longe foi por estar de pé sobre ombros de gigantes";
    $this->baseLongString = "Lorem Ipsum é simplesmente uma simulação de texto indústria";
    $this->baseLongString2 = "Existem variações disponíveis de passagens LoremIpsum mas a maioria sofreu algum tipo de alteração";
  }

  /**
   * Checa o retorno para strings vazias.
   *
   * @covers Galoa\ExerciciosPhp\TextWrap\Resolucao::textWrap
   */
  public function testForEmptyStrings() {
    $ret = $this->resolucao->textWrap("", 2018);
    $this->assertCount(1, $ret);
    $this->assertEmpty($ret[0]);
  }

  /**
   * Testa a quebra de linha para palavras curtas.
   *
   * @covers Galoa\ExerciciosPhp\TextWrap\Resolucao::textWrap
   */
  public function testForSmallWords() {
    $ret = $this->resolucao->textWrap($this->baseString, 8);
    $this->assertCount(10, $ret);
    $this->assertEquals("Se vi", $ret[0]);
    $this->assertEquals("mais", $ret[1]);
    $this->assertEquals("longe", $ret[2]);
    $this->assertEquals("foi por", $ret[3]);
    $this->assertEquals("estar de", $ret[4]);
    $this->assertEquals("pé", $ret[5]);
    $this->assertEquals("sobre", $ret[6]);
    $this->assertEquals("ombros", $ret[7]);
    $this->assertEquals("de", $ret[8]);
    $this->assertEquals("gigantes", $ret[9]);
  }

  /**
   * Testa a quebra de linha para palavras curtas.
   *
   * @covers Galoa\ExerciciosPhp\TextWrap\Resolucao::textWrap
   */
  public function testForSmallWords2() {
    $ret = $this->resolucao->textWrap($this->baseString, 12);
    $this->assertCount(6, $ret);
    $this->assertEquals("Se vi mais", $ret[0]);
    $this->assertEquals("longe foi", $ret[1]);
    $this->assertEquals("por estar de", $ret[2]);
    $this->assertEquals("pé sobre", $ret[3]);
    $this->assertEquals("ombros de", $ret[4]);
    $this->assertEquals("gigantes", $ret[5]);
  }

  /**
  * Testa a quebra de linha para palavras longas.
  *
  * @covers Galoa\ExerciciosPhp\TextWrap\Resolucao::textWrap
  */
  public function testForLongWords() {
    $ret = $this->resolucao->textWrap($this->baseLongString, 12);
    $this->assertCount(7, $ret);
    $this->assertEquals("Lorem Ipsum", $ret[0]);
    $this->assertEquals("é", $ret[1]);
    $this->assertEquals("simplesmente", $ret[2]);
    $this->assertEquals("uma", $ret[3]);
    $this->assertEquals("simulação", $ret[4]);
    $this->assertEquals("de texto", $ret[5]);
    $this->assertEquals("indústria", $ret[6]);
  }
  
  /**
  * Testa a quebra de linha para palavras longas.
  *
  * @covers Galoa\ExerciciosPhp\TextWrap\Resolucao::textWrap
  */
  public function testForLongWords2() {
    $ret = $this->resolucao->textWrap($this->baseLongString2, 12);
    $this->assertCount(10, $ret);
    $this->assertEquals("Existem", $ret[0]);
    $this->assertEquals("variações", $ret[1]);
    $this->assertEquals("disponíveis", $ret[2]);
    $this->assertEquals("de passagens", $ret[3]);
    $this->assertEquals("LoremIpsum", $ret[4]);
    $this->assertEquals("mas a", $ret[5]);
    $this->assertEquals("maioria", $ret[6]);
    $this->assertEquals("sofreu algum", $ret[7]);
    $this->assertEquals("tipo de", $ret[8]);
    $this->assertEquals("alteração",$ret[9]);
  }
}
