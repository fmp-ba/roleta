<!DOCTYPE html>
<html>
        <head><title>Roleta de Descontos</title></head>
        <style>
            html, body, button{
	            font-family:Arial, Dotum, Gulim, "Apple SD Gothic Neo", AppleGothic, sans-serif;
            }

  
            button{border:0;margin:0;padding:0;outline:0;}


            .title{
                margin-top:50px;
                text-align:center;
                font-family: 'Enriqueta', arial, serif; 
                line-height: 1.25; 
                margin: 0 0 10px; 
                font-size: 40px; 
                font-weight: bold;
            }

            .box-roulette{
                position:relative;
                margin:50px auto;
                width:750px;
                height:750px;
                border:10px solid #ccc;
                border-radius:50%;
                background:#ccc;
                overflow:hidden;
            }

            .box-roulette .markers{
                position:absolute;
                left:50%;
                top:0;
                margin-left:-25px;
                width:0;
                height:0;
                border:25px solid #fff;
                border-left-color:transparent;
                border-right-color:transparent;
                border-bottom-color:transparent;
                z-index:9999;
            }

            .box-roulette .roulette{
                position:relative;
                width:100%;
                height:100%;
                overflow:hidden;
            }

            .box-roulette .item{
                position:absolute;
                top:0;
                width:0;
                height:0;
                border:0 solid transparent;
                transform-origin:0 100%;
            }

            .box-roulette .label{
                position:relative;
                left:0;
                top:0;
                color:#000;
                white-space:nowrap;
                transform-origin:0 0;
            }

            .box-roulette .label .text{
                display:inline-block;
                font-size:50px;
                font-weight:bold;
                line-height:1;
                vertical-align:middle;
            }

            .box-roulette .label .text1{
                display:inline-block;
                font-size:20px;
                color: #494949;
                font-weight:bold;
                line-height:1;
                vertical-align:middle;
            }

            .box-roulette .label .text2{
                display:inline-block;
                font-size:28px;
                font-weight:bold;
                line-height:1;
                vertical-align:middle;
            }

            #btn-start{
                display: block;
                position:absolute;
                left:50%;
                top:50%;
                margin:-100px 0 0 -100px;
                width:200px;
                height:200px;
                font-size: 24px;
                font-weight:bold;
                color:#fff;
                background: linear-gradient(180deg,#ce8 57.301293900184845%,#592 100%);
                border-radius:100px;
                box-shadow: 0 12px 24px 0 rgba(0,0,0,0.2), 0 12px 28px 0 rgba(0,0,0,0.19);
                border: 0px;
                z-index:9999;
                cursor:pointer;
            }

            #bt-exp{
                color: #000000;
                font-size: 14px;
            }


        </style>
        <body>
        <p class="title">ROLETA DE DESCONTOS</p>

        <div class="box-roulette">
            <div class="markers"></div>
            <button type="button" id="btn-start">
                ROLETA<br>DE<br>DESCONTO
                <div id="bt-exp">Gire a Roleta<br>
                e ganhe na hora<br>
                um super desconto!</div>
            </button>
            <div class="roulette" id="roulette"></div>
        </div>

        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/1.8.3/jquery.min.js"> </script>
        <script src="https://cdn.sobekrepository.org/includes/jquery-rotate/2.2/jquery-rotate.min.js"> </script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-easing/1.4.1/jquery.easing.min.js"> </script>
        
        <script>
        (function($) {
        $.fn.extend({
    
        roulette: function(options) {
    
            var defaults = {
            angle: 0,
            angleOffset: -45,
            speed: 4000,
            easing: "easeInOutElastic",
            };
    
            var opt = $.extend(defaults, options);
    
            return this.each(function() {
            var o = opt;
    
            var data = [
                        {
                color: '#da402e',
                text: '10%',
                text1: 'desconto',
                text2: ''
                },
                {
                color: '#8ad2e8',
                text: '3%',
                text1: 'desconto',
                text2: ''
                },
                {
                color: '#ff0',
                text: '5%',
                text1: 'desconto',
                text2: ''
                },
                {
                color: '#962c8a',
                text: '',
                text1: '',
                text2: 'Tente <br> outra vez!'
                },
                {
                color: '#ff0',
                text: '5%',
                text1: 'desconto',
                text2: ''
                },
                {
                color: '#8ad2e8',
                text: '3%',
                text1: 'desconto',
                text2: ''
                },
                {
                color: '#da402e',
                text: '10%',
                text1: 'desconto',
                text2: ''
                },
                {
                color: '#8ad2e8',
                text: '3%',
                text1: 'desconto',
                text2: ''
                },
                {
                color: '#ff0',
                text: '5%',
                text1: 'desconto',
                text2: ''
                },
                {
                color: '#962c8a',
                text: '',
                text1: '',
                text2: 'Tente <br> outra vez!'
                }
            ];
    
            var $wrap = $(this);
            var $btnStart = $wrap.find("#btn-start");
            var $roulette = $wrap.find(".roulette");
            var wrapW = $wrap.width();
            var angle = o.angle;
            var angleOffset = o.angleOffset;
            var speed = o.speed;
            var esing = o.easing;
            var itemSize = data.length;
            var itemSelector = "item";
            var labelSelector = "label";
            var d = 360 / itemSize;
            var borderTopWidth = wrapW;
            var borderRightWidth = tanDeg(d);
    
            for (i = 1; i <= itemSize; i += 1) {
                var idx = i - 1;
                var rt = i * d + angleOffset;
                var itemHTML = $('<div class="' + itemSelector + '">');
                var labelHTML = '';
                    labelHTML += '<p class="' + labelSelector + '">';
                    labelHTML += '	<span class="text">' + data[idx].text + '<\/span>';
                    labelHTML += '  <span class="text1">' + data[idx].text1 + '<\/span>';
                    labelHTML += '  <span class="text2">' + data[idx].text2 + '<\/span>';
                    labelHTML += '<\/p>';
    
                $roulette.append(itemHTML);
                $roulette.children("." + itemSelector).eq(idx).append(labelHTML);
                $roulette.children("." + itemSelector).eq(idx).css({
                    "left": wrapW / 2,
                    "top": -wrapW / 2,
                    "border-top-width": borderTopWidth,
                    "border-right-width": borderRightWidth,
                    "border-top-color": data[idx].color,
                    "transform": "rotate(" + rt + "deg)"
                });
    
                var textH = parseInt(((2 * Math.PI * wrapW) / d) * .5);
    
                $roulette.children("." + itemSelector).eq(idx).children("." + labelSelector).css({
                    "height": textH + 'px',
                    "line-height": textH + 'px',
                    "transform": 'translateX(' + (textH * 1.9) + 'px) translateY(' + (wrapW * -.4) + 'px) rotateZ(' + (90 + d * .4) + 'deg)'
                });
    
            }
    
            function tanDeg(deg) {
                var rad = deg * Math.PI / 180;
                return wrapW / (1 / Math.tan(rad));
            }
    
    
            $btnStart.on("click", function() {
                rotation();
            });
    
            function rotation() {
    
                var completeA = 360 * r(5, 10) + r(0, 360);
    
                $roulette.rotate({
                angle: angle,
                animateTo: completeA,
                center: ["50%", "50%"],
                easing: $.easing.esing,
                callback: function() {
                    var currentA = $(this).getRotateAngle();
    
                    console.log(currentA);
    
                },
                duration: speed
                });
            }
    
            function r(min, max) {
                return Math.floor(Math.random() * (max - min + 1)) + min;
            }
    
            });
        }
        });
    })(jQuery);
    
    $(function() {
    
        $('.box-roulette').roulette();
    
    });
    </script>
    </body>
</html>