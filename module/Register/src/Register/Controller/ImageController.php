<?php
namespace Register\Controller;

use Base\Controller\CrudController;
use Register\Entity\Image;
use Zend\View\Model\ViewModel;
use Zend\Stdlib\Hydrator;

class ImageController extends CrudController{
    public function __construct(){
        $this->title = $this->translate("Imagem");
        $this->table = 'image';
        $this->entity = 'Register\Entity\\'.$this->table ;
        $this->service = 'Register\Service\\'.$this->table ;
        $this->form = 'Register\Form\\'.$this->table ;
        $this->controller = "image";
        $this->route = "image/defaults";

        $this->_listView = array(
            'title' => $this->title,
            'icon' => 'fa-image',
            'route' => $this->route,
            'controller' => $this->controller,
            'actions' => array(
                'enable' =>true,
                'defaults' => array(
                    'edit' => array(
                        'enable' => true,
                        'class' => 'btn btn-info',
                        'icon' => 'fa fa-edit'
                    ),
                    'delete' => array(
                        'enable' => true,
                        'class' => 'btn btn-danger decision',
                        'icon' => 'fa fa-trash'
                    ),
                    'view' => array(
                        'enable' => false,
                        'class' => 'btn btn-info',
                        'icon' => 'fa fa-eye'
                    ),
                ),
            ),
            'fields' => array(
                'id'=>array(
                    'label' => $this->translate('Id'),
                    'list' => true,
                ),
                'title'=>array(
                    'label' => $this->translate('Título'),
                    'list' => true,
                ),
                'image'=>array(
                    'label' => $this->translate('Imagem'),
                    'list' => true,
                )
            ),
        );
    }

    function camel2dashed($className) {
        return strtolower(preg_replace('/([^A-Z-])([A-Z])/', '$1-$2', $className));
    }

    public function recortarAction(){
        $croppedImage = $_FILES['croppedImage'];
        $to_be_upload = $croppedImage['tmp_name'];
        $extension = explode('/',$croppedImage['type']);
        $extension = $extension[count($extension) -1];
        $time = time();
        $new_file = '/img/images/cropped-image_'.$time.'.'.$extension;
        $image_name = 'cropped-image_'.$time.'.'.$extension;

        move_uploaded_file($to_be_upload,'public'.$new_file);
        echo json_encode(array('image' => $new_file,'image_name' => $image_name));
        exit();
    }

    public function newCustomAction(){

        $request = $this->getRequest();

        if($request->isPost()) {
            $post = $request->getPost()->toArray();
            $post['reference'] = $this->camel2dashed($post['reference']);
            /**
             * @var \Register\Service\Image $service
             */
            $service = $this->getServiceLocator()->get($this->service);
            $image = $service->insert($post);
            if($image instanceof Image){
                $this->flashMessenger()->addSuccessMessage("Imagem cadastrada com sucesso!");
            }else{
                $this->flashMessenger()->addErrorMessage("Houve um erro ao cadastrar a imagem!");
            }

            try{
                $url = $this->redirect()->toRoute($post['reference'].'/defaults',array(
                    'controller' => $post['reference'],
                    'action' =>'images',
                    'id' => $post['reference_id']
                ));
            }catch (\Exception $e)
            {
                try{
                    $url = $this->redirect()->toRoute($post['reference'] . '/default', array(
                        'controller' => $post['reference'],
                        'action' => 'images',
                        'id' => $post['reference_id']
                    ));
                }catch (\Exception $e) {
                    $url = $this->redirect()->toRoute('gallery/defaults', array(
                        'controller'    => 'Image',
                        'action'        => 'gallery'
                    ));
                }
            }

            return $url;
        }
    }

    public function galleryAction()
    {
        return new ViewModel(array(
            'em' => $this->getEm(),
            'controller' => 'image',
            'entity' => $this->entity
        ));
    }

    public function imagesAction()
    {
        $url = $this->redirect()->toRoute('gallery');
    }
}

?>