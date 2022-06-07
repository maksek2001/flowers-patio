<?php

$this->title = Yii::$app->name;
?>
<div class="main-info">
    <div style="display:inline-flex; width: 100%;">
        <div class="left-block">
            <? foreach ($bouquets as $bouquet) : ?>
                <div class="mySlides">
                    <img src="/web/public/images/bouquets/<?= $bouquet->image ?>" class="slider-img" alt="<?= $bouquet->name ?>">
                </div>
            <? endforeach; ?>

            <div class="row">
                <? for ($i = 0; $i < count($bouquets); $i++) : ?>
                    <div class="column">
                        <img class="demo cursor" src="/web/public/images/bouquets/<?= $bouquets[$i]->image ?>" onclick="currentSlide(<?= $i + 1 ?>)" alt="<?= $bouquets[$i]->name ?>">
                    </div>
                <? endfor; ?>
            </div>
        </div>

        <script>
            var slideIndex = 1;
            showSlides(slideIndex);

            function currentSlide(n) {
                showSlides(slideIndex = n);
            }

            function showSlides(n) {
                var i;
                var slides = document.getElementsByClassName("mySlides");
                var dots = document.getElementsByClassName("demo");
                var captionText = document.getElementById("caption");
                if (n > slides.length) {
                    slideIndex = 1
                }
                if (n < 1) {
                    slideIndex = slides.length
                }
                for (i = 0; i < slides.length; i++) {
                    slides[i].style.display = "none";
                }
                for (i = 0; i < dots.length; i++) {
                    dots[i].className = dots[i].className.replace(" active", "");
                }
                slides[slideIndex - 1].style.display = "block";
                dots[slideIndex - 1].className += " active";
            }
        </script>
        <div class="right-block">
            <div class="text-block">
                <h4 class="custom-h">
                    <strong>
                        <img src="/web/public/images/icons/info.png" class='middle-icon'>
                        Актуальная информация
                    </strong>
                </h4>
                <ul class="sales">
                    <li>
                        <img src="/web/public/images/icons/sale.png" class='menu-icon'>
                        Скидка 5% на наши букеты
                    </li>
                    <li>
                        <img src="/web/public/images/icons/settings.png" class='menu-icon'>
                        В "Собери сам" вы можете самостоятельно выбрать цветы и украшения для букета.
                    </li>
                    <li>
                        <img src="/web/public/images/icons/delivery.png" class='menu-icon'>
                        На данный момент у нас не действует доставка, букет можно забрать только самовывозом
                    </li>
                    <li>
                        <img src="/web/public/images/icons/wallet.png" class='menu-icon'>
                        Оплата производится при получении букета в магазине
                    </li>
                </ul>
            </div>
            <div class="text-block" style="width: 100%;">
                <h4 class="custom-h">
                    <strong>
                        <img src="/web/public/images/icons/flowers.png" class='middle-icon'>
                        Категории букетов
                    </strong>
                </h4>
                <div style="display: inline-flex;justify-content: center;">
                    <div class="category">
                        <a href="/purchase/bouquets" class="a-category">
                            <div class="preview">
                                <img src="/web/public/images/bouquets/розы.jpg" class="slider-img">
                            </div>
                            <p style="margin-top:5px;">Наши предложения</p>
                        </a>
                    </div>
                    <div class="category">
                        <a href="/make-self/main" class="a-category">
                            <div class="preview">
                                <img src="/web/public/images/bouquets/собери-сам.jpg" class="slider-img">
                            </div>
                            <p style="margin-top:5px;">Собери сам</p>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
</div>