<html lang="en">
	<head>
		<meta charset="utf-8">

		<!-- Always force latest IE rendering engine (even in intranet) & Chrome Frame
		Remove this if you use the .htaccess -->
		<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">

		<title>jscript</title>
		<meta name="description" content="">
		<meta name="author" content="bcarlston">

		<meta name="viewport" content="width=device-width; initial-scale=1.0">

		<!-- Replace favicon.ico & apple-touch-icon.png in the root of your domain and delete these references -->
		<link rel="shortcut icon" href="/favicon.ico">
		<link rel="apple-touch-icon" href="/apple-touch-icon.png">

        <link type="text/css" rel="stylesheet" href="style.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
        <script>
            $(document).ready(function()
            {
                var count = 0;
                $("p").css("color", "red");
                $("#para1").css("color", "blue");
                $(".paraCl").css("color", "orange");
                $('[title*="maindiv"]').css("color","purple");


                $("#hide1").click(function(){
                    $("#hider").hide();
                });
                $("#picbutton").click(function(){
                    if(count%2==0){
                        $(".paraCl").css("color", "yellow");
                    }else{
                        $(".paraCl").css("color", "orange");
                    }
                    count++;
                });
                $("#picbutton").hover(
                    function(){
                        $(".paraCl").css("background-color", "black");
                    },function(){
                        $(".paraCl").css("background-color", "white");
                    }
                );
                $("#spoil").click(function(){

                    $("#reveal").html("<h2>The butler did it</h2>");
                });
                $("#anc1").attr(
                {
                    href: "http://www.google.com",
                    target: "_blank"
                });
                $("#picbutton3").click(function(){

                    $(".paraCl").css("color", "yellow");
                    $("#content").append("<br>Here is more stuff!");
                });
                $("#picbutton4").click(function(){
                    $("#elementwrap").wrap("<h1></h2>");
                    $("#elwrap").wrap("<a href='http://www.google.com'></a>");
                });
                $("#picbutton5").on("click",function(event){
                    $("#wrap3").wrap("<h3></h3>");
                });
                $("#picbutton6").on("click",function(event){
                    var enterD = prompt("Enter Some Data");
                    $("#para5").append("<h2>" + enterD + "</h2>");
                });
                var myObj = {first:1, second:2, third:3, fourth:4};
                $.each(myObj,function(i,val){
                    $('#' + i).append("The Value of " + i + " is " +val);
                });

            });
        </script>
	</head>
    <body>
        <p id="para1" class="paraCl" onclick="alert('hello there')">this is a test of the emergency broadcast system I hope that I will be able to hear the sound of my voice</p>
        <p id="para2" class="paraCl">This is para two that has all sorts of important information how do I look</p>
        <div id="div1" class="divclass" title="maindiv"> This is the main div that I am using to learn more about jquery right now I am coming up short.</div>
        <div id="hider">This is the div that I will be hiding</div>
        <h2 id="hide1">Click to make div appear</h2>
        <img src="http://lorempicsum.com/futurama/400/200/2" id="picbutton">
        <p id="para3">
            here is the review of the movie if you want to know the ending
            <a href="#" id="spoil">Click Here</a>

            <div id="reveal"> </div>
            this was a decent movie
        </p>
        <p>
            <a id="anc1">
                <img src="http://lorempicsum.com/futurama/400/200/3" id="picbutton2">
            </a>
            <br>
            <img src="http://lorempicsum.com/futurama/400/200/4" id="picbutton3">
            <p id="content">
                Here is my content look at me.
            </p>
        </p>
    <img src="http://lorempicsum.com/futurama/400/200/5" id="picbutton4">
    <div id="elementwrap">
        here is s a wrap
    </div>
    <div id="elwrap"> another wrap</div>
    <img src="http://lorempicsum.com/simpsons/669/200/5" id="picbutton5">
    <div id="wrap3">yet another wrap</div>
    <img src="http://lorempicsum.com/simpsons/669/200/4" id="picbutton6">
    <div id="para5">you are going to add to me</div>
    <div id="first"></div>
    <div id="second"></div>
    <div id="third"></div>
    <div id="fourth"></div>
    </body>
</html>
