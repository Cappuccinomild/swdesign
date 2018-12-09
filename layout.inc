<?php
// 세션을 시작합니다.
// 로그인용
session_start();
// class를 이용한 객체 지향 방식
class Layout
{
   private $title="일사천리"; // 웹 페이지 제목
//   private $menu = array('Outer'=>'outer', 'Top'=>'top', 'Pants'=>'pants'); //상단에 있는 메뉴
   public $link; // CSS 링크 태그
   public $style; // 스타일 적용
   public $content; // 메인 컨텐츠
     private $login; // 로그인이나 로그아웃을 출력
   private $mypage; //마이페이지용 변수
   // 레이아웃을 출력
   public function LayoutMain()
   {
      echo "<!DOCTYPE html>\n<html lang='ko'>";
      echo "<head>\n<link href='https://fonts.googleapis.com/css?family=Roboto' rel='stylesheet'> <link href='https://fonts.googleapis.com/css?family=Do+Hyeon' rel='stylesheet'> <link href='https://fonts.googleapis.com/css?family=Poor+Story' rel='stylesheet'> <link href='https://fonts.googleapis.com/css?family=Sunflower:300' rel='stylesheet'>\n<meta charset='utf-8'/>";
      echo "<title>".$this->title."</title>";
      echo $this->LayoutStyle(); // 스타일을 레이아웃에 추가.
      echo "</head>\n<body>\n <fieldset style='width: 73.8%; margin-left: auto; margin-right: auto; border-style: none;'><div id='container'>";
      echo   $this->LayoutHeader(); // 헤더 부분을 레이아웃에 추가
      echo   $this->LayoutContent(); // 컨텐츠 부분을 레이아웃에 추가
      echo "</div></fieldset></body>\n</html>";
   }
   // 스타일을 추가
   public function LayoutStyle()
   {
      echo "<link rel='stylesheet' type='text/css' href='".$this->link."'/> ";
      echo "<style>".$this->style."</style>";
   }
//abcd
   // 헤더 부분 추가
   public function LayoutHeader()
   {
      $this->LayoutLogin();
      $this->LayoutMypage();
      echo
      "<nav id='topbar'>
         <ul>
            <li>".$this->login."</li>
            <li>".$this->mypage."</li>
         </ul>
      </nav>
      <div id='logo'><a href = '/'><img src='/images/logo2.png' alt='ilsa1002입니다' title='ilsa1002' style='width: 500px' /></a></div>
      <hr />
      <nav id='menubar'>";
         $this->LayoutMenu(); // $menu 배열을 이용해서 메뉴 부분을 호출
      "</nav>";
   }
   public function LayoutMenu() // 배열과 <li> 을 이용해서 메뉴 부분을 호출
   {
      echo "<li class='category-list'><a class='category-link' href='./cate.php?cate_id=outer'>아우터</a></li>";
      echo "<li class='category-list'><a class='category-link' href='./cate.php?cate_id=top'>상의</a></li>";
      echo "<li class='category-list'><a class='category-link' href='./cate.php?cate_id=pants'>바지</a></li>";
      echo "<li class='category-list'><a class='category-link' href='./cate.php?cate_id=skirt'>스커트</a></li>";
      echo "<li class='category-list'><a class='category-link' href='./cate.php?cate_id=shoes'>신발</a></li>";
      echo "<li class='category-list'><a class='category-link' href='./cate.php?cate_id=accessory'>악세사리</a></li>";
      echo "<li class='category-list'><a class='category-link' href='./cate.php?cate_id=etc'>잡화</a></li>";
   }
   // 로그인을 출력할 지 로그아웃을 출력할 지 결정
   public  function LayoutLogin()
   {
      if($_SESSION['id']=="")
      {
         if(strpos($_SERVER['PHP_SELF'], "login.php"))
         {
            $this->login="<a href='./registi.php'>회원가입</a><a href='./login.php'><b style='color:#b3b2b2;'>로그인</b></a>";
         } else
         {
            if(strpos($_SERVER['PHP_SELF'], "registi.php")){
               $this->login="<a href='./registi.php'><b style='color:#b3b2b2;'>회원가입</b></a><a href='./login.php'>로그인</a>";
            }
            else{
               $this->login="<a href='./registi.php'>회원가입</a><a href='./login.php'>로그인</a>";
            }
         }
      } else
      {
         $this->login="<a href='./logout.php'>로그아웃</a>";
      }
   }
   public function LayoutMypage(){
      if($_SESSION['id']=="")
      {
         $this->mypage="<a href='./login.php'>마이페이지</a>";
         //echo "<script>alert('로그인 후 이용 가능합니다. 로그인 화면으로 이동합니다.');location.replace('./login.php');</script>";
      }
      else
      {
         $this->mypage="<a href='./".$_SESSION['regist_type'].".php'>마이페이지</a>";
      }
   }
   // 내용을 추가
   public function LayoutContent()
   {
      echo "<hr /><section><article>".$this->content."</article>";
   }
}
?>
