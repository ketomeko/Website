<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width initial-scale=1.0">
    <title>Ketomeko</title>
    <link rel="stylesheet" href="news.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.2/css/all.min.css">
</head>
<body>
    <header>
        <a href="./index.php" class="brand">K21 GAMES</a>
        <div class="menu">
            <div class="btn">
                <i class="fas fa-times close-btn"></i>
            </div>
            <a href="./index.php">Anasayfa</a>
            <a href="#haberler">Haberler</a>
            <a href="#yorumlar">Yorumlar</a>
            <a href="#iletişim">İletişim</a>
        </div>
        <div class="btn">
            <i class="fas fa-bars menu-btn"></i>
        </div>
    </header>

    <?php
        include 'connection.php';
        $photo = $_REQUEST['id'];
        $sql="SELECT * FROM news where ID='$photo'";
        $result = mysqli_query($con,$sql);
        if ($result) {
            $row = mysqli_fetch_assoc($result);
            $id = $row['ID'];
            $title = $row['Title'];
            $text = $row['Text'];
            $pic = $row['Img'];
            echo '

                    <div class="boxx">
                        <div class="image">
                            <img style="padding: 0px 220px 0px 220px;" src="./uploads/'.$pic.'">
                        </div>
                            <section id="welcome">
                                <div class="container">
                                <div class="welcome text-center">
                                    <h3>'.$title.'</h3>
                                    <p class="line-clamp">'.$text.'</p>
                                  
                                </div>
                                </div>
                            </section>
                        </div>    
                    ';
        }
    ?>

    <div style="margin-bottom: 50px" class="container">
        <h1 id="haberler" class="heading">En Son Haberler</h1>
        <div class="box-container">
            <!---
            <div class="box">
                <div class="image">
                    <img style="height: 250px" src="resimler/background.jpg">
                </div>
                <div class="content">
                    <h3>Başlık</h3>
                    <p class="line-clamp">Lorem ipsum dolor sit amet consectetur, adipisicing elit. Lorem ipsum dolor sit amet consectetur, adipisicing elit. Lorem ipsum dolor sit amet consectetur, adipisicing elit. Lorem ipsum dolor sit amet consectetur, adipisicing elit.</p>
                    <a href="#" class="btn">Daha Fazla</a>
                </div>
            </div>
            --->
            <?php
            $sql="SELECT * FROM news ORDER BY ID DESC";
            $result = mysqli_query($con,$sql);
            if ($result) {
                while ($row = mysqli_fetch_assoc($result)) {
                    $id = $row['ID'];
                    $title = $row['Title'];
                    $text = $row['Text'];
                    $pic = $row['Img'];
                    echo '
                            <div class="box">
                                <div class="image">
                                    <img style="height: 250px" src="./uploads/'.$pic.'">
                                </div>
                                <div class="content">
                                    <h3>'.$title.'</h3>
                                    <p class="line-clamp">'.$text.'</p>
                                    <a href="news.php?id='.$id.'" class="btn">Daha Fazla</a>
                                </div>
                            </div>
                    ';
                }
            }
            ?>
        </div>
    </div>


    <!--Footer-->
    <footer id="iletişim" class="footer">
        <div class="dream">
            <div class="row">
                <div class="footer-col">
                    <h4>Şirket</h4>
                    <hr>
                    <ul>
                        <li><a href="#">Hakkımızda</a></li>
                        <li><a href="#">Hizmetlerimiz</a></li>
                    </ul>
                </div>
                <div class="footer-col">
                    <h4>Destek</h4>
                    <hr>
                    <ul>
                        <li><a href="#">E-mail</a></li>
                    </ul>
                </div>
                <div class="footer-col">
                    <h4>Popüler Oyunlar</h4>
                    <hr>
                    <ul>
                        <li><a href="https://sms.playstation.com/stories/god-of-war-ragnarok-language-support">God Of War: Ragnarok</a></li>
                        <li><a href="https://www.ea.com/tr-tr/games/fifa/fifa-23/buy/pc">FIFA 23</a></li>
                        <li><a href="https://www.ea.com/games/f1/f1-22">F1 22</a></li>
                        <li><a href="https://en.bandainamcoent.eu/elden-ring/elden-ring">Elden Ring</a></li>
                    </ul>
                </div>
                <div class="footer-col">
                    <h4>Bizi Takip Edin</h4>
                    <hr>
                    <div>
                        <a href="#"><i class="fab fa-facebook-f"></i></a>
                        <a href="#"><i class="fab fa-twitter"></i></a>
                        <a href="#"><i class="fab fa-instagram"></i></a>
                        <a href="#"><i class="fab fa-linkedin-in"></i></a>
                    </div>
                </div>
            </div>
        </div>
    </footer>
    <script>
        let loadMoreBtn = document.querySelector('#load-more');
        let currentItem = 3;

        loadMoreBtn.onclick = ()=>{
            let boxes = [...document.querySelectorAll('.container .box-container .box')];
            for (var i = currentItem; i < currentItem+3;i++){
                boxes[i].style.display = 'inline-block';
            }
            currentItem += 3;
            if (currentItem >= boxes.length) {
                loadMoreBtn.style.display= 'none';
            }
        }
    </script>
    <script type="text/javascript">
        window.addEventListener("scroll",function(){
            var header = document.querySelector("header");
            header.classList.toggle('sticky',window.scrollY>0);
        });

        var menu = document.querySelector('.menu');
        var menuBtn = document.querySelector('.menu-btn');
        var closeBtn = document.querySelector('.close-btn');

        menuBtn.addEventListener("click", () => {
            menu.classList.add('active');
        });
        closeBtn.addEventListener("click", () =>{
            menu.classList.remove('active');
        });

    </script>
    <script type="text/javascript">
        var counter = 1;
        setInterval(function (){
            document.getElementById('radio'+counter).checked = true;
            counter++;
            if (counter > 4){
                counter =1;
            }
        },3000);
    </script>
</body>
</html>