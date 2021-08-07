<!DOCTYPE html>
<html lang="es-Es">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="https://unpkg.com/swiper/swiper-bundle.min.css" />
        <link href='https://fonts.googleapis.com/css?family=Poppins' rel='stylesheet'>
        <link rel="shortcut icon" href="public/img/fav.png" type="image/x-icon">
        <link rel="stylesheet" href="public/css/home.css">
        <title>A'ttia</title>
    </head>

    <body>

        <section>
            <video src="public/img/home/video.mp4" muted autoplay loop type="mp4"></video>
            <div class="circle"></div>

            <header>
                <img src="public/img/home/logo.png" class="logo">
                <div class="toggle" onclick="toggleMenu()"></div>
                <!-- <ul class="navigation">
                    <li><a href="#">Inicio</a></li>
                    <li><a href="#">Nosotros</a></li>
                    <li><a href="#">Servicios</a></li>
                    <li><a href="#">Galeria</a></li>
                </ul> -->
            </header>

            <div class="content">
                <div class="textBox">
                    <h2>A'ttia</h2>
                    <p>
                        Lorem ipsum, dolor sit amet consectetur adipisicing elit. Itaque maxime, soluta blanditiis veritatis et, aliquid delectus
                        eum quae, culpa eos non. Suscipit officiis, magni magnam vitae dolore itaque cumque unde recusandae cum, distinctio omnis
                        hic rem inventore sed harum. Modi provident dolorem, eos sunt fuga sapiente obcaecati nemo in dolorum! Lorem ipsum dolor
                        sit, amet consectetur adipisicing elit. Quos impedit culpa illum cumque ea veniam eveniet suscipit distinctio perspiciatis,
                        possimus repellendus, cupiditate magni odio sapiente test.
                    </p>
                    <a href="login">Ingresar</a>
                </div>

                <div class="imgBox">
                    <div class="swiper-container">
                        <div class="swiper-wrapper">
                            <div class="swiper-slide"><img src="public/img/home/6.png"></div>
                            <div class="swiper-slide"><img src="public/img/home/4.png"></div>
                            <div class="swiper-slide"><img src="public/img/home/3.png" style="width: 450px;"></div>
                            <div class="swiper-slide"><img src="public/img/home/2.png" style="width: 270px;"></div>
                            <div class="swiper-slide"><img src="public/img/home/8.png"></div>
                            <div class="swiper-slide"><img src="public/img/home/1.png" style="width: 230px;"></div>
                            <div class="swiper-slide"><img src="public/img/home/5.png"></div>
                        </div>
                    </div>
                </div>
            </div>

            <ul class="sci">
                <li><a href="#"><img src="public/img/home/facebook.png"></a></li>
                <li><a href="#"><img src="public/img/home/twitter.png"></a></li>
                <li><a href="#"><img src="public/img/home/instagram.png"></a></li>
            </ul>
        </section>

        <script src="https://unpkg.com/swiper/swiper-bundle.min.js"></script>

        <script>
            var swiper = new Swiper('.swiper-container', {
                effect: 'coverflow',
                grabCursor: true,
                centeredSlides: true,
                slidesPerView: 'auto',
                coverflowEffect: {
                rotate: 50,
                stretch: -100,
                depth: 200,
                modifier: 1,
                slideShadows: true,
                },
                pagination: {
                el: '.swiper-pagination',
                },
                loop: true,
            });

            // function toggleMenu()
            // {
            //     const menuToggle = document.querySelector('.toggle');
            //     const navigation = document.querySelector('.navigation');
            //     menuToggle.classList.toggle('active');
            //     navigation.classList.toggle('active');
            // }
        </script>

    </body>
</html>