<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Natangue Market - Inscription</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
</head>

<body class="bg-light">

<div class="container d-flex justify-content-center align-items-center min-vh-100 py-4">
    <div class="card p-4 shadow" style="max-width: 500px; width: 100%; border-top: 5px solid #ffc107;">
        
        <div class="mb-3">
            <a href="home" class="text-muted text-decoration-none small d-inline-flex align-items-center gap-1 link-secondary">
                <i class="bi bi-arrow-left"></i> Retour à l'accueil
            </a>
        </div>
        
        <h2 class="text-center mb-2 fw-bold text-dark">Créer un compte</h2>
        <p class="text-center text-muted small mb-4">Rejoignez l'univers de Natangue Market</p>

        <form method="POST" enctype="multipart/form-data">

            <div class="row g-2"> 
                <div class="col-md-6 mb-3">
                    <label class="form-label fw-medium text-secondary">Prénom</label>
                    <input type="text" class="form-control" name="prenom" required>
                </div>
                <div class="col-md-6 mb-3">
                    <label class="form-label fw-medium text-secondary">Nom</label>
                    <input type="text" class="form-control" name="nom" required>
                </div>
            </div>

            <div class="mb-3">
                <label class="form-label fw-medium text-secondary">Téléphone</label>
                <input type="tel" class="form-control" name="tel" placeholder="77 000 00 00" required>
            </div>

            <div class="mb-3">
                <label class="form-label fw-medium text-secondary">Email</label>
                <input type="email" class="form-control" name="email" placeholder="adresse@mail.com" required>
            </div>

            <div class="mb-3">
                <label class="form-label fw-medium text-secondary">Adresse</label>
                <input type="text" class="form-control" name="adresse" placeholder="Dakar, Almadies..." required>
            </div>

            <div class="mb-3">
                <label class="form-label fw-medium text-secondary">Mot de passe</label>
                <input type="password" class="form-control" name="password" required>
            </div>

            <div class="mb-4">
                <label class="form-label fw-medium text-secondary">Photo de profil</label>
                <input type="file" class="form-control" name="photo">
            </div>

            <button type="submit" name="register"class="btn btn-warning w-100 fw-bold text-dark mb-3 shadow-sm">
                S'inscrire
            </button>

        </form>

        <div class="text-center text-muted small mt-2">
            Déjà inscrit ? <a href="login" class="text-success fw-semibold text-decoration-none">Se connecter</a>
        </div>
        
    </div>
</div>

</body>
</html>