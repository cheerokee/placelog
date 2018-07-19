<?php

namespace Register\Entity;

use Doctrine\ORM\EntityRepository;

class ImageRepository extends EntityRepository
{
    public function getFeatureds($reference = null,$reference_id = null,$category = null)
    {
        $where = "";

        if($reference != null)
        {
            $db_reference_image = $this->getEntityManager()->getRepository('Register\Entity\ReferenceImage')->findOneByChave($reference);
            if($db_reference_image instanceof ReferenceImage)
            {
                $where .= " AND i.referenceImage = ".$db_reference_image->getId();
            }
        }

        if($reference_id != null)
        {
            $where .= " AND i.reference_id = ".$reference_id;
        }
        
        //Se vier categoria como parâmetro
        if($category != null)
        {
            //Se o parametro é uma instancia da classe
            if($category instanceof Category)
            {
                //Nesse caso o category é uma classe e atribuimos apenas o id
                $id_category = $category->getId();

                $db_category = $category;
            }else{//Se o parametro for apenas o id da categoria
                //Nesse caso category é o id apenas
                $id_category = $category;

                //Sendo id buscamos a classe
                $db_category = $this->getEntityManager()
                    ->getRepository('Register\Entity\CategoryImage')
                    ->findOneById($category);
            }

            $where .= " AND (i.category = ".$id_category;
            //Buscando todas as categorias filhas, nivel 1
            /*
                               Pai
                                |
                            ---------
                            |       |
                            F1      F2
            */
            $db_category_filhos = $this->getEntityManager()
                ->getRepository('Register\Entity\CategoryImage')
                ->findByCategory($db_category);
            //Se tiver categorias filhas
            if(!empty($db_category_filhos)){
                //Enquanto tiver filhas, busca em largura
                /*
                               Pai
                                |
                            ---------
                            |       |
                    LOOP1 ->F1    ->F2
                            |       |
                          -----   -----
                          |   |   |   |
                   LOOP2  F3  F4  F5  F6  --> Merge de arrays de filhas de F1 e de F2
                */
                while(!empty($db_category_filhos)) {
                    //Usado para armazenar Id de todos os filhos para jogar na query no IN
                    $ides = array();
                    //Usado para ser um array mesclado de todos os filhos do nivel 2 para frente
                    //Sendo um nível de cada vez, a cada nivel o array é zerado.
                    $arr_filhos = array();
                    foreach ($db_category_filhos as $db_category_filho) {
                        $ides[] = $db_category_filho->getId();

                        $db_category_filhos = $this->getEntityManager()
                            ->getRepository('Register\Entity\CategoryImage')
                            ->findOneByCategory($db_category_filho);

                        if(!empty($db_category_filhos)){
                            $arr_filhos = array_merge($arr_filhos,$db_category_filhos);
                        }
                    }

                    $db_category_filhos = $arr_filhos;

                    $where .= " OR i.category IN (".implode(',',$ides).")";
                }
            }

            $where .= ")";
        }

        $qb = $this->getEntityManager()->createQueryBuilder();
        $qb->select(array(
            'i'
        ))
            ->from('Register\Entity\Image', 'i')
            ->where('1=1'.$where)
            ->orderBy('i.featured','Desc');

        if(!empty($qb->getQuery()->getResult())){
            return $qb->getQuery()->getResult();
        }else{
            return null;
        }
    }

    public function getLastImages($reference = null,$reference_id = null, $category = null,$db_person = null)
    {
        $where = "";

        if($reference != null)
        {
            $db_reference_image = $this->getEntityManager()->getRepository('Register\Entity\ReferenceImage')->findOneByChave($reference);
            if($db_reference_image instanceof ReferenceImage)
            {
                $where .= " AND i.referenceImage = ".$db_reference_image->getId();
            }
        }

        if($reference_id != null)
        {
            $where .= " AND i.reference_id = ".$reference_id;
        }

        if($db_person != null)
        {
            $where .= " AND i.person = ".$db_person->getId();
        }

        //Se vier categoria como parâmetro
        if($category != null)
        {
            //Se o parametro é uma instancia da classe
            if($category instanceof Category)
            {
                //Nesse caso o category é uma classe e atribuimos apenas o id
                $id_category = $category->getId();

                $db_category = $category;
            }else{//Se o parametro for apenas o id da categoria
                //Nesse caso category é o id apenas
                $id_category = $category;

                //Sendo id buscamos a classe
                $db_category = $this->getEntityManager()
                    ->getRepository('Register\Entity\CategoryImage')
                    ->findOneById($category);
            }

            $where .= " AND (i.category = ".$id_category;
            //Buscando todas as categorias filhas, nivel 1
            /*
                               Pai
                                |
                            ---------
                            |       |
                            F1      F2
            */
            $db_category_filhos = $this->getEntityManager()
                ->getRepository('Register\Entity\CategoryImage')
                ->findByCategory($db_category);
            //Se tiver categorias filhas
            if(!empty($db_category_filhos)){
                //Enquanto tiver filhas, busca em largura
                /*
                               Pai
                                |
                            ---------
                            |       |
                    LOOP1 ->F1    ->F2
                            |       |
                          -----   -----
                          |   |   |   |
                   LOOP2  F3  F4  F5  F6  --> Merge de arrays de filhas de F1 e de F2
                */
                while(!empty($db_category_filhos)) {
                    //Usado para armazenar Id de todos os filhos para jogar na query no IN
                    $ides = array();
                    //Usado para ser um array mesclado de todos os filhos do nivel 2 para frente
                    //Sendo um nível de cada vez, a cada nivel o array é zerado.
                    $arr_filhos = array();
                    foreach ($db_category_filhos as $db_category_filho) {
                        $ides[] = $db_category_filho->getId();

                        $db_category_filhos = $this->getEntityManager()
                            ->getRepository('Register\Entity\CategoryImage')
                            ->findOneByCategory($db_category_filho);

                        if(!empty($db_category_filhos)){
                            $arr_filhos = array_merge($arr_filhos,$db_category_filhos);
                        }
                    }

                    $db_category_filhos = $arr_filhos;

                    $where .= " OR i.category IN (".implode(',',$ides).")";
                }
            }

            $where .= ")";
        }

        $qb = $this->getEntityManager()->createQueryBuilder();
        $qb->select(array(
            'i'
        ))
            ->from('Register\Entity\Image', 'i')
            ->where('1=1'.$where)
            ->orderBy('i.id','Desc');

        if(!empty($qb->getQuery()->getResult())){
            return $qb->getQuery()->getResult();
        }else{
            return null;
        }
    }

}
