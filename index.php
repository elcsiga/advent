<!DOCTYPE html>
<html>

<head>
    <meta http-equiv='content-type'
          content='text/html; charset=utf-8' />
    <meta name='viewport'
          content='width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no'>
    <meta http-equiv='X-UA-Compatible'
          content='IE=edge'>
    <META NAME='Description'
          content='Advent'>
    <meta name='keywords'
          content='dom, pan, zoom' />
    <meta name='author'
          content='elcsiga'>
    <meta name='title'
          content='Advent' />
    <title>Advent 2020</title>
    <link rel="preconnect"
          href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Mountains+of+Christmas&display=swap"
          rel="stylesheet">
    <style type="text/css"
           media="screen">
        body,
        html {
            width: 100%;
            height: 100%;
            padding: 0;
            margin: 0;
            background: rgb(0, 0, 0);

            font-family: 'Mountains of Christmas', cursive;
            font-size: 20px;

            -webkit-user-select: none;
            /* Safari */
            -ms-user-select: none;
            /* IE 10 and IE 11 */
            user-select: none;
            /* Standard syntax */
        }

        .container {
            position: fixed;
            top: 0;
            width: 100%;
            height: 100%;

            opacity: 0;
            transition: opacity ease-out 2s;
        }

        .zoomable {
            position: relative;
            width: 400px;
            height: 400px;
            background: rgb(35, 35, 120);
            background: radial-gradient(circle, rgb(30, 28, 138) 0%, rgba(0, 0, 0, 1) 60%);
        }

        :focus {
            outline: none !important;
        }

        .castle {
            position: absolute;
            bottom: 0;
            right: 0;
            right: 0;
            width: 100%;
        }

        .header {
            position: absolute;
            top: 20px;
            left: 20px;
            right: 20px;
            text-align: center;

            pointer-events: none;

            color: white;
            opacity: 0;
            transition: opacity ease-out 2s;
        }

        .footer {
            position: absolute;
            bottom: 20px;
            left: 20px;
            right: 20px;
            text-align: center;

            pointer-events: none;

            color: white;
        }

        .title {
            font-size: 44px;
        }

        .date {
            font-size: 80px;
            opacity: 0;
            transition: opacity ease-out 2s;
        }

        .tomorrow {
            opacity: 0;
            transition: opacity ease-out 2s;
        }

        .room {
            position: absolute;
            opacity: 0;
            transition: opacity ease-out 2s;
            cursor: pointer;
        }

        .room:nth-of-type(2) {
            top: 133px;
            left: 136.4px;
            width: 24px;
        }
    </style>
</head>

<body>

    <div class='container'>
        <div class='zoomable'>
            <img class="castle"
                 src="kalendarium.svg" />

            <img class="room"
                 src="rooms/1.png"
                 onclick="lighten(1)"
                 ontouchstart="lighten(1)" />
        </div>
    </div>
    <div class="header">
        <div class="title">Advent 2020</div>
        Find and lighten the rooms!
    </div>

    <div class="footer">
        <div class="date">Dec 1</div>
        <div class="tomorrow">Come back tomorrow <br /> and find more rooms!</div>
    </div>

    <script src='https://unpkg.com/panzoom@9.4.0/dist/panzoom.min.js'></script>
    <script>
        var zoomable = document.querySelector('.zoomable');

        panzoom(zoomable, {
            maxZoom: 20,
            minZoom: 1,
            smoothScroll: false
        }).moveTo(window.innerWidth / 2 - 200, window.innerHeight / 2 - 200);

        document.querySelector('.container').style.opacity = 1;
        setTimeout(() => {
            document.querySelector('.header').style.opacity = 1;
        }, 2000);

        let day = 1;
        const maxday = 1;
        const lighten = (r) => {
            if (day === r) {
                const room = document.querySelector('.room:nth-of-type(' + (r + 1) + ')');
                room.style.opacity = 1;

                const date = document.querySelector('.date');
                date.innerHTML = "Dec " + day;
                date.style.opacity = 1;

                if (day === maxday) {
                    const tomorrow = document.querySelector('.tomorrow');
                    tomorrow.style.opacity = 1;
                }

                day++;
            }
        }

    </script>
</body>

</html>