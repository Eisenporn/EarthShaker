<!-- Секция каталога -->
<section class="catalog">
    <h1><span>Сотрясателя</span><br> музыка</h1>

    <div class="swiper_catalog">
        <h2>Вышедшие альбомы</h2>

        <div class="swiper catalog">
            <div class="swiper-wrapper">
                <div class="swiper-slide slide1">
                    <div class="slider--catalog">
                        <div class="slider--catalog-content ">

                            <div class="scc scc-1"></div>

                            <div class="catalog--title-text">
                                <div class="catalog--img">
                                    <div>
                                        <img src="image/F-JcoYh2FuU.jpg" alt="">
                                    </div>
                                    <div>
                                        <img src="image/B03v4lsGaiA.jpg" alt="">
                                    </div>
                                </div>
                                <div class="catalog--title-h1-h2">
                                    <h2><span>DOUBLE TAP</span><br>GOING QUANTUM & HAYVE</h2>
                                </div>
                                <div>
                                    <a href=""><button>Прослушать релиз</button></a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="swiper-slide slide2">
                    <div class="slider--catalog">
                        <div class="slider--catalog-content">

                            <div class="scc scc-2"></div>

                            <div class="catalog--title-text">
                                <div class="catalog--img">
                                    <div>
                                        <img src="image/F-JcoYh2FuU.jpg" alt="">
                                    </div>
                                    <div>
                                        <img src="image/B03v4lsGaiA.jpg" alt="">
                                    </div>
                                </div>
                                <div class="catalog--title-h1-h2">
                                    <h2><span>Haze</span><br>PROFF</h2>
                                </div>
                                <div>
                                    <a href=""><button>Прослушать релиз</button></a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="swiper-slide slide3">
                    <div class="slider--catalog">
                        <div class="slider--catalog-content">

                            <div class="scc scc-3"></div>

                            <div class="catalog--title-text">
                                <div class="catalog--img">
                                    <div>
                                        <img src="image/F-JcoYh2FuU.jpg" alt="">
                                    </div>
                                    <div>
                                        <img src="image/B03v4lsGaiA.jpg" alt="">
                                    </div>
                                </div>
                                <div class="catalog--title-h1-h2">
                                    <h2><span>journey</span><br>yeter & klaxx</h2>
                                </div>
                                <div>
                                    <a href=""><button>Прослушать релиз</button></a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>
</section>

<!-- Непосредтсвенно сам каталог -->
<section class="catalog--container">
    <div class="catalog--container-title">
        <h2>Вышедшие альбомы</h2>
        <div>
            <!-- Кнопка появлятся только под админкой -->
            <a href="?page=addalbom"><button><img src="icon/svg/cross_add.svg" alt="">Добавить альбом</button></a>

            <a href=""><button><img src="icon/svg/search.svg" alt=""></button></a>
            <a href=""><button><img src="icon/svg/filter.svg" alt="">ФИЛЬТР</button></a>
            <a href=""><button><img src="icon/svg/sort.svg" alt="">СОРТИРОВКА</button></a>
        </div>
    </div>
    <div class="catalog--container-release">
        <div class="catalog--view-grid">
            <div class="catalog--grid">
                <?php
                $sql_catalog1 = "SELECT * FROM `users`, `album` WHERE album.author_id = users.id";
                $result_catalog1 = $link->query($sql_catalog1);
                while ($catalog_show = $result_catalog1->fetch_assoc()) {
                    echo '
                    <div>
                    <a href="?page=albom&id='.$catalog_show['id'].'">
                        <img src="'.$catalog_show['img_src'].'" alt="img_cover">
                        <p>'.$catalog_show['title'].'</p>
                        <p>'.$catalog_show['nickname'].'</p>
                    </a>
                    </div>    
                    ';
                }
                ?>
            </div>
        </div>
    </div>
</section>