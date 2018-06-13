<?php

    #$_SERVER['DOCUMENT_ROOT'] = 'C:\inetpub\wwwroot\desktop.rent';
    require_once $_SERVER['DOCUMENT_ROOT']."/Classes/autoload.php";
    use Classes\Utils\Safety;
    Safety::declareProtectedZone();    
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="/css/main.css">
    <link rel="stylesheet" href="/css/drop-down-menu.css">
    <link rel="stylesheet" href="/css/control-panel.css">
    <script src="js/drop-down-menu.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <title>Control panel</title>
</head>
<body>
    <div id="wrapper">
        <header class="header header_theme_sky-dark header_text_align header_content">
            <div "header__logo">
                <a class="header__link text_color_blue" href="#">Desktop.rent</a>
            </div>
            <div class="header__user-profile user-profile">
                <p class="user-profile__login">Клиент 001289</p>
                <div class="user-profile__avatar">
                    <img class="user-profile__img" src="img/img-profile.png" alt="avatar">
                </div>
                <button class="user-profile__button"></button>
            </div>
        </header>
        <section class="header__menu drop-down-menu">
            <ul class="drop-down-menu__drop-down-list drop-down-list">
                <li class="drop-down-list__item item">
                    <button class="drop-down-list__button button button__notice drop-down-list__button_background"></button>
                    <div class="drop-down-list__block block block_shadow block_padding block_text-size"></div>
                </li>
                <li class="drop-down-list__item">
                    <button class="drop-down-list__button button button__info drop-down-list__button_background active"></button>
                    <div class="drop-down-list__block block block_shadow block_padding block_text-size active">
                        <div class="block___balance">
                            <h2 class="block__header block__header-border header__text ">Баланс</h2>
                            <div class="block__balance balance balance_margin">
                                <div class="balance__links">
                                    <a href="#" class="balance__link link-color text_size_min-small">Оплатить услуги</a>
                                    <a href="#" class="balance__link link-color text_size_min-small">Привязать карту</a>
                                </div>
                                <div class="balance__money money money_text-size">
                                    <p class="money__text money__text-position text_size_min-small">доступно</p>
                                    <p class="money__count money__count-color money__count-size">14 500 <span class="money__currency">Р</span></p>
                                </div>
                            </div>
                        </div>
                        <div class="block___services">
                            <h2 class="block__header block__header-border header__text">Поключенные услуги</h2>
                            <div class="block__services services services_margin">
                                <div class="services__item">
                                    <a href="#" class="services__link link-color description_text_size">Доступ к порталу</a>
                                    <p class="services__date text_size_min-small">до 31.07.2018</p>
                                </div>
                            </div>
                        </div>
                        <div class="block___resources">
                            <h2 class="block__header block__header-border header__text">Русурсы</h2>
                            <div class="block__resources resources resources_margin">
                                <p class="resources__info text_size_small">Используется 8,9 Гб из 15 ГБ (59%)</p>
                                <a href="#" class="resources__disk link-color"><span>&plus;</span>Расширить диск</a>
                            </div>
                        </div>
                    </div>
                </li>
                <li class="drop-down-list__item">
                    <button class="drop-down-list__button button button__support drop-down-list__button_background"></button>
                    <div class="drop-down-list__block block block_shadow block_padding block_text-size"></div>
                </li>
                <li class="drop-down-list__item">
                    <button class="drop-down-list__button button button__exit drop-down-list__button_background"></button>
                    <div class="drop-down-list__block block block_shadow block_padding block_text-size"></div>
                </li>
            </ul>
        </section>
        <main class="main main_padding_bottom">
            <header class="main__header">
                <h1 class="header__text text_size_header">Добро пожаловать!</h1>
                <ul class="header__nav-path text_color_grey">Вы здесь:
                    <li class="header__list-item"><a href="#" class="text_color_blue">Главная</a></li>
                </ul>
            </header>
            <section class="btn-menu main__btn-menu btn-menu_margin">
                <button class="btn-menu__entrance button button_theme_sky-light btn-menu__button_size">
                    <span class="button_text text_size_button button__text_color">Войти в рабочий стол</span>
                </button>
                <button class="btn-menu__set-password button button_theme_sky-dark btn-menu__set-password_margin btn-menu__button_size">
                    <span class="button_text text_size_button button__text_color">Установить пароль для первого входа</span>
                </button>
            </section>
            <section class="main__tools tools">
                <header class="tools__header main__header tools__header_margin_bottom">
                    <h1 class="header__text tools__header_border_bottom tools__header_padding text_size_caption">Доступные инструменты</h1>
                </header>
                <div class="tools__container container container_padding">
                    <a href="#" class="tools__link item_margin">
                        <div class="container__item item">
                            <!-- <a href="#" class="item__link"> -->
                                <div class="item__picture picture picture_theme_sky-dark">
                                    <img class="picture__img" src="img/icon-control-menu/employees.png" alt="picture">
                                </div>
                            <!-- </a> -->
                            <div class="item__text item__text_width">
                                <header class="item__header item__header_line-height item__text_head">
                                    <h3 class="header__text">Мои сотрудники</h3>
                                </header>
                                <p class="item__description description description_text_size description_padding text_color_grey item__text_desc">Добавляйте, удаляйте сотрудиков организации
                                        и управляйте их доступом к своим папкам.</p>
                            </div>   
                        </div>
                    </a>
                    <a href="#" class="tools__link item_margin">
                        <div class="container__item item">
                            <!-- <a href="#" class="item__link"> -->
                                <div class="item__picture picture picture_theme_disable">
                                    <img class="picture__img" src="img/icon-control-menu/folders.png" alt="picture">
                                </div>
                            <!-- </a> -->
                            <div class="item__text item__text_width">
                                <header class="item__header item__header_line-height item__text_head">
                                    <h3 class="header__text">Мои папки</h3>
                                </header>
                                <p class="item__description description description_text_size description_padding text_color_grey item__text_desc">Управляйте содержимым корпоративных папок
                                        и доступом сотрудников к ним.</p>
                            </div>   
                        </div>
                    </a>
                    <a href="#" class="tools__link item_margin">
                        <div class="container__item item">
                            <!-- <a href="#" class="item__link"> -->
                                <div class="item__picture picture picture_theme_sky-dark">
                                    <img class="picture__img" src="img/icon-control-menu/payments.png" alt="picture">
                                </div>
                            <!-- </a> -->
                            <div class="item__text item__text_width">
                                <header class="item__header item__header_line-height item__text_head">
                                    <h3 class="header__text">Мои платежи</h3>
                                </header>
                                <p class="item__description description description_text_size description_padding text_color_grey item__text_desc">Просматривайте историю платежных 
                                        транзакций, получайте счета и расчетные 
                                        документы.</p>
                            </div>   
                        </div>
                    </a>
                    <a href="#" class="tools__link item_margin">
                        <div class="container__item item">
                            <!-- <a href="#" class="item__link"> -->
                                <div class="item__picture picture picture_theme_sky-dark">
                                    <img class="picture__img" src="img/icon-control-menu/data.png" alt="picture">
                                </div>
                            <!-- </a> -->
                            <div class="item__text item__text_width">
                                <header class="item__header item__header_line-height item__text_head">
                                    <h3 class="header__text">Мои данные</h3>
                                </header>
                                <p class="item__description description description_text_size description_padding text_color_grey item__text_desc">Укажите учетные данные компании, требуемые
                                        для документооборота с Desktop.rent.</p>
                            </div>   
                        </div>
                    </a>
                    <a href="#" class="tools__link item_margin">
                        <div class="container__item item">
                            <!-- <a href="#" class="item__link"> -->
                                <div class="item__picture picture picture_theme_sky-dark">
                                    <img class="picture__img" src="img/icon-control-menu/support.png" alt="picture">
                                </div>
                            <!-- </a> -->
                            <div class="item__text item__text_width">
                                <header class="item__header item__header_line-height item__text_head">
                                    <h3 class="header__text">Техподдержка</h3>
                                </header>
                                <p class="item__description description description_text_size description_padding text_color_grey item__text_desc">Общайтесь с Вашим персональным менеджером
                                        по вопросам работы с платформой Desktop.rent.</p>
                            </div>   
                        </div>
                    </a>
                    <a href="#" class="tools__link item_margin">
                        <div class="container__item item">
                            <!-- <a href="#" class="item__link"> -->
                                <div class="item__picture picture picture_theme_disable">
                                    <img class="picture__img" src="img/icon-control-menu/services.png" alt="picture">
                                </div>
                            <!-- </a> -->
                            <div class="item__text item__text_width">
                                <header class="item__header item__header_line-height item__text_head">
                                    <h3 class="header__text">Мои сервисы</h3>
                                </header>
                                <p class="item__description description description_text_size description_padding text_color_grey item__text_desc">Просматривайте и управляйте списком
                                        подключенных услуг.</p>
                            </div>   
                        </div>
                    </a>
                </div>
            </section>
        </main>
        <footer class="footer">
            <p class="footer__copyright">Desktop.rent (c) 2018. Все права защищены.</p>
        </footer>
    </div>    
</body>
</html>