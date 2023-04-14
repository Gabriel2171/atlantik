<?php

namespace App\Models;

use CodeIgniter\Model;

 

class Modeleliaison extends Model

{

  protected $table = 'liaison ';

  protected$primaryKey = 'NOLIAISON';

  protected $useAutoIncrement = true;

  protected $returnType = 'object'; 
 

  protected $allowedFields = ['NOPORT_DEPART', 'NOSECTEUR ', 'NOPORT_ARRIVEE', 'DISTANCE'];


  public function getAllLiaisonport()

  {
      return $this->join('secteur', 'liaison.nosecteur = secteur.nosecteur', 'inner')

      ->join('port portDepart', 'liaison.NOPORT_DEPART = NOPORT_DEPART.noport',  'inner')

      ->join('produit prod', 'liaison.NOPORT_ARRIVEE = NOPORT_ARRIVEE.noport',  'inner')

      ->select('secteur.nom, Noliaison,distance,portDepart.nom as pdNom, portArrivee.nom as paNom ')

      ->get();

      // ->get() : pour générer le tableau automatiquement,

      // si non : ->get()->getResult();  (voir vue associée)

  }

}