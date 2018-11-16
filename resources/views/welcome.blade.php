<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet" type="text/css">

        <!-- Styles -->
        <style>body {
  font-family: "Roboto";
}

.back {
  background: linear-gradient(120grad, #643986, #98aed5);
  position: absolute;
  width: 100%;
  height: 100%;
}

.registration-form {
  width: 400px;
  position: absolute;
  left: 50%;
  -webkit-transform: translate(-50%, 0%);
          transform: translate(-50%, 0%);
  top: 15%;
  background: transparent;
}
.registration-form header {
  position: relative;
  z-index: 4;
  background: white;
  padding: 20px 40px;
  border-radius: 15px 15px 0 0;
}
.registration-form header h1 {
  font-weight: 900;
  letter-spacing: 1.5px;
  color: #333;
  font-size: 23px;
  text-transform: uppercase;
  margin: 0;
}
.registration-form header p {
  word-spacing: 0px;
  color: #9facb6;
  font-size: 17px;
  margin: 0;
  margin-top: 5px;
}
.registration-form form {
  position: relative;
}
.registration-form .input-section {
  width: 100%;
  position: absolute;
  display: flex;
  left: 50%;
  -webkit-transform: translate(-50%, 0);
          transform: translate(-50%, 0);
  height: 75px;
  border-radius: 0 0 15px 15px;
  overflow: hidden;
  z-index: 2;
  box-shadow: 0px 0px 100px rgba(0, 0, 0, 0.2);
  transition: all 0.2s ease-in;
}
.registration-form .input-section.folded {
  width: 95%;
  margin-top: 10px;
  left: 50%;
  -webkit-transform: translate(-50%, 0);
          transform: translate(-50%, 0);
  z-index: 1;
}
.registration-form .input-section.folded input {
  background-color: #e9e2c0;
}
.registration-form .input-section.folded span {
  background-color: #e9e2c0;
}
.registration-form .input-section.folded + .folded {
  width: 90%;
  margin-top: 20px;
  left: 50%;
  -webkit-transform: translate(-50%, 0);
          transform: translate(-50%, 0);
  z-index: 0;
}
.registration-form .input-section.folded + .folded input {
  background-color: #e1bcef;
}
.registration-form .input-section.folded + .folded span {
  background-color: #e1bcef;
}
.registration-form .input-section.fold-up {
  margin-top: -75px;
}
.registration-form form input {
  background: white;
  color: #8f8fd6;
  width: 80%;
  border: 0;
  padding: 20px 40px;
  margin: 0;
}
.registration-form form input:focus {
  outline: none;
}
.registration-form form input::-webkit-input-placeholder {
  color: #8f8fd6;
  font-weight: 100;
}
.registration-form form input:-ms-input-placeholder {
  color: #8f8fd6;
  font-weight: 100;
}
.registration-form form input::-ms-input-placeholder {
  color: #8f8fd6;
  font-weight: 100;
}
.registration-form form input::placeholder {
  color: #8f8fd6;
  font-weight: 100;
}

.animated-button {
  width: 20%;
  background-color: #d4d4ff;
}
.animated-button span {
  display: flex;
  flex-direction: row;
  justify-content: space-around;
  align-items: center;
  line-height: 75px;
  text-align: center;
  height: 75px;
  transition: all 0.2s ease-in;
}
.animated-button span i {
  font-size: 25px;
  color: #9999f8;
}
.animated-button .next-button {
  background: transparent;
  color: #9999f8;
  font-weight: 100;
  width: 100%;
  border: 0;
}

.next {
  margin-top: -75px;
}

.success {
  width: 100%;
  position: absolute;
  display: flex;
  align-items: center;
  left: 50%;
  -webkit-transform: translate(-50%, 0);
          transform: translate(-50%, 0);
  height: 75px;
  border-radius: 0 0 15px 15px;
  overflow: hidden;
  z-index: 2;
  box-shadow: 0px 0px 100px rgba(0, 0, 0, 0.2);
  transition: all 0.2s ease-in;
  background: limegreen;
  margin-top: -75px;
}
.success p {
  color: white;
  font-weight: 900;
  letter-spacing: 2px;
  font-size: 18px;
  width: 100%;
  text-align: center;
}

        </style>
    </head>
    <body>

<div class="back"></div>
<div class="registration-form">
  <header>
    <h1>Votre code</h1>
    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Minus ipsum fuga rerum rem. Eligendi ipsa dicta nostrum velit, ipsam totam neque laborum consequatur doloribus tempora, adipisci quasi, ab molestiae inventore.</p>
  </header>
  <form>
    <div class="input-section email-section">
      <input class="email" id="code" type="text" placeholder="ENTER YOUR Code" autocomplete="off"/>
      <div class="animated-button"><span class="icon-paper-plane"><i class="fa fa-envelope-o"></i></span><span class="next-button email"><i class="fa fa-arrow-up"></i></span></div>
    </div>


    <div class="success">
      <p>ACCOUNT CREATED</p>
    </div>
  </form>
</div>
<script src="http://code.jquery.com/jquery-latest.min.js"></script>
<script >
$('.email').on("change keyup paste",
  function(){
    if($(this).val()){
      $('.icon-paper-plane').addClass("next");
    } else {
      $('.icon-paper-plane').removeClass("next");
    }
  }
);

$('.next-button').hover(
  function(){
    $(this).css('cursor', 'pointer');
  }
);

$('.next-button.email').click(
  function(){
    var code = $("#code").val();
    $.ajax({
        url:'{{ route("showCadeau")}}',
        data:{
            _token:'{{ csrf_token()}}',
            code:code,
        },
        type:'POST',
        async:false,
        success:function(e)
        {
            $(".success p").html(e);
             $('.email-section').addClass("fold-up");
   $('.success').css("marginTop", 0);
        }
    })

  }
);

$('.password').on("change keyup paste",
  function(){
    if($(this).val()){
      $('.icon-lock').addClass("next");
    } else {
      $('.icon-lock').removeClass("next");
    }
  }
);

$('.next-button').hover(
  function(){
    $(this).css('cursor', 'pointer');
  }
);

$('.next-button.password').click(
  function(){
    console.log("Something");
    $('.password-section').addClass("fold-up");
    $('.repeat-password-section').removeClass("folded");
  }
);

$('.repeat-password').on("change keyup paste",
  function(){
    if($(this).val()){
      $('.icon-repeat-lock').addClass("next");
    } else {
      $('.icon-repeat-lock').removeClass("next");
    }
  }
);

$('.next-button.repeat-password').click(
  function(){
    console.log("Something");
    $('.repeat-password-section').addClass("fold-up");
    $('.success').css("marginTop", 0);
  }
);</script>
    </body>
</html>
