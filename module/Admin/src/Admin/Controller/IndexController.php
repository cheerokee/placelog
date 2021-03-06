<?php
namespace Admin\Controller;

use Zend\Mvc\Controller\AbstractActionController,
    Zend\View\Model\ViewModel;

class IndexController extends AbstractActionController{
    protected $em;

    public function __construct(){
    }

    public function indexAction(){

        return new ViewModel(array('em' => $this->getEm()));
    }

    public function printEtiquetaAction(){
        $this->layout()->setTemplate('layout/admin_auth.phtml');
        return new ViewModel(array('em' => $this->getEm()));
    }

    /**
     *
     * @return EntityManager
     */
    protected function getEm(){
        if(null === $this->em){
            $this->em = $this->getServiceLocator()->get('Doctrine\ORM\EntityManager');
            return $this->em;
        }
    }

    public function painelEtiquetaNfeAction(){
        return new ViewModel(array());
    }

    public function painelConsultaNfeAction(){
        return new ViewModel(array());
    }

    public function sendEtiquetaNfeAction(){
        $em = $this->getEm();
        $request = $this->getRequest();
        if($request->isPost()) {
            $data = $request->getPost()->toArray();

            $file = $_FILES['file'];
            $notas = array();
            $count = 0;
            $deletaveis = array();
            for($i = 0; $i < count($file['size']); $i++){
                $to_be_upload = $file['tmp_name'][$count];
                $extension = explode('/',$file['type'][$count]);
                $extension = $extension[count($extension) -1];
                $tmp = time() + $count;
                $new_file = '/xmls/xml_nota_'.$tmp.'.'.$extension;
                move_uploaded_file($to_be_upload,'public'.$new_file);

                $deletaveis[] = 'public'.$new_file;

                $xml = simplexml_load_string(file_get_contents('public'.$new_file));
                $gerais = null;
                $emitente = null;
                $destinatario = null;
                $total = null;
                $transporte = null;
                $volume = null;
                $prods = array();
                $produtos = array();

                foreach($xml as $i){
                    if(!empty($i->infNFe)){
                        foreach($i->infNFe as $j){

                            //Dados Gerais
                            $gerais = $j->ide;

                            //Dados do Emitente
                            $emitente = $j->emit;

                            //Dados do Destinatário
                            $destinatario = $j->dest;

                            //Dados dos produtos
                            $prods = $j->det;

                            //Dados Totais
                            $total = $j->total->ICMSTot;

                            //Dados Transporte
                            $transporte = $j->transp->transporta;

                            //Dados Volume
                            $volume = $j->transp->vol;

                        }

                        $gerais['chave_acesso'] = $i->infNFe[0]->attributes()[0];
                        foreach ($i->infNFe[0]->attributes() as $k => $v )
                        {
                            if($k == 'Id')
                            {
                                $gerais['chave_acesso'] = $v;
                            }
                        }
                    }
                }

                if(!empty($prods))
                {
                    foreach($prods as $item){
                        $produtos[] = $item->prod;
                    }
                }

                $notas[] = array(
                    'geral'         =>  $gerais,
                    'emitente'      =>  $emitente,
                    'destinatario'  =>  $destinatario,
                    'produtos'      =>  $produtos,
                    'total'         =>  $total,
                    'transporte'    =>  $transporte,
                    'volume'        =>  $volume
                );

                $count++;
                if($count == count($file['size']))
                break;
            }

            foreach($deletaveis as $deletavel)
            {
                unlink($deletavel);
            }

            $json = json_encode($notas);

            echo str_replace('@','',$json);
            die;
        }
    }

}
