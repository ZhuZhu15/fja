<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js" />
</script>
<style>

.one {
    position: relative;
    width: 200px;
    text-align: center;
}
.two
{
    background: orange;
  /*  display: none;*/
    width: 100%;
    height: 100%;
    position: absolute;
    opacity: 0;
   
   
}
.text {
    position: absolute;
    top: 120px;
    right: 0;
    left: 0;
    font-size: 32px;
    font-weight: bold;
    z-index:9999;
    opacity: 0;
}



@keyframes switch {
    from {
        opacity: 0;
    }
    to {
        opacity: 0.5;
    }
}

@keyframes ply {
    from {
        opacity: 0.5;
    }
    to {
        opacity: 0;
    }
}
@keyframes switch2 {
    from {
        opacity: 0;
    }
    to {
        opacity: 1;
    }
}

@keyframes ply2 {
    from {
        opacity: 1;
    }
    to {
        opacity: 0;
    }
}


.one img {
    width: 200px;
}
</style>


<div class="one">
<div class="text">
привет
</div>
<div class="two">
</div>
<img src="img/1.jpg" >
</div>

<input id="checkBox" type="checkbox"></input>
<script>






$(document).ready(function(){
    $(".one").mouseenter(function(){
        $(".two").css("animation", "switch 0.6s");
        $(".text").css("animation", "switch2 0.6s");
        setTimeout (function(){
            $(".two").css("opacity", "0.5");
            $(".text").css("opacity", "1");
        }, 500); 
    });
    $(".one").mouseleave(function(){
        $(".two").css("animation", "ply 0.6s");
        $(".text").css("animation", "ply2 0.6s");
        setTimeout (function(){
            $(".two").css("opacity", "0");
            $(".text").css("opacity", "0");
        }, 500); 
    });

 
});


</script>