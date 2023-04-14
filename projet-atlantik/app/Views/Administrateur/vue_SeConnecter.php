<!DOCTYPE html>
 <html>
    <head>
        <title>Formulaires Connection</title>
        <meta charset='utf-8'>
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
     </head>
     <body>
         <div class="container">
             <h1>Formulaire de Connexion</h1>
             <form class="needs-validation" novalidate>
                 <div class="form-row">
                     <div class="col-md-4 mb-3">
                         <label for="prenom">Mail</label>
                         <input type="text" class="form-control" id="Mail" placeholder="Mail" required>
                         <div class="valid-feedback">Ok !</div>
                         <div class="invalid-feedback">Valeur incorrecte</div>
                     </div>
                     <div class="col-md-4 mb-3">
                         <label for="nom">Mot de passe </label>
                         
                         <input type="password" name="pwd" size="6" type="text" class="form-control" id="motdepasse" placeholder="mot de passe" required>
                         <div class="valid-feedback">Ok !</div>
                         <div class="invalid-feedback">Valeur incorrecte</div>
                     </div>
                    
                 <div class="form-group">
                     <div class="form-check">
                       <input class="form-check-input" type="checkbox" value="" id="cgu" required>
                       <label class="form-check-label" for="cgu">Merci de bien vouloir respecter tout les règles d'autentification  </label>
                       <div class="invalid-feedback">Vous devez accepter les CGU pour continuer</div>
                     </div>
                 </div>
                 <button class="btn btn-dark" type="submit">Envoyer</button>
             </form>
         </div>
         <script>
           /*La fonction principale de ce script est d'empêcher l'envoi du formulaire si un champ a été mal rempli
            *et d'appliquer les styles de validation aux différents éléments de formulaire*/
           (function() {
             'use strict';
             window.addEventListener('load', function() {
               let forms = document.getElementsByClassName('needs-validation');
               let validation = Array.prototype.filter.call(forms, function(form) {
                 form.addEventListener('submit', function(event) {
                   if (form.checkValidity() === false) {
                     event.preventDefault();
                     event.stopPropagation();
                   }
                   form.classList.add('was-validated');
                 }, false);
               });
             }, false);
           })();
         </script>

