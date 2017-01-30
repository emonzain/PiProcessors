<?php

class FontChar
{
  static public function GetChar($item, $class = "")
  {
    $caracGen = new FontChar();
    return "<span class='".$class." css_char ".$item."'>".$caracGen->$item."</span>";
  }

  public function a()
  {
    return "
      <span class='outside split_vert'></span>
      <span class='inside split_horiz'></span>
      <span class='bar fill'></span>
    ";
  }
  
  public function k()
  {
    return "
      <span class='outside split_vert'></span>
      <span class='inside split_horiz'></span>
      <span class='bar fill'></span>
    ";
  }
  
  public function p()
  {
    return "
      <span class='outside split_vert'></span>
      <span class='inside split_horiz'></span>
      <span class='bar fill'></span>
    ";
  }
}
