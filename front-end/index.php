<?php

    // function debug_to_console( $data ) {
    //     $output = $data;
    //     if ( is_array( $output ) )
    //         $output = implode( ',', $output);

    //     echo "<script>console.log( 'Debug Objects: " . $output . "' );</script>";
    // }

    $json_data = file_get_contents('./config.json');
    $json = json_decode($json_data);

    $teachers = $json->teachers;
    $prices = $json->prices;
    $advantages = $json->advantages;
    $languages = $json->languages;
    $reviews = $json->reviews;

    $position;
    $price_color = 'blue';

    $photo_dir = './images/photos';
    $photos = scandir($photo_dir);

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <link rel="stylesheet" href="./styles/style.css"/>
    <link rel="stylesheet" href="./styles/modal.css"/>
    <link rel="stylesheet" href="./styles/result.css"/>
    <link rel="stylesheet" href="./styles/header.css"/>
    <link rel="stylesheet" href="./styles/base.css"/>
    <link rel="stylesheet" href="./styles/advantages.css"/>
    <link rel="stylesheet" href="./styles/studying.css"/>
    <link rel="stylesheet" href="./styles/prices.css"/>
    <link rel="stylesheet" href="./styles/languages.css"/>
    <link rel="stylesheet" href="./styles/teachers.css"/>
    <link rel="stylesheet" href="./styles/reviews.css"/>
    <link rel="stylesheet" href="./styles/photos.css"/>
    <link rel="stylesheet" href="./styles/contacts.css"/>
    <link rel="stylesheet" href="./styles/footer.css"/>

    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700,800" rel="stylesheet">

    <script src="https://code.jquery.com/jquery-1.10.2.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/underscore.js/1.9.1/underscore.js"></script>

    <link rel="icon" type="image/png" href="./images/icon.png" />
    <title>Enot poliglot</title>

    <meta charset="UTF-8">

</head>

