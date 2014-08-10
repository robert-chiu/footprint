<!DOCTYPE html>
<?php session_start();?>
<html>
  
  <head>
    <title>Footprint | 學習足跡</title>
    <meta charset="UTF-8">
    <link rel="stylesheet" type="text/css" href="style/loginstyle.css">
    <link rel="stylesheet" type="text/css" href="style/buttonstyle.css">
  </head> 

  <body class='body'>
    
    <!--標題欄-->
    <div id="header-bar">
      <div id="header-inner">
        <!--logo-->
        <div id="logo"><a href="http://54.238.182.198/footprint/"><span>Footprint</span></a></div>
        <!--創建帳戶-->
        <div id="signin"><a href="rigister.php"><span>註冊成為會員</span></a></div>
      </div>	
    </div>
   
   <!--主要內容-->
   <div id = "container">
      <div class = "container-range">
      <div class = "event-range">
         <div class = "table">
         <?php
            include("mysql_connect.php");//連結資料庫
            $sql = "select * from target order by target_ctime desc limit 5";//從target資料表提取最新的五筆資料
            $result = mysqli_query($link, $sql);
            while($row= mysqli_fetch_array($result)){
             echo "<div class= 'event'>";
             echo "<div class= 'avatar'>";
             $sql="SELECT * FROM user WHERE user_id='".$row['create_userid']."'";
             $avatar_result = mysqli_query($link, $sql);
             $avatar= mysqli_fetch_array($avatar_result);
             echo "<img class='middleimg' src='".$avatar['avatar']."' alt='personal_img'>";
             echo "</div>";
             echo "<div class='triangle-left'></div><div class='msg'>";
             echo $row['create_user']." <br> ".$row['target'];
              echo "</div>";
               echo "<div class = 'msg_deadline'>期限 ".$row['target_date'];
              echo "</div></div><p></p>";
            }
            mysqli_free_result($result); //釋放佔用的記憶體
          ?>
        </div>
      </div>
      <!--登入欄-->
      <div class="login-range"><div class="table">
      <!--登入-->
      <div class="login">
        <h2>登入</h2>
         <form action="login.php" method="post" class="form">
          <!--email-->
          <div class = "email-div">
           <label for="Email"><strong class="email-label">電子郵件</strong></label>
           <input id="Email" type="email" value="" name="Email" spellcheck="false">
          </div>
          <!--password-->
          <div class="passwd-div">
          <label for="Passwd"><strong class="passwd-label">密碼</strong></label>
          <input id="Passwd" type="password" name="Passwd">
        </div>
        <input value="登入" class="button large blue" type="submit" name="login">
       </form>
     </div></div></div>
     </div>
    </div>

    <!--頁尾-->
    <div id="footer">
   	  <p>2013 | All right reserve | Powered by NDHU CSIE LTLab</p>
    </div>
  </body>
</html>