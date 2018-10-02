<?php

namespace Register\Entity;

use Doctrine\ORM\EntityRepository;
use Doctrine\ORM\Query\Expr\Join;

class PersonRepository extends EntityRepository
{
    public function getByRole($name){

        $alias = 'p';
        $tabela = 'Register\Entity\Person';

        $alias_ij1 = 'pr';
        $tabela_ij1 = 'Register\Entity\PersonRole';

        $alias_ij2 = 'r';
        $tabela_ij2 = 'Acl\Entity\Role';

        $where = "r.name LIKE '%".$name."%'";

        $qb = $this->getEntityManager()->createQueryBuilder();
        $qb->select(array(
            $alias
        ))
            ->from($tabela,$alias)
            ->innerJoin($tabela_ij1,$alias_ij1,JOIN::WITH, $qb->expr()->andx(
                $qb->expr()->eq('p.id', 'pr.person')
            ))
            ->innerJoin($tabela_ij2,$alias_ij2,JOIN::WITH, $qb->expr()->andx(
                $qb->expr()->eq('pr.role', 'r.id')
            ))
            ->where($where);

        if(!empty($qb->getQuery()->getResult())){
            return $qb->getQuery()->getResult();
        }else{
            return array();
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

    public function getForMenu($id,$role){
        $alias = 'p';
        $tabela = 'Register\Entity\Person';

        $alias_ij1 = 'pp';
        $tabela_ij1 = 'Register\Entity\PersonRole';

        $alias_ij2 = 'pr';
        $tabela_ij2 = 'Register\Entity\Role';

        $where = "pr.name LIKE '%".$role."%'";
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
                $qb->expr()->eq('pp.role', 'pr.id')
            ))
            ->where($where);

        if(!empty($qb->getQuery()->getResult())){
            return $qb->getQuery()->getResult();
        }else{
            return null;
        }
    }
}
