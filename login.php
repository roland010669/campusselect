<!DOCTYPE html>
<?php $PageTitle = "login"; ?>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <title><?php echo $PageTitle; ?></title>
</head>

<body>
    <?php session_start(); ?>
    <br>
    <h1 class="text-center" style="color: white;">Page de connection ADMIN</h1><br>


    <video id="background-video" autoplay loop muted style=" height: 100vh; width: 100vw; object-fit: cover;
        position: fixed; left: 0; right: 0; top: 0; bottom: 0; z-index: -1; ">

        <source src="videoplayback.mp4" type="video/mp4">
    </video>

    <div class="content">

        <form method="POST" action="login_traitement.php" class="text-center" style="  margin-top: 30vh; ">
            <input type="text" name="username" placeholder="Nom D'Utilisateur">
            <input type="password" name="password" placeholder="Mot De Passe" autocomplete="current-password">

            <input type="text" name="role" placeholder="Role">
            <input style="background-color:#62529c ;" type="submit" value="Se connecter">

        </form><br>
        <button
            style="font-size: 1.5rem; background: 0; border: 5; margin-left: 50%; transform: translateX(-50%);font-weight: bold; text-align: center;color:yellow;"
            id="btnVideo" onclick="playAndPause()">Pause II</button>
    </div>
    <div>


        <a class="btn btn-warning" style="background-color:#62529c ;"
            href="http://localhost/CAMPUS_SELECT/views/Main/AcceuilCampus.html" role="button" height="30"
            width="200px">Retour
            sur la page
            d'acceuil</a>
    </div>
    <script>
    var video = document.getElementById("background-video");
    var btn = document.getElementById("btnVideo");

    function playAndPause() {

        if (video.paused) {
            video.play();
            btn.innerHTML = "Pause II";
        } else {
            video.pause();
            btn.innerHTML = "Play ▶";
        }
    }
    </script>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous">
    </script>
</body>

</html>