<!doctype html>
<html lang="en">

<head>
    <title>บริษัท ยะลานํารุ่ง จํากัด</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link href="https://fonts.googleapis.com/css?family=Lato:300,400,700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="login/css/style.css">
    <link rel="icon" type="image/png" href="images/logo.png"/>

    <link rel='stylesheet' href='https://use.fontawesome.com/releases/v5.7.0/css/all.css' integrity='sha384-lZN37f5QGtY3VHgisS14W3ExzMWZxybE1SJSEsQp9S+oqd12jhcu+A56Ebc1zFSJ' crossorigin='anonymous'>


</head>
<style>
      @import url('https://fonts.googleapis.com/css2?family=Kanit:wght@700&display=swap');

    body,
    h2,
    h3,
    button {
        font-family: 'Kanit', sans-serif;
    }
</style>

<div class="container">
    <div class="screen">
        <div class="screen__content">
            <form class="login" action="cheack_login.php" method="post" class="signin-form"> <img src="images/logo1.png" width="170" height="50">

               

                <div class="login__field"  > 
                    <i class="fa fa-user"></i>
                    <input type="email" name="m_email" class="login__input" placeholder="อีเมล" required>
                </div>
                <div class="login__field">
                    <i class="fas fa-unlock-alt"></i>
                    <input type="password" name="m_pass" class="login__input" placeholder="รหัสผ่าน" required>
                </div>
                <button class="button login__submit">
                    <span class="button__text">เข้าสู่ระบบ</span>
                    <i class="button__icon fas fa-chevron-right"></i>
                </button>               
            </form>

          

            <div class="social-login">
                <br>
                <h6>ติดต่อสอบถาม</h5>
                <div class="social-icons">
                    <a href="https://www.facebook.com/yalanumrung/?locale=th_TH" target="_blank"  class="social-login__icon fab fa-facebook" style='font-size:25px'></a>
                    <a href="https://numrungstore.com/?fbclid=IwAR23hGDp52h5KTJ-6KYY94xfuXJDKWUOSE8BzwgU1_cwawlyw1MQdtJtP_o" target="_blank" class="social-login__icon fas fa-globe" style='font-size:25px'></a>
                </div>
            </div>
        </div>
        <div class="screen__background">
            <span class="screen__background__shape screen__background__shape4"></span>
            <span class="screen__background__shape screen__background__shape3"></span>      
            <span class="screen__background__shape screen__background__shape2"></span>
            <span class="screen__background__shape screen__background__shape1"></span>
        </div>      
    </div>
</div>



<script src="login/js/jquery.min.js"></script>
    <script src="login/js/popper.js"></script>
    <script src="login/js/bootstrap.min.js"></script>
    <script src="login/js/main.js"></script>
     <style>


body { 
    overflow: hidden;
      

    background-image: url('images/bg6.png');

  background-size:cover;
        -webkit-animation: slidein 200s;
        animation: slidein 200s;

        -webkit-animation-fill-mode: forwards;
        animation-fill-mode: forwards;

        -webkit-animation-iteration-count: infinite;
        animation-iteration-count: infinite;

        -webkit-animation-direction: alternate;
        animation-direction: alternate;              
}

@-webkit-keyframes slidein {
from {background-position: top; background-size:3000px; }
to {background-position: -100px 0px;background-size:2750px;}
}

@keyframes slidein {
from {background-position: top;background-size:3000px; }
to {background-position: -100px 0px;background-size:2750px;}

}



.center
{
  display: flex;
  align-items: center;
  justify-content: center;
  position: absolute;
  margin: auto;
  top: 0;
  right: 0;
  bottom: 0;
  left: 0;
  background: rgba(75, 75, 250, 0.3);
  border-radius: 3px;
}
.center h1{
  text-align:center;
  color:white;
  font-family: 'Source Code Pro', monospace;
  text-transform:uppercase;

-------------
background: linear-gradient(90deg, #5D54A4, #7C78B8);
background-image:url('images/bg2.png' );
background-size: 100%;
background-origin: content;
background-repeat: repeat;

------------------

}

.container {
    display: flex;
    align-items: center;
    justify-content: center;
    min-height: 50em;

}

.screen {       
    background: linear-gradient(90deg, #c81010, #ffc6c6);       
    position: relative; 
    height: 600px;
    width: 360px;   
    box-shadow: 0px 0px 24px #b0b0b0;  
}

.screen__content {
    z-index: 1;
    position: relative; 
    height: 100%;
}

.screen__background {       
    position: absolute;
    top: 0;
    left: 0;
    right: 0;
    bottom: 0;
    z-index: 0;
    -webkit-clip-path: inset(0 0 0 0);
    clip-path: inset(0 0 0 0);  
}

.screen__background__shape {
    transform: rotate(45deg);
    position: absolute;
}

.screen__background__shape1 {

    height: 520px;
    width: 520px;
    background: #f0f0f0;   
    top: -50px;
    right: 120px;   
    border-radius: 0 72px 0 0;
}

.screen__background__shape2 {
    height: 220px;
    width: 220px;
    background: #ff3939;    
    top: -172px;
    right: 0;   
    border-radius: 32px;
}

.screen__background__shape3 {
    height: 540px;
    width: 190px;
    background: linear-gradient(270deg, #c81010, #ff3939);
    top: -24px;
    right: 0;   
    border-radius: 32px;
}

.screen__background__shape4 {
    height: 400px;
    width: 200px;
    background: #c81010;    
    top: 420px;
    right: 50px;    
    border-radius: 60px;
}

.login {
    width: 320px;
    padding: 30px;
    padding-top: 156px;
}

.login__field {
    padding: 10px 0px;  
 position: static;
}

.login__icon {
    position: absolute;
    top: 30px;
    color: #7875B5;
}

.login__input {
    border: none;
    border-bottom: 2px solid #D1D1D4;
    background: none;
    padding: 10px;
    padding-left: 24px;
    font-weight: 700;
    width: 75%;
    transition: .2s;
}

.login__input:active,
.login__input:focus,
.login__input:hover {
    outline: none;
    border-bottom-color: ##ff5200;
}

.login__submit {
    background: #fff;
    font-size: 14px;
    margin-top: 30px;
    padding: 16px 20px;
    border-radius: 26px;
    border: 1px solid #D4D3E8;
    text-transform: uppercase;
    font-weight: 700;
    display: flex;
    align-items: center;
    width: 100%;
    color: #757575;
    box-shadow: 0px 2px 2px #ff0000;
    cursor: pointer;
    transition: .2s;
}

.login__submit:active,
.login__submit:focus,
.login__submit:hover {
    border-color: #ff0000;
    outline: none;
}

.button__icon {
    font-size: 24px;
    margin-left: auto;
    color: #ff0000;
}

.social-login { 
    position: absolute;
    height: 140px;
    width: 160px;
    text-align: center;
    bottom: 0px;
    right: 0px;
    color: #fff;
}

.social-icons {
    display: flex;
    align-items: center;
    justify-content: center;
}

.social-login__icon {
    padding: 20px 10px;
    color: #fff;
    text-decoration: none;  
    text-shadow: 0px 0px 8px #ff0000;
}

.social-login__icon:hover {
    transform: scale(1.5); color: #ffffff 
} 





