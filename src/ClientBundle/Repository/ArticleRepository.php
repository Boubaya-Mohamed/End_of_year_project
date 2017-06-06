<?php

namespace ClientBundle\Repository;

/**
 * ArticleRepository
 *
 * This class was generated by the Doctrine ORM. Add your own custom
 * repository methods below.
 */
class ArticleRepository extends \Doctrine\ORM\EntityRepository
{
  //*****************************Find Resto Parmater Nom_resto
  public function findByEtablissement($resto_Nom){
$query = $this->createQueryBuilder('A');
  $query= $query->select('A.id,A.path,A.prix,A.nom, R.name,A.type')
  ->innerJoin('A.etablissement','R')
  ->where('R.name = :Resto_Nom')
   ->setParameter('Resto_Nom', $resto_Nom);
return $query->getQuery()->getResult();

  }



  //*****************************Find Article Parmater Nom_resto and Id article

  public function findByNom($resto_Nom,$Article_ID)
{
$query = $this->createQueryBuilder('a');
  $query =$query
      ->select('a')
      ->innerJoin('a.etablissement','r')
      ->where('a.id=:Article_ID')
      ->andWhere('r.name = :Resto_Nom')
      ->setParameter('Resto_Nom',$resto_Nom)
      ->setParameter('Article_ID',$Article_ID) ;

 return $query->getQuery()->getResult() ;

}

//Find  one Article with ther Nom
  public function findOneByNom($NomArticle)
  {
      $query = $this->createQueryBuilder('A') ;
      $query =$query
          ->select('A.id')
          ->where('A.nom =:NomArticle')
          ->setParameter('NomArticle', $NomArticle);
      return $query->getQuery()->getResult();
  }

}