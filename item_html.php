<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title></title>
  </head>
  <body>
    <?php

    require_once './layout.inc';
    require_once './db.php';

    $base = new Layout;
    $base->link = './style.css';

    $base->content="
    <table class='item-table'>
      <tr>
         <td><a href = './item.html'><img src='./images/0.jpg' alt='item_demo' title='item_demo' id='itemimg' width='365px' height='450px' style='margin-right: 100px;'/></a> </td>
         <td class='item-text'>상품명 : item_demo<br/>색상 : 검정, 흰색, 파랑<br/>사이즈 : S,M,L<br/>디자이너 : 진호<br/>가격 : 3000 원<br/> </td>
      </tr>
    </table>

    <hr>
      <a href = './item.html'><img src='./images/th0.jpg' alt='item_demo' title='item_demo' id='itemimg' width='1000px' height='2500px' /></a>

    ";
    $base->LayoutMain();

    ?>
  </body>
</html>
