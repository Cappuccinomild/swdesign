<?php

// 세션을 시작합니다.
// 로그인용
session_start();

// class를 이용한 객체 지향 방식
class Layout

{
	private $title="Travel"; // 웹 페이지 제목

	private $menu = array('Outer'=>'outer', 'Top'=>'top', 'Pants'=>'pants');

	public $link; // CSS 링크 태그

	public $style; // 스타일 적용

	public $content; // 메인 컨텐츠

  private $login; // 로그인이나 로그아웃을 출력

	private $mypage; //마이페이지용 변수


	// 레이아웃을 출력

	public function LayoutMain()

	{
		echo "<!DOCTYPE html>\n<html lang='ko'>";

		echo "<head>\n<meta charset='utf-8'/>";

		echo "<title>".$this->title."</title>";

		echo $this->LayoutStyle(); // 스타일을 레이아웃에 추가.

		echo "</head>\n<body>\n<div id='container'>";

		echo	$this->LayoutHeader(); // 헤더 부분을 레이아웃에 추가

		echo	$this->LayoutContent(); // 컨텐츠 부분을 레이아웃에 추가

		echo "</div></body>\n</html>";

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
		"<header>

			<div id='logo'><a href = '/'><img src='/images/logo2.png' alt='ilsa1002입니다' title='ilsa1002' id='logoimg' width='270px' height='80px' /></a></div>

			<div id='navset'>
			<nav id='menu'>
		";

				$this->LayoutMenu($this->menu); // $menu 배열을 이용해서 메뉴 부분을 호출
				echo
			"</nav>

				<nav id='login'>".$this->login."</nav>
				<nav id='mypage'>".$this->mypage."</nav>

			</div>

			<div class='ad_1'>

				// hello

			</div>
		</header>";

	}

	public function LayoutMenu($menu) // 배열과 <li> 을 이용해서 메뉴 부분을 호출

	{

		while (list($key, $value) = each($menu))

		{

			$this->ThisMenu($key, $value);

  	}

	}



	public function ThisMenu($key, $value) //받아온 값으로 메뉴를 출력함

	{

		if(strpos($_SERVER['REQUEST_URI'], $value)==false)

		{

			$thismenu = "<li><a href='./cate.php?cate_id=".$value."'>".$value."</a></li>";

		} else

		{

			$thismenu = "<li><b style='border-bottom:4px solid #ff9090;'>".$value."</b></li>";

		}

		echo $thismenu;

	}

	// 로그인을 출력할 지 로그아웃을 출력할 지 결정

	public  function LayoutLogin()

	{

		if($_SESSION['id']=="")

		{

			if(strpos($_SERVER['PHP_SELF'], "login.php"))

			{

				$this->login="<a href='/registi.php'>회원가입</a><b style='border-bottom:3px solid #90bbff;'>로그인</b>";

			} else

			{
				if(strpos($_SERVER['PHP_SELF'], "registi.php")){
					$this->login="<b style='border-bottom:3px solid #90bbff;'>회원가입</b><a href='/login.php'>로그인</a>";
				}
				else{
					$this->login="<a href='/registi.php'>회원가입</a><a href='/login.php'>로그인</a>";
				}
			}

		} else

		{

			$this->login="<a href='./logout.php'>Logout</a>";

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
			if($_SESSION['regist_type']=="customer"){
				$this->mypage="<a href='/customer'>마이페이지</a>";
			}
			else if($_SESSION['regist_type']=="designer"){
				$this->mypage="<a href='/designer'>마이페이지</a>";
			}
			else if($_SESSION['regist_type']=="admin"){
				$this->mypage="<a href='/admin'>마이페이지</a>";
			}

		}

	}


	// 내용을 추가

	public function LayoutContent()

	{

		echo "<section><article>".$this->content."</article>";

	}

}

?>
