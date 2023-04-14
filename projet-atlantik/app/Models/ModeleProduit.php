<?php
namespace App\Models;
use CodeIgniter\Model;


class ModeleConnection extends Model

{

    protected $table = 'client';

    protected $primaryKey = 'reference';

    /* ci-dessus on indique la table a 'mapper' */

    protected $allowedFields = ['prenom', 'nom'];

    /* champs pour lesquels insertion, et mises à jour sont autorisées

    Nota Bene : on n'autorisera pas les champs en AUTOINCREMENT */

 

    public function getclient($referenceclient = false)

    {

        if ($referenceclient === false) // pas de référence produit  en paramètre :

        {   // on retourne tous les client

            return $this->findAll(); // SELECT * FROM client

        }

        // $referenceProduit != NULL : on retourne le produit correspondant (en mode objet)

        return $this->where(['reference' => $referenceclient])->first();

        // équivalent a 'SELECT * FROM produit WHERE reference = '.$referenceclient

    }

}

 