<!DOCTYPE html>

<html lang="fr">

<head>

    <meta charset="UTF-8">

    <meta http-equiv="X-UA-Compatible" content="IE=edge">

    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.2/dist/css/bootstrap.min.css" rel="stylesheet">

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.2/dist/js/bootstrap.bundle.min.js"></script>

    <title>eRabelais</title>

</head>

<body>

<div class="p-2 bg-dark text-white text-center">

  <h1>ATLANTIK

  </h1>

</div>

    <?php

        $session = session();

        if(!is_null($session->get('identifiant'))) : ?>

        
        <a href="<?php echo site_url('sedeconnecter') ?>">Se déconnecter</a>&nbsp;&nbsp;
        <a class="text-white"href="<?php echo site_url('creeuncompte') ?>">Tu a pas de compte crée le </a>
        <?php if ($session->get('profil') == 'SuperAdministrateur') : ?>

            <?php echo 'Utilisateur connecté : ' . $session->get('identifiant').'&nbsp;&nbsp;'; ?>


            <?php endif;  ?>

    <?php else : ?>
      <a class="text-dark" href="<?php echo site_url('Accueil') ?>"> Accueil </a>&nbsp;&nbsp;
      <a class="text-dark" href="<?php echo site_url('seconnecter') ?>">Se Connecter</a>&nbsp;&nbsp;
      <a class="text-dark" href="<?php echo site_url('AfficherLiaisons') ?>">Afficher les liaisons par secteur</a>&nbsp;&nbsp;
      <a class="text-dark" href="<?php echo site_url('AfficherTarifs') ?>">Afficher les tarifs pour une liaison</a>&nbsp;&nbsp;
      <a class="text-dark" href="<?php echo site_url('HorairesTraversées') ?>"> Visualiser les horaires de traversées – Réservation</a>&nbsp;&nbsp;
      <a class="text-dark" href="<?php echo site_url('creeuncompte') ?>">Tu a pas de compte crée le </a>&nbsp;&nbsp;
      
    <?php endif; ?>
