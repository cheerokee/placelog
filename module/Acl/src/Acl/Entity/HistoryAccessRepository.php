<?php

namespace Acl\Entity;

use Doctrine\ORM\EntityRepository;

class HistoryAccessRepository extends EntityRepository
{
    public function getByYear($year){
        $alias = 'ha';
        $tabela = 'Acl\Entity\HistoryAccess';

        $where = "YEAR(ha.createdAt) = ".$year;

        $qb = $this->getEntityManager()->createQueryBuilder();
        $qb->select(array(
            $alias
        ))
            ->from($tabela,$alias)
            ->where($where);

        if(!empty($qb->getQuery()->getResult())){
            return $qb->getQuery()->getResult();
        }else{
            return null;
        }
    }
}