<?php

namespace App\Controllers;

use App\Models\ModeleProduit; //donne accès à la classe ModeleProduit

helper(['assets']);
helper(['form']); // donne accès aux fonctions du helper 'asset'

 

class Visiteur extends BaseController

{
    public function seDeconnecter()

    {

        session()->destroy();

        returnredirect()->to('seconnecter');

    } // Fin seDeconnecter

            public function SeConnecter()

            {

                $data['TitreDeLaPage'] = 'SeConnecter';

                /* TEST SI FORMULAIRE POSTE OU SI APPEL DIRECT (EN GET) */

                if (!isset($_POST['btnOK'])) { // si le formulaire n'a pas été soumis

                    helper('form');

                    return view('Templates/Header')

                    . view('Administrateur/vue_SeConnecter', $data)

                    . view('Templates/Footer');
                } else { // le formulaire a été soumis

                    $data['mailDeLaPersonne'] = $this->request->getPost('txtmail');

                    $data['mdpDeLaPersonne'] = $this->request->getPost('txtmdp');
        
                    /* récup. données formulaire (getPost), et ajout entrée dans $data */
        
                    return view('Administrateur/vue_apresConnections', $data);
        
                    /* appel vue avec injection tableau associatif $data */
        
                }
        
        
            } 

                        public function MentionLegal()

                        {

                            $data['TitreDeLaPage'] = 'MentionLegal';

                            /* TEST SI FORMULAIRE POSTE OU SI APPEL DIRECT (EN GET) */

                            if (!$this->request->is('post')) {


                                /* le formulaire n'a pas été posté, on retourne le formulaire */

                                return view('Templates/Header')

                                . view('Administrateur/vue_MentionLegal', $data)

                                . view('Templates/Footer');
                            }

                            /* SI FORMULAIRE NON POSTE, LE CODE QUI SUIT N'EST PAS EXECUTE */

                            /* VALIDATION DU FORMULAIRE */

                            $reglesValidation = [

                                'txtReference' => 'required|alpha_numeric|exact_length[3]',

                                // obligatoire, 3 caractères, exactement

                                'txtLibelle' => 'required|string|max_length[30]',

                                // obligatoire, chaîne de carac. <= 30 carac.

                                'txtPrixHT' => 'permit_empty|numeric',

                                // vide ou numérique

                                'txtQuantiteEnStock' => 'permit_empty|integer',

                                // vide ou integer

                                'txtNomFichierImage' => 'permit_empty|string|max_length[20]',

                                // vide ou chaîne <= 20 carac.

                            ];

                            if (!$this->validate($reglesValidation)) {

                                /* formulaire non validé, on renvoie le formulaire */

                                $data['TitreDeLaPage'] = "Saisie produit incorrecte";

                                return view('Templates/Header')

                                . view('Administrateur/vue_MentionLegal', $data)

                                . view('Templates/Footer');

                            }

                            /* SI FORMULAIRE NON VALIDE, LE CODE QUI SUIT N'EST PAS EXECUTE */

                            /* INSERTION PRODUIT SAISI DANS BDD */

                            $donneesAInserer = array(

                                'reference' => $this->request->getPost('txtReference'),

                                'libelle' => $this->request->getPost('txtLibelle'),

                                'prixht' => $this->request->getPost('txtPrixHT'),

                                'quantiteenstock' => $this->request->getPost('txtQuantiteEnStock'),

                                'image' => $this->request->getPost('txtNomFichierImage'),

                            ); // reference, libelle, prixht, quantiteenstock, image : champs de la table 'produit'

                            $modelProduit = newModeleProduit(); //instanciation du modèle

                            $data['nbDeLignesAffectees'] = $modelProduit->save($donneesAInserer);

                            // save, provoque insert sur la table mappée (produit, ici)

                            return view('Templates/Header')

                                .view('Administrateur/vue_MentionLegal', $data)

                                .view('Templates/Footer');

                        } // ajouterProduit

      public function creeuncompte()

{

    $data['TitreDeLaPage'] = 'creeuncompte';

    /* TEST SI FORMULAIRE POSTE OU SI APPEL DIRECT (EN GET) */

    if (!$this->request->is('post')) {


        /* le formulaire n'a pas été posté, on retourne le formulaire */

        return view('Templates/Header')

        . view('Administrateur/vue_creeUnCompte', $data)

        . view('Templates/Footer');

    }

    /* SI FORMULAIRE NON POSTE, LE CODE QUI SUIT N'EST PAS EXECUTE */

    /* VALIDATION DU FORMULAIRE */

    $reglesValidation = [

        'txtmail0' => 'required|alpha_numeric|exact_length[3]',

        // obligatoire, 3 caractères, exactement

        'txtLibelle' => 'required|string|max_length[30]',

        // obligatoire, chaîne de carac. <= 30 carac.

        '' => 'permit_empty|numeric',

    ];

    if (!$this->validate($reglesValidation)) {

        /* formulaire non validé, on renvoie le formulaire */

        $data['TitreDeLaPage'] = "Saisie produit incorrecte";

        return view('Templates/Header')

        . view('Administrateur/vue_creeUnCompte', $data)

        . view('Templates/Footer');

    }

    /* SI FORMULAIRE NON VALIDE, LE CODE QUI SUIT N'EST PAS EXECUTE */

    /* INSERTION PRODUIT SAISI DANS BDD */

    $donneesAInserer = array(

        'reference' => $this->request->getPost('txtReference'),

        'libelle' => $this->request->getPost('txtLibelle'),

        'prixht' => $this->request->getPost('txtPrixHT'),

        'quantiteenstock' => $this->request->getPost('txtQuantiteEnStock'),

        'image' => $this->request->getPost('txtNomFichierImage'),

    ); // reference, libelle, prixht, quantiteenstock, image : champs de la table 'produit'

    $modelProduit = newModeleProduit(); //instanciation du modèle

    $donnees['nbDeLignesAffectees'] = $modelProduit->save($donneesAInserer);

    // save, provoque insert sur la table mappée (produit, ici)

    return view('Templates/Header')

        .view('Administrateur/vue_creeUnCompte', $donnees)

        .view('Templates/Footer');

} // ajouterProduit


public function ajouterLiaison()

{

    $modeleCommande = new ModeleCommande(); //instanciation du modèle

    $donnees['lesCommandes'] = $modeleCommande->getAllCommandesProduits();

    $donnees['TitreDeLaPage'] = "Liste des liaison avec leurs port";

    return view('Templates/Header')

    . view('Administrateur/vue_Afficher_liaison', $donnees)

    . view('Templates/Footer');

  }
}