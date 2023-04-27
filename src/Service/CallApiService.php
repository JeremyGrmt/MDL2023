<?php

namespace App\Service;

use Symfony\Contracts\HttpClient\HttpClientInterface;
class CallApiService
{
    private $client;
    private $api_Url;
    public function __construct(HttpClientInterface $client, string $api_Url) {
        $this->client = $client;
        $this->api_Url =  $api_Url;
    }
      
    /**
     *  fonction permettant de retourner sous formes d'array les donnees depuis l'api
     * @param string $table
     * @param type $id
     * @param string $URLparam
     * @return array
     */
    public function getAPI(string $table,$id = 0, string $URLparam = ""):array {
        
        $url = $this->api_Url. $table;       
        if($id !=0){
            $url .= '/'.$id;
        }
        $url .= $URLparam;
        
        
        $res = $this->client->request(
                'GET' ,
                $url);
        
        return $res->toArray()/*['hydra:members']*/;
    }
   
}


 