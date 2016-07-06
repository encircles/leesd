
<html>
<head>
    <title>Menu to cross icon</title>
    <link rel="stylesheet" href="styles/style.css">
</head>
<body>
<header>
    <div class="center title">
        <h2>Menu to cross icon</h2>
        <h3>One idea, <span class="howmuch"></span> possibilities</h3>

        <p>Scroll down to discover different ways to do it</p>
    </div>

    <div class="scroll-down">
        <span class="dot"></span>
    </div>

</header>

<section class="sample--1">
    <header>
        <h2>Using CSS backgrounds</h2>
    </header>
    <div class="options">
        <a href="#" class="show_snippet"><strong class="entypo-code"></strong></a>
    </div>

    <div class="snippet">
        <header>
            <a href="#" class="close"><i class="entypo-cancel"></i></a><h4>Copy the snippet</h4>
        </header>
        <pre data-type="html" class="html"><code class="html">&lt;span id="x">&lt;/span></code></pre>
        <pre data-type="css" class="css"><code class="css">span {
                display: block;
                width: 30px;
                height: 30px;
                cursor: pointer;
                border-radius: 0px;
                margin: 15% auto;
                -webkit-transition: all .3s ease, -webkit-transform .2s ease;
                transition: all .3s ease, transform .2s ease;
                background: -webkit-linear-gradient(top, transparent 0%, transparent 20%, #2E313C 20%, #2E313C 23%, transparent 23%, transparent 48%, #2E313C 48%, #2E313C 50%, transparent 47%, transparent 76%, #2E313C 76%, #2E313C 78%, transparent 78%), -webkit-linear-gradient(transparent, transparent);
                background: linear-gradient(to bottom, transparent 0%, transparent 20%, #2E313C 20%, #2E313C 23%, transparent 23%, transparent 48%, #2E313C 48%, #2E313C 50%, transparent 47%, transparent 76%, #2E313C 76%, #2E313C 78%, transparent 78%), linear-gradient(transparent, transparent);
                }
                span:active, span:hover {
                -webkit-transform: scale(0.9);
                -ms-transform: scale(0.9);
                transform: scale(0.9);
                }
                span.clicked {
                background: -webkit-linear-gradient(135deg, transparent 0%, transparent 48%, #2E313C 49%, #2E313C 51%, transparent 51%, transparent 100%), -webkit-linear-gradient(45deg, transparent 0%, transparent 48%, #2E313C 49%, #2E313C 51%, transparent 51%, transparent 100%);
                background: linear-gradient(-45deg, transparent 0%, transparent 48%, #2E313C 49%, #2E313C 51%, transparent 51%, transparent 100%), linear-gradient(45deg, transparent 0%, transparent 48%, #2E313C 49%, #2E313C 51%, transparent 51%, transparent 100%);
                -webkit-transform: rotate(180deg);
                -ms-transform: rotate(180deg);
                transform: rotate(180deg);
                }
                span.clicked:active, span.clicked:hover {
                -webkit-transform: scale(0.9) rotate(180deg);
                -ms-transform: scale(0.9) rotate(180deg);
                transform: scale(0.9) rotate(180deg);
                }
            </code></pre>
        <pre data-type="js" class="js"><code class="js">document.getElementById('x').addEventListener('click', function () {
                if (this.classList.contains('clicked')) {
                this.classList.remove('clicked');
                } else {
                this.classList.add('clicked');
                }
                });</code></pre>

        <footer>
            <a href="#" class="codepen-able"></a>
        </footer>
    </div>

    <div class="sample--showcase">
        <span id="x"></span>
    </div>
</section>

<section class="sample--2">
    <header>
        <h2>Using SVG</h2>
    </header>
    <div class="options">
        <a href="#" class="show_snippet"><strong class="entypo-code"></strong></a>
    </div>
    <div class="snippet">
        <header>
            <a href="#" class="close"><i class="entypo-cancel"></i></a><h4>Copy the snippet</h4>
        </header>
        <pre data-type="html" class="html"><code class="html">&lt;svg width="100" height="100">
                &lt;g id="cross_svg">
                &lt;rect id="Rectangle-1"  x="0" y="0" width="48" height="2" fill="transparent">&lt;/rect>
                &lt;rect id="Rectangle-2"  x="0" y="14" width="48" height="2" fill="transparent">&lt;/rect>
                &lt;rect id="Rectangle-4"  x="0" y="28" width="48" height="2" fill="transparent">&lt;/rect>
                &lt;/g>
                &lt;/svg> </code></pre>
        <pre data-type="css" class="css"><code class="css">svg {
                width: 52px;
                height: 52px;
                z-index: 99999;
                transition: all .3s ease;
                display: block;
                margin: 15% auto;
                cursor: pointer;
                }
                svg g {
                transition: all .3s ease;
                width: 100px;
                height: 100px;
                display: block;
                position: absolute;
                left: 50%;
                top: 50%;
                margin: auto;
                cursor: pointer;
                }
                svg rect {
                transition: all .3s ease;
                fill: #E04681;
                }
                svg g {
                width: 100px;
                height: 100px;
                }
            </code></pre>
        <pre data-type="js" class="js"><code class="js">$(document).ready(function(){

                var svg = $('svg');
                var lines = svg.find('rect');
                var line_first = $('svg rect:nth-child(1)')
                var line_second = $('svg rect:nth-child(2)')
                var line_third = $('svg rect:nth-child(3)')
                var i = true;

                svg.on('click', function(){
                if (i) {
                setTimeout(function(){
                $(this).find("g").addClass('gotcha')

                line_first.css({
                'transform':'rotate(45deg)',
                'left':'50%',
                'top':'50%',
                'width':'200px',
                // This line BELONGS to @dervondenbergen :D
                // Enjoy your propriety my friend.
                'transform-origin': 'left bottom'
                })
                line_third.css({
                'transform':'rotate(-45deg) translate(-50%,-50%)',
                'left':'50%',
                'top':'50%'
                })
                line_second.css('opacity','0')
                },005)
                } else {
                setTimeout(function(){
                line_first.attr('style', '');
                line_third.attr('style', '');
                line_second.css('opacity','1')
                },005)
                }
                i=!i;
                });
                });</code></pre>

        <footer>
            <a href="#" class="codepen-able"></a>
        </footer>
    </div>

    <div class="sample--showcase">
        <svg width="100" height="100">
            <g id="cross_svg">
                <rect id="Rectangle-1"  x="0" y="0" width="48" height="2" fill="transparent"></rect>
                <rect id="Rectangle-2"  x="0" y="14" width="48" height="2" fill="transparent"></rect>
                <rect id="Rectangle-4"  x="0" y="28" width="48" height="2" fill="transparent"></rect>
            </g>
        </svg>
    </div>
</section>

<section class="sample--3">
    <header>
        <h2>Using Unicode characters</h2>
    </header>
    <div class="options">
        <a href="#" class="show_snippet"><strong class="entypo-code"></strong></a>
    </div>
    <div class="snippet">
        <header>
            <a href="#" class="close"><i class="entypo-cancel"></i></a><h4>Copy the snippet</h4>
        </header>
        <pre data-type="html" class="html"><code class="html">&lt;input type="checkbox" id="toggle-menu"/>
                &lt;label for="toggle-menu">
                &lt;span class="menu-icon">&lt;/span>
                &lt;/label></code></pre>
        <pre data-type="css" class="css"><code class="css">@charset "UTF-8";
                .menu-icon {
                font-size: 3em;
                max-width: 45px;
                text-align: center;
                display: block;
                margin: 15% auto;
                cursor: pointer;
                transition: transform .2s ease;
                }
                .menu-icon:hover {
                transform: scale(0.9);
                }
                .menu-icon:before, .menu-icon:after {
                line-height: .5;
                }
                .menu-icon:before {
                content: '☰';
                display: block;
                }
                .menu-icon:after {
                content: '╳';
                font-size: .75em;
                font-weight: 800;
                display: none;
                }

                #toggle-menu:checked ~ label[for="toggle-menu"] .menu-icon {
                transform: rotate(180deg);
                }
                #toggle-menu:checked ~ label[for="toggle-menu"] .menu-icon:before {
                display: none;
                }
                #toggle-menu:checked ~ label[for="toggle-menu"] .menu-icon:after {
                display: block;
                }
            </code></pre>
        <pre data-type="js" class="js"><code class="js">// No JS</code></pre>

        <footer>
            <a href="#" class="codepen-able"></a>
        </footer>
    </div>

    <div class="showcase--3">
        <input type="checkbox" id="toggle-menu"/>
        <label for="toggle-menu">
            <span class="menu-icon"></span>
        </label>
    </div>
</section>

<section class="sample--4">
    <header>
        <h2>Pseudo elements + 1 tag</h2>
    </header>
    <div class="options">
        <a href="#" class="show_snippet"><strong class="entypo-code"></strong></a>
    </div>
    <div class="snippet">
        <header>
            <a href="#" class="close"><i class="entypo-cancel"></i></a><h4>Copy the snippet</h4>
        </header>
        <pre data-type="html" class="html"><code class="html">&lt;span>&lt;/span></code></pre>
        <pre data-type="css" class="css"><code class="css">span {
                margin: 15% auto;
                display: block;
                width: 45px;
                height: 45px;
                position: relative;
                display: block;
                width: 1.5em;
                height: 0.25em;
                background: #E04681;
                border-radius: 3px;
                cursor: pointer;
                transition: transform .2s ease;
                }
                span:before, span:after {
                border-radius: 3px;
                transition: transform .3s ease;
                }
                span:before {
                content: '';
                display: block;
                position: absolute;
                width: 1.5em;
                height: 0.25em;
                top: -0.5em;
                background: #E04681;
                }
                span:after {
                content: '';
                display: block;
                position: absolute;
                width: 1.5em;
                height: 0.25em;
                top: 0.5em;
                background: #E04681;
                }
                span.close {
                width: 45px;
                height: 45px;
                margin: 15% auto;
                left: 10px;
                position: relative;
                display: block;
                width: 0;
                height: 0;
                background: transparent;
                transform: rotate(-180deg);
                }
                span.close:before, span.close:after {
                transition: transform .3s ease;
                }
                span.close:before {
                content: '';
                display: block;
                position: absolute;
                width: 1.5em;
                height: 0.25em;
                top: 0;
                background: #E04681;
                transform: rotate(-45deg);
                }
                span.close:after {
                content: '';
                display: block;
                position: absolute;
                width: 1.5em;
                height: 0.25em;
                top: 0;
                background: #E04681;
                transform: rotate(45deg);
                }
            </code></pre>
        <pre data-type="js" class="js"><code class="js">var $icon = $('span');
                $icon.on('click',function(e){
                $(this).toggleClass('close')
                });</code></pre>

        <footer>
            <a href="#" class="codepen-able"></a>
        </footer>
    </div>

    <div class="showcase--4">
        <span></span>
    </div>
</section>

<!-- the following technique is from @dervondenbergen -->
<section class="sample--5">
    <header>
        <h2>Pseudo elements + 3 tags</h2>
    </header>
    <div class="options">
        <a href="#" class="show_snippet"><strong class="entypo-code"></strong></a>
    </div>

    <div class="snippet">
        <header>
            <a href="#" class="close"><i class="entypo-cancel"></i></a><h4>Copy the snippet</h4>
        </header>
        <pre data-type="html" class="html"><code class="html">&lt;div class="menu">
                &lt;div class="bit-1">&lt;/div>
                &lt;div class="bit-2">&lt;/div>
                &lt;div class="bit-3">&lt;/div>
                &lt;/div></code></pre>
        <pre data-type="css" class="css"><code class="css">.menu {
                width: 3em;
                height: 3em;
                position: relative;
                z-index: 0;
                margin: 15% auto;
                }
                .menu .bit-1::before {
                content: '';
                left: 0.5em;
                top: 0.5em;
                position: absolute;
                width: 1em;
                transform-origin: left bottom;
                height: 0.3em;
                background: #2E313C;
                transition: transform 0.3s, top 0.3s;
                }
                .menu .bit-1::after {
                content: '';
                position: absolute;
                right: 0.5em;
                top: 0.5em;
                width: 1em;
                transform-origin: right bottom;
                height: 0.3em;
                background: #2E313C;
                transition: transform 0.3s, top 0.3s;
                }
                .menu .bit-2 {
                position: absolute;
                width: 2em;
                top: 50%;
                left: 50%;
                height: 0.3em;
                background: #2E313C;
                transform: translate(-50%, -50%);
                transition: transform 0.3s 0.3s, width 0.3s 0.6s;
                }
                .menu .bit-3::before {
                content: '';
                position: absolute;
                bottom: 0.5em;
                left: 0.5em;
                width: 1em;
                transform-origin: left top;
                height: 0.3em;
                background: #2E313C;
                transition: transform 0.3s, bottom 0.3s;
                }
                .menu .bit-3::after {
                content: '';
                position: absolute;
                bottom: 0.5em;
                right: 0.5em;
                width: 1em;
                transform-origin: right top;
                height: 0.3em;
                background: #2E313C;
                transition: transform 0.3s, bottom 0.3s;
                }
                .menu.open .bit-1:before {
                top: 0.4em;
                width: 1.2em;
                transform: rotate(45deg);
                transform-origin: left bottom;
                transition: transform 0.3s 0.3s, width 0.3s 0.3s, top 0.3s 0.3s;
                }
                .menu.open .bit-1:after {
                top: 0.4em;
                width: 1.2em;
                transform: rotate(-45deg);
                transform-origin: right bottom;
                transition: transform 0.3s 0.3s, width 0.3s 0.3s, top 0.3s 0.3s;
                }
                .menu.open .bit-2 {
                width: 0.3em;
                transform: translate(-50%, -50%) rotate(45deg);
                transition: transform 0.3s 0.3s, width 0.3s;
                }
                .menu.open .bit-3:before {
                bottom: 0.4em;
                width: 1.2em;
                transform: rotate(-45deg);
                transform-origin: left top;
                transition: transform 0.3s 0.3s, width 0.3s 0.3s, bottom 0.3s 0.3s;
                }
                .menu.open .bit-3:after {
                bottom: 0.4em;
                width: 1.2em;
                transform: rotate(45deg);
                transform-origin: right top;
                transition: transform 0.3s 0.3s, width 0.3s 0.3s, bottom 0.3s 0.3s;
                }
            </code></pre>
        <pre data-type="js" class="js"><code class="js">var menu = document.querySelector('.menu');
                function toggleMenu () {
                menu.classList.toggle('open');
                }
                menu.addEventListener('click', toggleMenu);
            </code></pre>

        <footer>
            <a href="#" class="codepen-able"></a>
        </footer>
    </div>

    <div class="showcase--5">

        <div class="menu">
            <div class="bit-1"></div>
            <div class="bit-2"></div>
            <div class="bit-3"></div>
        </div>
    </div>
</section>

<section class="sample--6">
    <header>
        <h2>Pseudo elements + iconfont</h2>
    </header>
    <div class="options">
        <a href="#" class="show_snippet"><strong class="entypo-code"></strong></a>
    </div>
    <div class="snippet">
        <header>
            <a href="#" class="close"><i class="entypo-cancel"></i></a><h4>Copy the snippet</h4>
        </header>
        <pre data-type="html" class="html"><code class="html">&lt;span>&lt;/span></code></pre>
        <pre data-type="css" class="css"><code class="css">@import url(http://weloveiconfonts.com/api/?family=entypo);
                span {
                font-family: "entypo", sans-serif;
                font-size: 2em;
                display: block;
                margin: 15% auto;
                width: 45px;
                transition: transform .3s ease;
                transform-origin: 25% 50%;
                }
                span:before {
                content: "\2630";
                }
                span.close {
                transform: rotate(-180deg);
                }
                span.close:before {
                content: "\2715";
                }
            </code></pre>
        <pre data-type="js" class="js"><code class="js">var menuSecond = document.querySelector('span');

                function toggleMenuSecond () {
                menuSecond.classList.toggle('close');
                }

                menuSecond.addEventListener('click', toggleMenuSecond);</code></pre>

        <footer>
            <a href="#" class="codepen-able"></a>
        </footer>
    </div>

    <div class="showcase--6">
        <span></span>
    </div>
</section>

<footer>
    <div>
        <div>
            <h2>Menu to cross icon</h2>
        </div>
        <div>
            <h3>A project of <a href="http://twitter.com/lukyvj">@LukyVj</a> and some other gitches folks.</h3>
            <span class="cf"></span>
            <a href="https://twitter.com/share" class="twitter-share-button" data-via="LukyVJ" data-related="bullgit">Tweet</a>
            <script>!function(d,s,id){var js,fjs=d.getElementsByTagName(s)[0],p=/^http:/.test(d.location)?'http':'https';if(!d.getElementById(id)){js=d.createElement(s);js.id=id;js.src=p+'://platform.twitter.com/widgets.js';fjs.parentNode.insertBefore(js,fjs);}}(document, 'script', 'twitter-wjs');</script>
        </div>

        <div>
            <p>2015 | <a href="https://github.com/LukyVj/menu-to-cross-icon">On github</a></p>
        </div>
    </div>

</footer>


<script src="scripts/jquery.min.js"></script>
<script src="scripts/main.js"></script>
<script>
    // Sample 1
    document.getElementById('x').addEventListener('click', function () {
        if (this.classList.contains('clicked')) {
            this.classList.remove('clicked');
        } else {
            this.classList.add('clicked');
        }
    });
    // Sample 5
    var menu = document.querySelector('.menu');

    function toggleMenu () {
        menu.classList.toggle('open');
    }

    menu.addEventListener('click', toggleMenu);

    // Sample 6
    var menuSecond = document.querySelector('.sample--6 span');

    function toggleMenuSecond () {
        menuSecond.classList.toggle('close');
    }

    menuSecond.addEventListener('click', toggleMenuSecond);</script>
</body>
</html>