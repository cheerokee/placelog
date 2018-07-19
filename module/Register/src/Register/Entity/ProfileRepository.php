<?php
namespace Register\Entity;
use Doctrine\ORM\EntityRepository;
class ProfileRepository extends EntityRepository
{
    public function findFilter($fields){
        $alias = 'p';
        $tabela = 'Register\Entity\Profile';
        foreach($fields as $type=>$v){          
            
            foreach($v as $nome_campo => $valor){                
                
                if($type == "like"){                   
                    $tmp[] = " ".$alias.".".$nome_campo." LIKE '%".$valor."%' ";
                }
                if($type == "exactly"){
                    $tmp[] = " ".$alias.".".$nome_campo." = ".$valor." ";
                }
               
            }
        }
        
        $where = trim(implode('AND',$tmp));       
        
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

