<html lang="en">
<head>
  <title>Login Test</title>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
</head>

<style>
    @import url('https://rsms.me/inter/inter-ui.css');
::selection {
  background: #2D2F36;
}
::-webkit-selection {
  background: #2D2F36;
}
::-moz-selection {
  background: #2D2F36;
}
body {
  background: white;
  font-family: 'Inter UI', sans-serif;
  margin: 0;
  padding: 20px;
}
.page {
  background: #e2e2e5;
  display: flex;
  flex-direction: column;
  height: calc(100% - 40px);
  position: absolute;
  place-content: center;
  width: calc(100% - 40px);
}
@media (max-width: 767px) {
  .page {
    height: auto;
    margin-bottom: 20px;
    padding-bottom: 20px;
  }
}
.container {
  display: flex;
  height: 320px;
  margin: 0 auto;
  width: 640px;
}
@media (max-width: 767px) {
  .container {
    flex-direction: column;
    height: 630px;
    width: 320px;
  }
}
.left {
  background: white;
  height: calc(100% - 40px);
  top: 20px;
  position: relative;
  width: 50%;
}
@media (max-width: 767px) {
  .left {
    height: 100%;
    left: 20px;
    width: calc(100% - 40px);
    max-height: 270px;
  }
}
.login {
  font-size: 45px;
  font-weight: 350;
  margin: 50px 40px 40px;
}
.eula {
  color: #999;
  font-size: 14px;
  line-height: 1.5;
  margin: 40px;
}
.right {
  background: #474A59;
  box-shadow: 0px 0px 40px 16px rgba(0,0,0,0.22);
  color: #F1F1F2;
  position: relative;
  width: 50%;
}
@media (max-width: 767px) {
  .right {
    flex-shrink: 0;
    height: 100%;
    width: 100%;
    max-height: 350px;
  }
}
svg {
  position: absolute;
  width: 320px;
}
path {
  fill: none;
  stroke: url(#linearGradient);;
  stroke-width: 4;
  stroke-dasharray: 240 1386;
}
.form {
  margin: 40px;
  position: absolute;
}
label {
  color:  #c2c2c5;
  display: block;
  font-size: 20px;
  height: 16px;
  margin-top: 20px;
  margin-bottom: 5px;
}
input {
    background: dimgray;
    border: 7px;
    color: #ddd;
    font-size: 20px;
    height: 28px;
    line-height: 25px;
    outline: none !important;
    width: 100%;
  /* background: transparent;
  border: 0;
  color: #f2f2f2;
  font-size: 20px;
  height: 30px;
  line-height: 30px;
  outline: none !important;
  width: 100%; */
}
input::-moz-focus-inner { 
  border: 0; 
}
#submit {
  color: #cff2c2;
  margin-top: 40px;
  transition: color 300ms;
}
#submit:focus {
  color: #f2f2f2;
}
#submit:active {
  color: #d0d0d2;
}
</style>





<div class="page">
  <div class="container">
    <div class="left">
      <img src="<?php echo base_url();?> ../../assets/images/eenadupic.jpg" alt="login image" height="32%" width="320px" display="center">
      <div class="login">Login</div>
    </div>
    <div class="right">
        <div class="form">
            <form method="POST" id="lgin" name="lgin">
            <div class="form-group">
                <label for="employecode">Employecode</label>
                <input type="text" id="emplcode" class="form-control" name="emplcode">
                <div class="form-group">
                <label for="password">Password</label>
                <input type="password" class="form-control" id="passwd" name="passwd">
                <input type="button" id="submit" class="form-control" value="Submit" onclick="return loginvalidation()">
                </div>
            </div>
          </form>
        </div>
    </div>
  </div>
</div>




<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>  
        
<script>
  function loginvalidation(){
    var usr = document.forms["lgin"]["emplcode"].value;
    if(usr == "" || usr == null){
        alert("please Enter Username");
        return false;
    }

    var pwd = document.forms["lgin"]["passwd"].value;
    if(pwd == "" || pwd == null){
        alert("please Enter Password");
        return false;
    }

    var data = $("#lgin").serialize();
    alert('welcome');
    $.ajax({
      type: "POST",
      url:"<?php echo base_url(); ?>index.php/loginchk",
      
      data: data,
      success: function (data) {  
        // alert('ooo');
        // return false;
        console.log(data);
        if(data == 100){
          // alert('coming');
          window.location.href = "<?php echo base_url();?>index.php/dashboard";
        }else{
          alert("login failed");
        }
      }
    });
  }
  
</script>