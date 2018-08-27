<?php

namespace Register\Entity;

use Doctrine\ORM\EntityRepository;
use Doctrine\ORM\Query\Expr\Join;

class PersonRepository extends EntityRepository
{
    public function getByProfile($key,$company = null,$limit = null,$rand = false){

        $alias = 'p';
        $tabela = 'Register\Entity\Person';

        $alias_ij1 = 'pp';
        $tabela_ij1 = 'Register\Entity\PersonProfile';

        $alias_ij2 = 'pr';
        $tabela_ij2 = 'Register\Entity\Profile';

        $where = "pr.chave LIKE '%".$key."%'";

        if($company instanceof Person){
            $where .= " AND p.company = ".$company->getId();
        }


        $qb = $this->getEntityManager()->createQueryBuilder();
        $qb->select(array(
            $alias
        ))
            ->from($tabela,$alias)
            ->innerJoin($tabela_ij1,$alias_ij1,JOIN::WITH, $qb->expr()->andx(
                $qb->expr()->eq('p.id', 'pp.person')
            ))
            ->innerJoin($tabela_ij2,$alias_ij2,JOIN::WITH, $qb->expr()->andx(
                $qb->expr()->eq('pp.profile', 'pr.id')
            ))
            ->where($where);
        if($limit) {
            $qb->setMaxResults($limit);
        }

        if(!empty($qb->getQuery()->getResult())){
            if($rand)
            {
                $results = $qb->getQuery()->getResult();
                //Randomizar
                shuffle($results);

                return $results;
            }else{
                return $qb->getQuery()->getResult();
            }
        }else{
            return null;
        }
    }
    
    public function findByEmailAndPassword($email, $password)
    {
        $person = $this->findOneByEmail($email);
        
        if($person)
        {
            $hashSenha = $person->encryptPassword($password);
            if($hashSenha == $person->getPassword())
                return $person;
            else
                return false;
        }
        else
            return false;
    }
    
    public function findArray()
    {
        $persons = $this->findAll();
        $a = array();
        foreach($persons as $person)
        {
            $a[$person->getId()]['id'] = $person->getId();
            $a[$person->getId()]['name'] = $person->getName();
            $a[$person->getId()]['email'] = $person->getEmail();
        }
        
        return $a;
    }

    public function getForMenu($id,$profile){
        $alias = 'p';
        $tabela = 'Register\Entity\Person';

        $alias_ij1 = 'pp';
        $tabela_ij1 = 'Register\Entity\PersonProfile';

        $alias_ij2 = 'pr';
        $tabela_ij2 = 'Register\Entity\Profile';

        $where = "pr.chave LIKE '%".$profile."%'";
        $where .= " AND p.id <> ".$id;

        $qb = $this->getEntityManager()->createQueryBuilder();
        $qb->select(array(
            $alias
        ))
            ->from($tabela,$alias)
            ->innerJoin($tabela_ij1,$alias_ij1,JOIN::WITH, $qb->expr()->andx(
                $qb->expr()->eq('p.id', 'pp.person')
            ))
            ->innerJoin($tabela_ij2,$alias_ij2,JOIN::WITH, $qb->expr()->andx(
                $qb->expr()->eq('pp.profile', 'pr.id')
            ))
            ->where($where);

        if(!empty($qb->getQuery()->getResult())){
            return $qb->getQuery()->getResult();
        }else{
            return null;
        }
    }
}