<body>

    <div id="modal" class="modal-window">
        <div id="form-window" class="form-block box">
            <div class="text">
                <p class="b">Запишитесь</p>
                <p class="c">на бесплатное пробное занятие</p>
                <p class="b">прямо сейчас!</p>
            </div>
            <div class="input">
                <input type="text" id="input-1" placeholder="Ваше имя"/>
                <input type="text" id="input-2" placeholder=""/>    
            </div>
            <button id="modal-enroll" class="button enroll">Записаться</button>
            <div class="check-box">
                <input type="checkbox" id="modal-check"/>
                <p >Я ознакомлен с <a href="agreement.php">соглашением пользования</a></p>
            </div>
        </div>
    </div>

    <div id="result" class="result">
        <div class="result-main">
            <img src=""/>
            <p></p>
        </div>
    </div> 

    <header>
        <div class="header-main main">
            <a href=""><img src="./images/header/logo.png"></a>
            <div class="nav">
                <a href="">Главная</a>
                <a href="#2">Обучение</a>
                <a href="#3">Преподаватели</a>
                <a href="#4">Отзывы</a>
                <a href="#5">Контакты</a>
            </div>
            <div class="numbers">
                <p><cb>8-928-198-89-41</cb></p>
                <p><cr>8(863)279-43-38</cr></p>
            </div>
        </div>
    </header>
    
    <div class="base" id="1">
        <div class="base-main main">
            <div class="block">
                <p class="big">Английский, испанский, немецкий<br>и китайский языки по соверменным<br>учебным программам</p>
                <p class="small">Запишись на бесплатную консультацию,<br>и заговори на английском за 2 месяца</p>
                <button class="enroll-button enroll-window base-button button">Записаться</button>
                <button class="request-call-button call-window base-button button">Заказать звонок</button>
            </div>
        </div>
    </div>

    <?php
        if ($advantages == null) {}
        else {
            echo    
                '<div class="advantages">     
                    <div class="advantages-main main">
                        <div class="part">Почему Enot <cr style="color: #ff0000">Poliglot?</cr></div>
                        <div class="adv-s">'
            ;

            for ($i = 0; $i < count($advantages); $i++) {
                echo    
                    '<div class="adv">
                        <img src="./images/advantages/'.$advantages[$i]->image.'" />
                        <div class="adv-text">
                            <p class="task">'.$advantages[$i]->task.'</p>
                            <p class="description">'.$advantages[$i]->description.'</p>
                        </div>
                    </div>'
                ;
            }

            echo 
                '       </div> 
                    </div>
                </div>'
            ;
        }
    ?>

    <div class="studying" id="2">
        <div class="studying-main main">
            <div class="part">Обучение</div>
            <div class="block">
                <div class="text-block box">
                    <div class="text">
                        <p class="s">Первое занятие<br>абсолютно бесплатно</p>
                        <div class="line"></div>
                        <p class="w">Оставьте заявку и получите приглашение<br>на первое пробное занятие</p>
                    </div>
                </div>
                <div id="f-b" class="form-block box">
                    <div class="text">
                        <p class="b">Запишитесь</p>
                        <p class="c">на бесплатное пробное занятие</p>
                        <p class="b">прямо сейчас!</p>
                    </div>

                    <div class="input">
                        <input type="text" id="study-name" placeholder="Ваше имя"/>
                        <input type="text" id="study-email" placeholder="Email"/>    
                    </div>

                    <button id="study-enroll" class="button enroll">Записаться</button>
                    
                    <div class="check-box">
                        <input type="checkbox" id="study-check"/>
                        <p>Я ознакомлен с <a href="agreement.php">соглашением пользования</a></p>
                    </div>

                </div>
            </div>
        </div>
    </div>

    <?php
        if ($prices == null) {}
        else {
            echo    '<div class="prices">
                        <div class="prices-main main">'
            ;

            for ($i = 0; $i < count($prices); $i++) {
                if ($i % 2 == 0) {
                    $position = 'left';
                    if ($price_color == 'red') {
                        $price_color = 'blue';
                    }
                    else {
                        $price_color = 'red';
                    }
                }
                else {
                    $position = 'right';
                }

                echo    
                    '<div class="block '.$position,' ', $price_color.'">
                        <p class="name">'.$prices[$i]->name.'</p>
                        <p class="price">от '.$prices[$i]->price.'</p>
                    </div>'
                ;
            }

            echo 
                '   </div>
                </div>'
            ;
        }
    ?>
  
    <?php
        if ($languages == null) {}
        else {
            echo    
                '<div class="languages">       
                    <div class="languages-main main">
                    <div class="part">Наши направления</div>'
            ;

            for ($i = 0; $i < count($languages); $i++) {
                if ($i % 2 == 0) {
                    $position = 'left';
                }
                else {
                    $position = 'right';
                }

                echo    
                    '<div class="language '.$position.'">
                        <img src="../images/languages/'.$languages[$i]->image.'" class="img-lng" />
                        <div class="text">
                            <p class="name">'.$languages[$i]->name.'</p>
                            <p class="description">'.$languages[$i]->description.'<p>
                        </div>
                        <button class="button-language enroll-window button" onclick="setLanguage($(this).parent().children().children().html())">Записаться</button>
                    </div>'
                ;
            }

            echo 
                '   </div> 
                </div>'
            ;
        }
    ?>

    <?php
        if ($teachers == null) {}
        else {
            echo '<div class="teachers" id="3">
                    
                    <div class="teachers-main main">
                    <div class="part">Наши преподаватели</div>
                        <div class="block">'
            ;

            for ($i = 0; $i < count($teachers); $i++) {

                echo 
                        '<div class="teacher">
                            <img src="./images/teachers/'.$teachers[$i]->image.'" class="img-teacher" />
                            <p class="name">'.$teachers[$i]->name.'</p>
                            <p class="position">'.$teachers[$i]->position.'</p>
                        </div>'
                ;
            }

            echo
                        '</div>
                    </div>
                </div>'
            ;
        }
    ?>

    <?php
        // if ($reviews == null) {}
        // else {
        //     echo 
        //         '<div class="reviews" id="4">
        //             <div class="part main">Отзывы студентов</div>
        //             <div class="reviews-main main">
        //                 <div class="photo-previous"><img src="" /></div>'
        //     ;

        //     for ($i = 0; $i < count($reviews); $i++) {

        //         echo 
        //             '<div class="block">
        //                     <img src="./images/reviews/'.$reviews[$i]->image.'" />
        //                     <p class="name">'.$reviews[$i]->name.'</p>
        //                     <p class="course">'.$reviews[$i]->course.'</p>
        //                 <img />
        //                 <div class="text">
        //                     <p class="name">'.$reviews[$i]->name.'</p>
        //                     <p class="position">'.$reviews[$i]->position.'</p>
        //                     <p class="review">'.$reviews[$i]->review.'</p>
        //                 </div>

        //             </div>'
        //         ;
        //     }

        //     echo
        //         '       <div class="photo-next"><img src="" /></div>
        //             </div>
        //         </div>'
        //     ;
        // }
    ?>

    <?php
        // if ($photos == null) {}
        // else {
        //     echo 
        //         '<div class="photos">
        //             <div class="part main"> Наши фотографии</div>
        //             <div class="photos-main main">
        //                 <div class="photo">'
        //     ;

        //     for ($i = 0; $i < count($photos); $i++) {
        //         if (($photos[$i] != '.') && ($photos[$i] != '..')) {
        //             echo 
        //                 '<img src="./images/photos/'.$photos[$i].'" />'
        //             ;
        //         }
        //     }

        //     echo
        //         '       </div>
        //             </div>
        //         </div>'
        //     ;
        // }
    ?>

    <div class="contacts" id="5">
        <div class="head-main main">
            <div  class="part">Контакты</div>
        </div>
        <div class="contacts-main">
            <div class="block main">
                <div class="addres">
                    <p class="invite" >Приходите к нам на чай</p>
                    <p class="addres">Наш адрес:</p>
                    <p class="location">г.Аксай, ул. Гагарина, 26</p>
                </div>
                <img src="./images/contacts/pin.png" />
            </div>
        </div>
    </div>

    <footer>
        <div class="footer-main main">
            <img src="./images/footer/logo.png"/>
            <div class="social">
                <a href="https://www.instagram.com/enotpoliglot.aksay/" ><img src="./images/footer/instagram.png"/></a>
                <a href="https://vk.com/enotpoliglot_aksay" ><img src="./images/footer/vk.png"/></a>
                <a href="" ><img src="./images/footer/skype.png"/></a>
            </div>
            <div class="numbers">
                <p>8-928-198-89-41</p>
                <p>8(863)279-43-38</p>
            </div>
        </div>
    </footer>

    <script type="text/javascript" src="./code.js"></script>

</body>
</html>