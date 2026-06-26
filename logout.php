<?php
// Demarage session
session_start();
session_destroy();

header("Refresh: 3; url=index.php");
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Déconnexion</title>

 <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">

    <div class="container vh-100 d-flex justify-content-center align-items-center">
        <div class="card shadow-sm text-center p-5" style="max-width: 400px; width: 100%;">
            
            <div class="mb-4">
                <span style="font-size: 3rem;">👋</span>
            </div>
            
            <h2 class="card-title h4 mb-3">À bientôt !</h2>
            <p class="text-muted mb-4">Vous avez été déconnecté</p>

            <div class="progress mb-3" style="height: 5px;">
                <div class="progress-bar progress-bar-striped progress-bar-animated" role="progressbar" style="width: 100%"></div>
            </div>
            
            <small class="text-muted">Redirection automatique dans 3 secondes...</small>
            
        </div>
    </div>

</body>
</html>