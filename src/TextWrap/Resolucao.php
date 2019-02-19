<?php

namespace Galoa\ExerciciosPhp\TextWrap;

/**
 * Implemente sua resolução aqui.
 */
class Resolucao implements TextWrapInterface {

  /**
   * {@inheritdoc}
   */
  public function textWrap(string $text, int $length): array {
    $currentline = "";
    $lines = [];
    $array = [];
    $wordnum = 0;
    $array[$wordnum] = "";

    /** itera o laço até o tamanho limite da string */
    for ($i = 0; $i < strlen($text); $i++):
      /**Se encontrar um espaço */
      if($text[$i] == ' ' || ord($text[$i]) == 10):
          if ($array[$wordnum] != "") {
              $wordnum++; //incrementa +1
          }
          $array[$wordnum] = "";
      else:
          $array[$wordnum] = $array[$wordnum] . $text[$i];
        endif;
    endfor;

    for($i = 0; $i < count($array); $i++):
      /** se a palavra for maior que a linha ($currentline) */
      if (strlen($array[$i]) / $length > 1):
        /** verifica se existe uma linha anterior e se existe finaliza */
        if (strlen($currentline) != 0):
          array_push($lines, $currentline);
        endif;
        $numlines = (strlen($array[$i]) / $length);
        
        for ($n = 0; $n < $numlines; $n++):
          $currentline = substr($array[$i], $n * $length, $length);
          array_push($lines, $currentline);
        endfor;
        $currentline = "";

        if (strlen($array[$i]) % $length != 0):
          $currentline = substr($array[$i], $numlines * $length, $length);
        endif;
      /** se o tamanho do array + o tamanho da linha atual for menor que o tamanho limite da linha*/
      elseif ((strlen($array[$i]) + strlen($currentline)) < $length):
        (strlen($currentline) == 0) ? $currentline = $array[$i] : $currentline = $currentline . " " . $array[$i]; // ternário
      else: /** se não, muda de linha */
        array_push($lines, $currentline);
        $currentline = $array[$i]; /** linha atual recebe proximas palavras */
      endif;
    endfor;
    
    array_push($lines, $currentline);
    return $lines;
  }
}
