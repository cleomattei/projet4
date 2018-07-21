<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="../../../../favicon.ico">

    <title><?= App::getInstance()->title; ?></title>
    
    <!-- Bootstrap core CSS -->
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet">

</head>

<body>

    <nav class="navbar navbar-expand-md navbar-dark bg-dark fixed-top">
        <a class="navbar-brand" href="http://localhost:8888/public/index.php?p=jean_forteroche">Jean Forteroche</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarsExampleDefault" aria-controls="navbarsExampleDefault" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>

        <div class="collapse navbar-collapse" id="navbarsExampleDefault">
            <ul class="navbar-nav mr-auto">
                <li class="nav-item active">
                    <a class="nav-link" href="http://localhost:8888/public/index.php">Blog <span class="sr-only">(current)</span></a>
                </li>
                <!-- <li class="nav-item">
            <a class="nav-link" href="#">Tous les chapitres</a>
          </li>-->

                <li class="nav-item dropdown">
                    <a class="nav-link" href="http://localhost:8888/public/index.php?p=chapitres.list#">Tous les chapitres</a>
                    
                </li>
            </ul>
            <form action="?p=login" method="post" class="form-inline my-2 my-lg-0">
                
                <button class="btn btn-primary my-2 my-sm-0" type="submit" >Se connecter</button>
            </form>
        </div>
    </nav>

    <main role="main" class="container">

        <div class="starter-template" style="padding-top: 100px">
            <?= $content; ?>
        </div>

    </main>
    <!-- /.container -->
    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script>
        window.jQuery || document.write('<script src="../../assets/js/vendor/jquery-slim.min.js"><\/script>')

    </script>
    <script src="https://getbootstrap.com/docs/4.1/assets/js/vendor/popper.min.js"></script>
    <script src="https://getbootstrap.com/docs/4.1/dist/js/bootstrap.min.js"></script>
    <!-- CDN TINYMCE -->
    <script src="/public/js/tinymce/tinymce.min.js"></script>
    <script>
    tinymce.init({
        selector: 'textarea',
        language: 'fr_FR'
    });

    </script>
</body>

</html>
