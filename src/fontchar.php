<?php

class FontChar
{
  static public function GetChar($item, $class = "")
  {
    $caracGen = new FontChar();
    return "<span class='".$class." css_char ".$item."'>".$caracGen->$item()."</span>";
  }

  public function a()
  {
    return "
      <span class='outside split_vert'></span>
      <span class='inside split_horiz'></span>
      <span class='bar fill'></span>
    ";
  }
  

  public function b()
  {
    return "<span class='css_char b'>
        <span class='top fill'></span>
        <span class='bottom fill'></span>
        <span class='top neg'></span>
        <span class='bottom neg'></span>
      </span>
     ";
  }

  public function c()
  {
    return "<span class='stroke'></span>
              <span class='neg'></span>
            </span>";
  }      
  
  public function d()
  {
    return "<span class='stroke'></span>";
  }

  public function e()
  {
        return "<span class='stroke'></span>
                <span class='fill'></span>";
  }

  public function f()
  {
    return "<span class='stroke'></span>
            <span class='fill'></span>";
  }

  public function g()
  {
    return "<span class='outside stroke'></span>
            <span class='arm stroke'></span>
            <span class='spur split_vert'></span>
            <span class='neg'></span>";
  }
    
  public function h()
  {
        return "<span class='stroke top'></span>
                <span class='stroke bottom'></span>";
  }
  
  public function i()
  {
    return "<span class='fill'></span>";
  }
    
  public function j()
  {
    return "<span class='stroke'></span>
            <span class='neg'></span>";
  }
  
  public function k()
  {
    return "<span class='split_vert'></span>
            <span class='split_horiz'></span>";
  }

  public function l()
  {
    return "<span class='stroke'></span>";
  }

  public function m()
  {
    return "<span class='split_horiz_pos'></span>
            <span class='split_horiz_neg'></span>";
  }

  public function n()
  {
        return "<span class='fill'></span>
                <span class='top_corner split_horiz_neg'></span>
                <span class='bottom_corner split_horiz_neg'></span>";
  }
      
  public function o()
  {
    return "<span class='stroke'></span>";
  }
  
  public function p()
  {
    return "<span class='stroke'></span>
            <span class='fill'></span>";
  }

  public function q()
  {
    return "<span class='stroke'></span>
            <span class='cross_left split_vert'></span>
            <span class='cross_right split_vert'></span>";
  }

  public function r()
  {
    return "<span class='inside split_vert'></span>
            <span class='outside split_vert'></span>
            <span class='stroke'></span>
            <span class='fill'></span>";
  }

  public function s()
  {
    return "<span class='bottom_circle stroke'></span>
            <span class='left neg'></span>
            <span class='top_circle stroke'></span>
            <span class='right neg'>
            <span class='stroke'></span>";
  }

  public function t()
  {
    return "<span class='stem fill'></span>
            <span class='cross fill'></span>";
  }
  
  public function u()
  {
    return "<span class='stroke'></span>";
  }
   
  public function v()
  {
        return "<span class='outside split_vert'></span>
                <span class='inside split_horiz'></span>";
  }

  public function w()
  {
        return "<span class='outside_left split_vert'></span>
                <span class='outside_right split_vert'></span>
                <span class='inside_left split_horiz'></span>
                <span class='inside_right split_horiz'></span>";
  }

  public function x()
  {
        return "<span class='outside split_vert'></span>
                <span class='inside split_horiz'></span>";
  }

  public function y()
  {      
    return "<span class='outside split_vert'></span>
            <span class='inside split_horiz'></span>
            <span class='fill'></span>";
  }


  public function z()
  {
    return "<span class='fill'></span>
            <span class='left split_horiz'></span>
            <span class='right split_horiz'></span>";
  }

  public function question()
  {
    return "<span class='stroke'></span>
          <span class='neg'></span>
          <span class='line fill'></span>
          <span class='dot fill'></span>";
  }

  public function exclam()
  {
    return "<span class='line fill'></span>
            <span class='dot fill'></span>";
  }

  public function period()
  { 
	return "<span class='dot fill'></span>";
  }
	  
}
