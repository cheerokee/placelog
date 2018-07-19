<?php

namespace Base\Service;

use Doctrine\ORM\EntityManager;
use Zend\Stdlib\Hydrator;

abstract class AbstractService 
{

    protected $em;
    
    protected $entity;

    public function __construct(EntityManager $em){
        $this->em = $em;
    }

    public function insert(array $data)
    {
        if(!empty($data)){
            foreach($data as $k => $value){
                if($value == '')
                    $value = null;
                $data[$k] = $value;
            }
        }

        $entity = new $this->entity($data);

        (new Hydrator\ClassMethods())->hydrate($data, $entity);

        $this->em->persist($entity);
        $this->em->flush();
       
        return $entity;    
        
    }
    
    public function update(array $data)
    {
        if(!empty($data)){
            foreach($data as $k => $value){
                if($value == '')
                    $value = null;
                $data[$k] = $value;
            }
        }

        $entity = $this->em->getReference($this->entity,$data['id']);
        (new Hydrator\ClassMethods())->hydrate($data, $entity);
     
        $this->em->persist($entity);
        $this->em->flush();
        $entity->setId($data['id']);
        
        return $entity;
    }
    
    public function delete($id)
    {
        $entity = $this->em->getReference($this->entity, $id);
       
        if($entity)
        {
            $this->em->remove($entity);
            $this->em->flush();
            return $id;
        }
    }

    public function smartCopy($source, $dest, $options=array('folderPermission'=>0777,'filePermission'=>0777))
    {
        $result=false;

        if (is_file($source)) {
            if ($dest[strlen($dest)-1]=='/') {
                if (!file_exists($dest)) {
                    cmfcDirectory::makeAll($dest,$options['folderPermission'],true);
                }
                $__dest=$dest."/".basename($source);
            } else {
                $__dest=$dest;
            }
            $result=copy($source, $__dest);
            chmod($__dest,$options['filePermission']);

        } elseif(is_dir($source)) {
            if ($dest[strlen($dest)-1]=='/') {
                if ($source[strlen($source)-1]=='/') {
                    //Copy only contents
                } else {
                    //Change parent itself and its contents
                    $dest=$dest.basename($source);
                    @mkdir($dest);
                    chmod($dest,$options['filePermission']);
                }
            } else {
                if ($source[strlen($source)-1]=='/') {
                    //Copy parent directory with new name and all its content
                    @mkdir($dest,$options['folderPermission']);
                    chmod($dest,$options['filePermission']);
                } else {
                    //Copy parent directory with new name and all its content
                    @mkdir($dest,$options['folderPermission']);
                    chmod($dest,$options['filePermission']);
                }
            }

            $dirHandle=opendir($source);
            while($file=readdir($dirHandle))
            {
                if($file!="." && $file!="..")
                {
                    if(!is_dir($source."/".$file)) {
                        $__dest=$dest."/".$file;
                    } else {
                        $__dest=$dest."/".$file;
                    }
                    //echo "$source/$file ||| $__dest<br />";
                    $result=smartCopy($source."/".$file, $__dest, $options);
                }
            }
            closedir($dirHandle);

        } else {
            $result=false;
        }
        return $result;
    }

    public function insertFile($entity,$campo,$destino,$tabela = 'cliente'){
        mkdir($destino,0777);

        $extension = explode('.',$_FILES[$campo]['name']);
        $uploaddir = $destino;
        $docDestinoName = $tabela."_".$entity->getId().".".$extension[count($extension)-1];
        $destino = $uploaddir . $docDestinoName ;
        $origem = $_FILES[$campo]['tmp_name'];

        if ($this->smartCopy($origem, $destino)) {
            $entity->setImage($docDestinoName);
        }

        $this->em->persist($entity);
        $this->em->flush();

        return $entity;
    }


}
