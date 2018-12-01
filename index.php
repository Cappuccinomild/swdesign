<?php

      // error_reporting(E_ALL);
      // ini_set('display_errors', '1');

include_once "./layout.inc"; // 레이아웃 include



$base = new Layout; // Layout class 객체를 생성



$base->link='./style.css'; // style.css를 레이아웃에 넣는다


$base->content="<a href='#'>링크</a>내용이 들어가는 부분입니다."; //본문을 만듦



$base->LayoutMain(); //위의 변수들이 입력된 객체를 출력

?>
