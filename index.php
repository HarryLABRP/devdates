<?php
    require("script/navigation.php");
    require("script/config.php");
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="<?php echo $description_of_page; ?>">
    <title><?php echo $title_of_page; ?></title>
    <link rel="stylesheet" href="assets/style.min.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.5.0/css/all.css">
    <link rel="shortcut icon" href="images/favicon.png" type="image/vnd.microsoft.icon">
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&amp;display=swap" rel="stylesheet">
    <script>
        let server_ip = "<?php echo $ip_server; ?>"
        let server_port = "<?php echo $port_server; ?>"
        let particle_color = "<?php echo $particle_color; ?>"
    </script>
</head>
<body>
    <div class="page">
        <div class="page-hover"></div>
        <div id="particles-js"></div>
        <div class="body-page">
            <div class="header-page">
                <img src="images/server-logo.png" alt="logo">
            </div>
            <div class="connect-button" id="copiazaIP">
                <p>Join <span class="player-count">0</span> players at <span id="server-ip"><?php echo $ip_server; ?></span></p>
            </div>
            <div class="buttons-page">
                <ul>
                    <?php redirectionari_navigatie(); ?>
                </ul>
            </div>
            <div class="social-page">
                <ul>
                    <?php redirectionari_media(); ?>
                </ul>
            </div>
            <footer class="page-footer">
                <p><?php echo $footer_copyright; ?></p>
                <a href="https://discord.gg/YTt8GWR" style="display: <?php echo $raspuns_copyright;?>" class="copyright-footer"><img src="https://cdn.discordapp.com/attachments/282810617880903680/687299755113709592/Group_1.png" style="width: 20px;"></a>
            </footer>
            <input type="text" id="ipServer" value="<?php echo $ip_server; ?>"/>
        </div>
    </div>
</body>

<script src="https://ajax.aspnetcdn.com/ajax/jQuery/jquery-3.3.1.min.js"></script>
<script src="https://unpkg.com/sweetalert@2.1.2/dist/sweetalert.min.js"></script>
<script src="https://cdn.jsdelivr.net/particles.js/2.0.0/particles.min.js"></script>

<script>
    $.getJSON('https://api.minetools.eu/ping/' + server_ip + "/" + server_port, function (status) {
        var jucatoriOnline = status.players.online;
        $(".player-count").html(((jucatoriOnline = jucatoriOnline.toString().split("."))[0] = jucatoriOnline[0].replace(/\B(?=(\d{3})+(?!\d))/g, ","), jucatoriOnline.join(".")));
    });
    $("#copiazaIP").click(function () {
    swal({
      title: "You copied the ip!",
      text: "Come on our server and get fun",
      icon: "success",
      button: "Close",
      timer: 150000
    });
    document.getElementById("ipServer").select(), document.execCommand("copy")
  });
</script>
<script>
particlesJS("particles-js", {
    "particles": {
        "number": {
            "value":80, "density": {
                "enable": true, "value_area": 800
            }
        }
        , "color": {
            "value": particle_color
        }
        , "shape": {
            "type":"circle", "stroke": {
                "width": 0, "color": "#000000"
            }
            , "polygon": {
                "nb_sides": 5
            }
            , "image": {
                "src": "img/github.svg", "width": 100, "height": 100
            }
        }
        , "opacity": {
            "value":0.5, "random":false, "anim": {
                "enable": false, "speed": 1, "opacity_min": 0.1, "sync": false
            }
        }
        , "size": {
            "value":3, "random":true, "anim": {
                "enable": false, "speed": 40, "size_min": 0.1, "sync": false
            }
        }
        , "line_linked": {
            "enable": false, "distance": 150, "color": "#ffffff", "opacity": 0.4, "width": 1
        }
        , "move": {
            "enable":true, "speed":6, "direction":"top", "random":false, "straight":false, "out_mode":"out", "bounce":false, "attract": {
                "enable": false, "rotateX": 600, "rotateY": 1200
            }
        }
    }
    , "interactivity": {
        "detect_on":"canvas", "events": {
            "onhover": {
                "enable": false, "mode": "repulse"
            }
            , "onclick": {
                "enable": false, "mode": "push"
            }
            , "resize":true
        }
        , "modes": {
            "grab": {
                "distance":400, "line_linked": {
                    "opacity": 1
                }
            }
            , "bubble": {
                "distance": 400, "size": 40, "duration": 2, "opacity": 8, "speed": 3
            }
            , "repulse": {
                "distance": 200, "duration": 0.4
            }
            , "push": {
                "particles_nb": 4
            }
            , "remove": {
                "particles_nb": 2
            }
        }
    }
    , "retina_detect":true
}
);

    </script>
</html>
