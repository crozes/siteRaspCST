<div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="nav" id="navbarSupportedContent">
        <li class="nav-item">
            <a id="navbarSupportedContent" class="nav-link" href="?page=licence">Licence Auto</a>
        </li>
        <li class="nav-item">
            <a id="navbarSupportedContent" class="nav-link" href="?page=horaire">Déclaration Horaire</a>
        </li>
    </ul>
    <ul class="navbar-nav ml-auto">
        <li class="nav-item">
            <a id="navbarSupportedContent" class="nav-link" href="#"><?php echo $_SESSION['Auth'][0]->prenomPersonne." ".$_SESSION['Auth'][0]->nomPersonne; ?></a>
        </li>
        <li>
            <a id="navbarSupportedContent" class="nav-link" href="?page=logout">Déconnexion</a>
        </li>
    </ul>

</div>