<?php
namespace Library\Entities;

class Fichevin extends \Library\Entity
{
  protected $nom,
            $producteur,
            $annee,
            $appelation,
            $cepage,
            $pays,
            $region,
            $alcool,
            $date,
            $code_saq,
            $prix,
            $teinte,
            $nez_intensite,
            $arome,
            $nez_impression,
            $bouche_intensite,
            $persistance,
            $saveur,
            $acidite,
            $tanin,
            $bouche_impression,
            $couleur;

  // SETTERS

  public function setNom($nom)
  {
    if (is_string($nom) && !empty($nom))
    {
      $this->nom = $nom;
    }
  }

  public function setProducteur($producteur)
  {
    if (is_string($producteur) && !empty($producteur))
    {
      $this->producteur = $producteur;
    }
  }

  public function setAnnee($annee)
  {
      $this->annee = (int) $annee;
  }

  public function setAppelation($appelation)
  {
    if (is_string($appelation) && !empty($appelation))
    {
      $this->appelation = $appelation;
    }
  }

    public function setCepage($cepage)
  {
    if (!empty($cepage))
    {
      $this->cepage = $cepage;
    }
  }


  public function setPays($pays)
  {
    if (is_string($pays) && !empty($pays))
    {
      $this->pays = $pays;
    }
  }

  public function setRegion($region)
  {
    if (is_string($region) && !empty($region))
    {
      $this->region = $region;
    }
  }

  public function setAlcool($alcool)
  {
    if (is_string($alcool) && !empty($alcool))
    {
      $this->alcool = $alcool;
    }
  }

  public function setDate($date)
  {
    $this->date = $date;
  }

  public function setCode_saq($code_saq)
  {
    if (is_string($code_saq) && !empty($code_saq))
    {
      $this->code_saq = $code_saq;
    }
  }

  public function setPrix($prix)
  {
    if (is_string($prix) && !empty($prix))
    {
      $this->prix = $prix;
    }
  }

  public function setTeinte($teinte)
  {
    if (is_string($teinte) && !empty($teinte))
    {
      $this->teinte = $teinte;
    }
  }

  public function setNez_intensite($nez_intensite)
  {
    if (is_string($nez_intensite) && !empty($nez_intensite))
    {
      $this->nez_intensite = $nez_intensite;
    }
  }

  public function setArome($arome)
  {
    if (is_string($arome) && !empty($arome))
    {
      $this->arome = $arome;
    }
  }

  public function setNez_impression($nez_impression)
  {
    if (is_string($nez_impression) && !empty($nez_impression))
    {
      $this->nez_impression = $nez_impression;
    }
  }

  public function setBouche_intensite($bouche_intensite)
  {
    if (is_string($bouche_intensite) && !empty($bouche_intensite))
    {
      $this->bouche_intensite = $bouche_intensite;
    }
  }

  public function setPersistance($persistance)
  {
    if (is_string($persistance) && !empty($persistance))
    {
      $this->persistance = $persistance;
    }
  }

  public function setSaveur($saveur)
  {
    if (is_string($saveur) && !empty($saveur))
    {
      $this->saveur = $saveur;
    }
  }

  public function setAcidite($acidite)
  {
    if (is_string($acidite) && !empty($acidite))
    {
      $this->acidite = $acidite;
    }
  }

  public function setTanin($tanin)
  {
    if (is_string($tanin) && !empty($tanin))
    {
      $this->tanin = $tanin;
    }
  }

  public function setBouche_impression($bouche_impression)
  {
    if (is_string($bouche_impression) && !empty($bouche_impression))
    {
      $this->bouche_impression = $bouche_impression;
    }
  }

  public function setCouleur($couleur)
  {
    if (is_string($couleur) && !empty($couleur))
    {
      $this->couleur = $couleur;
    }
  }

  // GETTERS

  public function nom() {return $this->nom;}
  public function producteur() {return $this->producteur;}
  public function annee() {return $this->annee;}
  public function appelation() {return $this->appelation;}
  public function cepage() {return $this->cepage;}
  public function pays() {return $this->pays;}
  public function region() {return $this->region;}
  public function alcool() {return $this->alcool;}
  public function date() {return $this->date;}
  public function code_saq() {return $this->code_saq;}
  public function prix() {return $this->prix;}
  public function teinte() {return $this->teinte;}
  public function nez_intensite() {return $this->nez_intensite;}
  public function arome() {return $this->arome;}
  public function nez_impression() {return $this->nez_impression;}
  public function bouche_intensite() {return $this->bouche_intensite;}
  public function persistance() {return $this->persistance;}
  public function saveur() {return $this->saveur;}
  public function acidite() {return $this->acidite;}
  public function tanin() {return $this->tanin;}
  public function bouche_impression() {return $this->bouche_impression;}
  public function couleur() {return $this->couleur;}

}
