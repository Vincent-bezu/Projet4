<!DOCTYPE html>
<html>
    <head>
        
        <title><?= $title ?></title>
        <link rel="stylesheet" type="text/css" href="../../CSS/style.css">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta charset="utf-8">
        <script src="https://kit.fontawesome.com/16f6d7b24c.js" crossorigin="anonymous"></script> 
        <script src="https://cdn.tiny.cloud/1/no-api-key/tinymce/5/tinymce.min.js" referrerpolicy="origin"></script>
        <script>
          tinymce.init({
            selector: '.tinyTextArea',
            
          });
        </script>
        
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">  

      </head>
        
    <body>
    <ul class="nav justify-content-center">
  <li class="nav-item">
    <a class="nav-linkB" href="../../index.php?action=listPosts">Accueil</a>
  </li>
  <li class="nav-item">
    <a class="nav-linkB" href="../backend/router.php?action=newPost">Nouvel article</a>
  </li>
</ul>
        <?= $content ?>
        <footer><a href="View/backend/router.php?action=adminDashboard">Espace administrateur</a>
        <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
	    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
	    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>	

    </body>
</html>