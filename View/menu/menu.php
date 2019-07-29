<nav class="navbar navbar-expand-lg navbar-light navbar-laravel">
    <div class="container">
        <a class="navbar-brand" href="?page=accueil"><img src="img/logotrans.png" class="img-fluid mr-2" alt="logotrans" style="width:50px;">CST Tools</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <?php
            if(isset($_SESSION['Auth'])){
                include 'View/menu/menu_item.php';
            }

            if(!isset($_SESSION['Auth'])){
                include 'View/menu/menu_item_log.php';
            }
        ?>
        
    </div>
</nav>