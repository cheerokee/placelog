<?php
namespace DataFrete\Service;

use Base\Service\AbstractService;


class Sincronization extends AbstractService{
    /**
     * @var \DataFrete\Entity\Config $db_config;
     */
    public $db_config = null;
    public $client = null;

    public function __construct(\Doctrine\ORM\EntityManager $em) {
        parent::__construct($em);

        $this->db_config = $em->getRepository('DataFrete\Entity\Config')->findOneByActive(1);
        $this->client = $this->connectSoap();

    }

    public function connectSoap()
    {
        //$account = $this->config->getAccount();
        //$environment = $this->config->getEnvironment();
        //$environment = str_replace("stable", "", $environment);

        $options['encoding'] = "UTF-8";
        //$options['user_agent'] = "Jakarta Commons-HttpClient/3.1";
        $options['login'] = $this->db_config->getLogin();
        $options['password'] = $this->db_config->getPassword();
        //$options['chave'] = $this->db_config->getToken();
        //$options['cache_wsdl'] = WSDL_CACHE_NONE;
        //$options['timeout'] = 10;
        //$options['connecttimeout'] = 10;
        //$options['sslverifypeer'] = false;
        $options['soap_version'] = SOAP_1_1;

        //$options['connection_timeout'] = 10;
        //$options['features'] = SOAP_SINGLE_ELEMENT_ARRAYS;
        ini_set("default_socket_timeout", 15);

        $options['location'] = 'http://www.lucapisistemas.com.br/demonstracao/busca-frete-web-service/';
        $options['uri'] = 'http://www.lucapisistemas.com.br/demonstracao/busca-frete-web-service/';

        if(!$this->stopSoap){
            try {
                $soap = new \Zend\Soap\Client($this->db_config->getEndPoint(), $options);
            } catch (\SoapFault $proxy) {
                $this->addErrorMessage($proxy->getMessage());
                throw new \Exception("Con: ".$proxy->getMessage(), $proxy->getCode());
            }
        }
        return $soap;
    }

    public function getValorFrete(){
        $client = $this->client;
        $json_filtro = json_encode(array(
            'exibir_resultados' => 0,
            'doc_destinatario'  => '39474617843',
            'tipo_ordenacao'    => 0,
            'cod_empresa'       => 001
        ));

        $json_products = json_encode(array(
            'sku' => '101125',
            'preco' => 100.00,
            'peso' => 1.54,
            'descricao' => 'Produto Teste',
            'largura' => 0.55,
            'comprimento' => 0.47,
            'altura' => 0.12,
            "qtd" => 1,
            'volume' => 1
        ));

        $retorno = $client->getValorFrete(
            $this->db_config->getLogin(),
            $this->db_config->getPassword(),
            $this->db_config->getToken(),
            '14600000',
            '81260900',
            $json_products,
            $json_filtro
        );

        var_dump($retorno);
        die;
    }

    public function teste(){
        $client = $this->client;
        $json_filtro = json_encode(array(
            'emissao' => array('dt_inicio' => '2018-08-10','dt_fim' => '2018-08-10'),
            'situacao' => '0',
            'cod_empresa' => '001',
            'conhecimento_transporte' => array()
        ));

        $retorno = $client->getConhecimentoTransporte(
            $this->db_config->getLogin(),
            $this->db_config->getPassword(),
            $this->db_config->getToken(),
            $json_filtro
        );


        var_dump($this->db_config->getLogin(),$this->db_config->getPassword(),$this->db_config->getToken(),$this->db_config->getEndPoint(),$retorno);
        //var_dump($this->connectSoap());
        die;
    }
}


























?>