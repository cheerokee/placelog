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

    public function sendEtiquetaNfeAction(){
        $em = $this->getEm();
        $request = $this->getRequest();
        if($request->isPost()) {
            $data = $request->getPost()->toArray();



            $file = $_FILES['file'];
            $to_be_upload = $file['tmp_name'];
            $extension = explode('/',$file['type']);
            $extension = $extension[count($extension) -1];
            $new_file = '/xmls/xml_nota.'.$extension;
            move_uploaded_file($to_be_upload,'public'.$new_file);
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

                        //Datos Transporte
                        $transporte = $j->transp->transporta;

                        //Datos Volume
                        $volume = $j->transp->vol;
                    }

                    $gerais['chave_acesso'] = $i->infNFe[0]->attributes()[0];
                }
            }

            if(!empty($prods))
            {
                foreach($prods as $item){
                    $produtos[] = $item->prod;

                }
            }

            $json = json_encode(array(
                'geral'         =>  $gerais,
                'emitente'      =>  $emitente,
                'destinatario'  =>  $destinatario,
                'produtos'      =>  $produtos,
                'total'         =>  $total,
                'transporte'    =>  $transporte,
                'volume'    =>  $volume
            ));

            echo str_replace('@','',$json);
            die;
        }
    }

}
