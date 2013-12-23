<!DOCTYPE html>
<html lang="en-US">
<head>
    <meta charset="UTF-8"/>
    <meta name="viewport" content="initial-scale=1.0, minimum-scale=1.0, maximum-scale=1.0"/>
    <meta name="description" content=""/>
    <meta name="keywords" content=""/>
    <meta name="author" content=""/>
    <title>RCA Asigurat - versiunea 2.0</title>
    <link rel="icon" href="http://soon.template.dev2lead.com/resources/images/favicon.ico"/>
    <link rel="stylesheet" href="http://soon.template.dev2lead.com/resources/css/style.css"/>
    <link rel="stylesheet" href="http://soon.template.dev2lead.com/resources/css/framework.css"/>
    <script type="text/javascript" src="http://soon.template.dev2lead.com/resources/js/jquery.js"></script>
    <script type="text/javascript" src="http://soon.template.dev2lead.com/resources/js/spin.js"></script>
    <script type="text/javascript">
    var _DATE = "March 29, 2014 00:00:00";
    var _BACKGROUND = "rgba(255, 255, 255, 0.50)";
    var _FOREGROUND = "rgba(255, 255, 255, 0.75)";
    var _TEXT = "rgba(0, 0, 0, 1.00)";
    var _CAPTION = true;
    var _LATITUDE = 45.81187;
    var _LONGITUDE = 4.72014;

    (function ($) {
        $.fn.spinload = function (opts) {
            var element = this;
            var spinner = new Spinner({
                "lines": 10,
                "length": 10,
                "width": 5,
                "radius": 20,
                "corners": 1,
                "rotate": 0,
                "direction": 1,
                "color": "#FFFFFF",
                "speed": 1,
                "trail": 50,
                "shadow": false,
                "hwaccel": false,
                "className": "spinner",
                "zIndex": 0,
                "top": "auto",
                "left": "auto"
            }).spin($(element).find(".spinload").get(0));

            $(window).bind("load", function (event) {
                setTimeout(function () {
                    $(element).find(".spinload").remove();
                }, 1000);
            });
            return (this);
        }
    })(jQuery);

    (function ($) {
        $.fn.placeholder = function (opts) {
            var element = this;

            $(window).bind("load", function (event) {
                $("[placeholder]").each(function (index) {
                    var selection = this;

                    $(selection).val($(selection).val() == "" ? $(selection).attr("placeholder") : $(selection).val());
                });
                $("[placeholder]").bind("focus", function (event) {
                    var selection = this;

                    $(selection).val($(selection).val() == $(selection).attr("placeholder") ? "" : $(selection).val());
                });
                $("[placeholder]").bind("blur", function (event) {
                    var selection = this;

                    $(selection).val($(selection).val() == "" ? $(selection).attr("placeholder") : $(selection).val());
                });
            });
            return (this);
        }
    })(jQuery);

    (function ($) {
        $.fn.substitute = function (html) {
            var element = this;
            var status = false;

            $(element).find(".button").bind("click", function (event) {
                if ($(element).find(".data").find(".field").size() != 0) {
                    $(element).find(".data").find(".field").each(function (index) {
                        var selection = this;

                        $(selection).attr("class", $(selection).val() == $(selection).attr("placeholder") ? "field error" : "field");
                    });
                }
                if ($(element).find(".data").find(".error").size() == 0) {
                    if (status == false) {
                        status = true;
                        if (html) {
                            $.ajax({
                                "url": $(element).find(".data").attr("action"),
                                "type": $(element).find(".data").attr("method"),
                                "data": $(element).find(".data").serialize(),
                                "success": function (data) {
                                    if ($(html).size() != 0) {
                                        $(element).find(".button").replaceWith(html);
                                        status = false;
                                    }
                                }
                            });
                        }
                        else {
                            $(element).find(".data").submit();
                        }
                    }
                }
                return (false);
            });
            return (this);
        };
    })(jQuery);

    (function ($) {
        $.fn.engine = function (opts) {
            var element = this;
            var id = 0;
            var ratio = Math.round(window.devicePixelRatio ? window.devicePixelRatio : 1);
            var diff = (new Date(_DATE).getTime() - new Date().getTime()) / 1000;
            var d = Math.floor(diff / 86400);
            var h = Math.floor(diff % 86400 / 3600);
            var m = Math.floor(diff % 86400 % 3600 / 60);
            var s = Math.floor(diff % 86400 % 3600 % 60 / 1);
            var cvs = $(element).find(".clock").get(0);
            var ctx = cvs.getContext("2d");
            var img = $("<img/>").attr("src", "resources/images/arrow.png");
            var count = 0;
            var fn = function () {
                cvs.width = $(element).width() * ratio;
                cvs.height = $(element).height() * ratio;
                ctx.clearRect(0, 0, cvs.width, cvs.height);
                setTimeout(function () {
                    ctx.drawImage($(img).get(0),
                        (cvs.width - (cvs.height / 8 <= 100 * ratio ? cvs.height / 8 : 100 * ratio)) / 2,
                        (cvs.height - (cvs.height / 8 <= 100 * ratio ? cvs.height / 8 : 100 * ratio)) / 1,
                        (cvs.height / 8 <= 100 * ratio ? cvs.height / 8 : 100 * ratio),
                        (cvs.height / 8 <= 100 * ratio ? cvs.height / 8 : 100 * ratio)
                    );
                }, 500);
                $([
                    {
                        "caption": ("00" + s).slice(-2) + " sec",
                        "percent": (1 / 60) * s
                    }, {
                        "caption": ("00" + m).slice(-2) + " min",
                        "percent": (1 / 60) * m
                    }, {
                        "caption": ("00" + h).slice(-2) + " ore",
                        "percent": (1 / 24) * h
                    }, {
                        "caption": ("00" + d).slice(-2) + " zile",
                        "percent": (1 / 365) * d
                    }
                ]).each(function (index) {
                        var obj = this;
                        var radius = cvs.width <= cvs.height ? cvs.width / 2 / 10 : cvs.height / 2 / 10

                        ctx.beginPath();
                        ctx.arc((cvs.width / 2), (cvs.height / 1.5), (index * radius + radius), (0 * Math.PI), (2 * Math.PI));
                        ctx.lineWidth = (radius * 0.75);
                        ctx.strokeStyle = _BACKGROUND;
                        ctx.stroke();
                        ctx.closePath();
                        ctx.beginPath();
                        ctx.arc((cvs.width / 2), (cvs.height / 1.5), (index * radius + radius), (1.5 * Math.PI), (1.5 * Math.PI) + (2 * Math.PI * obj.percent));
                        ctx.lineWidth = (radius * 0.75);
                        ctx.strokeStyle = _FOREGROUND;
                        ctx.stroke();
                        ctx.closePath();
                        ctx.beginPath();
                        ctx.font = (radius * 0.50) + "px OpenSans, Helvetica, Arial";
                        ctx.textAlign = "center";
                        ctx.fillStyle = _TEXT;
                        ctx.fillText((_CAPTION ? obj.caption : new String()), (cvs.width / 2), (cvs.height / 1.5) + (index * radius + radius) + (radius / 6));
                        ctx.closePath();
                    });
                if (--s < 0 && (s = s + 60)) {
                    if (--m < 0 && (m = m + 60)) {
                        if (--h < 0 && (h = h + 24)) {
                            if (--d < 0 && (d = d + 365)) {
                                clearInterval(id);
                            }
                        }
                    }
                }
            };

            fn();
            id = setInterval(function () {fn();}, 1000);
            $(window).bind("load resize scroll", function (event) {
                var opacity = Math.round((1 - 2 / $(element).height() * $(window).scrollTop()) * 100) / 100;
                var margin = Math.round($(element).height() / 10 - $(window).scrollTop() / 4);

                $(element).find(".content").css({"margin": margin + "px auto 0 auto", "opacity": opacity >= 0 ? opacity : 0});
                $(element).find(".clock").css({"opacity": opacity >= 0 ? opacity : 0});
            });
            return (this);
        }
    })(jQuery);

    (function ($) {
        $.fn.anim = function (opts) {
            var element = this;
            var delay = 5000;
            var current = 0;
            var fn = function () {
                $(element).find(".slide").each(function (index) {
                    var selection = this;

                    $(selection).css({"z-index": (index == current ? 1000 : 0), "opacity": (index == current ? 0.5 : 0)});
                });
                current = current + 1;
                current = current == $(element).find(".slide").size() ? 0 : current;
            };

            $(window).bind("load", function (event) {
                fn();
                setInterval(function () {fn();}, delay);
            });
            return (this);
        }
    })(jQuery);

    (function ($) {
        $.fn.draw = function (opts) {
            var element = this;
            var latitude = _LATITUDE;
            var longitude = _LONGITUDE;

            $(window).bind("load resize", function (event) {
                $(element).find(".content").width("100%");
                $(element).find(".content").height($(window).height());
                new google.maps.Marker({
                    "icon": {
                        "url": "resources/images/marker.png",
                        "size": new google.maps.Size(64, 64),
                        "scaledSize": new google.maps.Size(64, 64)
                    },
                    "position": new google.maps.LatLng(latitude, longitude),
                    "map": new google.maps.Map($(element).find(".content").get(0), {
                        "center": new google.maps.LatLng(latitude, longitude),
                        "zoom": 10,
                        "mapTypeId": google.maps.MapTypeId.ROADMAP,
                        "mapTypeControl": false,
                        "scrollwheel": false,
                        "draggable": false
                    })
                });
            });
            return (this);
        };
    })(jQuery);

    (function ($) {
        $.fn.effect = function (opts) {
            var element = this;

            $(element).children().each(function (index) {
                var selection = this;
                var opacity = Math.round((1 / $(selection).offset().top) * ($(window).height() / 2 + $(window).scrollTop()) * 100) / 100;

                $(selection).find(".effect").css({"opacity": opacity >= 1 ? 1 : 0});
            });
            return (this);
        };
    })(jQuery);

    $(function () {
        $(document).spinload();
        $(document).placeholder();
        $(window).bind("load resize", function (event) {
            $(".interface").css({"margin": $(window).height() + "px 0 0 0"});
        });
        $(window).bind("load resize scroll", function (event) {
            $(".interface").effect();
        });
    });
    </script>
    <script type="text/javascript" src="http://soon.template.dev2lead.com/resources/js/analytics.js"></script>
</head>
<body>
<div class="spinload"></div>
<div id="gallery">
    <canvas class="clock"></canvas>
    <div class="slide slow" style="background-image: url(http://soon.template.dev2lead.com/resources/images/slide-1.jpg); background-size: cover;"></div>
    <div class="slide slow" style="background-image: url(http://soon.template.dev2lead.com/resources/images/slide-2.jpg); background-size: cover;"></div>
    <div class="slide slow" style="background-image: url(http://soon.template.dev2lead.com/resources/images/slide-3.jpg); background-size: cover;"></div>
    <div class="slide slow" style="background-image: url(http://soon.template.dev2lead.com/resources/images/slide-4.jpg); background-size: cover;"></div>
    <div class="content">
        <div class="wrap large">
            <h1 class="soon">RCA Asigurat</h1>
            <h2 class="thematic">Versiunea 2.0 in curand.</h2>
        </div>
    </div>
    <script type="text/javascript">
        $(function () {
            $("#gallery").engine();
            $("#gallery").anim();
        });
    </script>
</div>