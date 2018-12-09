<?php



require_once './layout.inc';



$base = new Layout;



$base->link = './style.css';

$base->content = "

   <form action='./registo.php' method='post'>
   <div>
      <p> 회원가입 </p>
      <table style='width: 60%;background-color: #ffffff; margin-left: auto; margin-right: auto; border-radius: 5px; height: 500px; border-top: solid; border-bottom:solid;'>

         <tr>

            <td><label for='name' style='font-family: 휴먼모음T; font-size: 20px; color: #000000; float: left;'>가입 유형</label></td>

            <td class='checkbox-registi' style='margin-top:10px;'>
               <input type='radio' name='regist_type' value='customer' /> 고객
                 <input type='radio' name='regist_type' value='designer' /> 디자이너
            </td>

         </tr>

         <tr>

            <td><label for='name' style='font-family: 휴먼모음T; font-size: 20px; color: #000000; float: left;'>이름</label></td>

            <td><input type='text' size='20' name='name' class='text-field' placeholder='이름''/></td>

         </tr>

         <tr>

            <td><label for='id' style='font-family: 휴먼모음T; font-size: 20px; color: #000000; float: left;'>아이디</label></td>

            <td><input type='text' size='16' name='id' class='text-field'  placeholder='아이디'/></td>

         </tr>

         <tr>

            <td><label for='pass1' style='font-family: 휴먼모음T; font-size: 20px; color: #000000; float: left;'>비밀번호</label></td>

            <td><input type='password' size='16' name='pass1' class='text-field'  placeholder='비밀번호'/></td>

         </tr>

         <tr>

            <td><label for='pass2' style='font-family: 휴먼모음T; font-size: 20px; color: #000000; float: left;'>비밀번호 확인</label></td>

            <td><input type='password' size='16' name='pass2' class='text-field'  placeholder='비밀번호 확인'/></td>

         </tr>

         <tr>

            <td><label for='mail' style='font-family: 휴먼모음T; font-size: 20px; color: #000000; float: left;'>이메일</label></td>

            <td><input type='text' size='16' name='mail' class='text-field'  placeholder='example@email.com'/></td>

         </tr>

         <tr>

            <td><label for='phone' style='font-family: 휴먼모음T; font-size: 20px; color: #000000; float: left;'>휴대전화</label></td>

            <td><input type='text' size='20' name='phone' class='text-field' placeholder='휴대전화'/></td>

         </tr>

         <tr>

            <td><label for='address' style='font-family: 휴먼모음T; font-size: 20px; color: #000000; float: left;'>주소</label></td>

            <td><input type='text' size='30' name='address' class='text-field' placeholder='주소''/></td>

         </tr>

         <tr>

            <td colspan='2'><input type='submit' value='회원가입' id='submit-btn'/></td>

         </tr>

         </div>
   </form>

";

$base->LayoutMain();

?>
