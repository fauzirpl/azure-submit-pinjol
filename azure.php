<?php
class Computer_Vision{
    public function __construct(){
  /**
   * Replace the addresses with the one given to you after signing up.
   * Replace the subscription_key with your API key
   */
    $this->azure_celebRecognition="https://southeastasia.api.cognitive.microsoft.com/vision/v2.0/models/celebrities/analyze";
    $this->azure_imageRecognition="https://southeastasia.api.cognitive.microsoft.com/vision/v1.0/describe";
    $this->subscription_key="2a1574067cab4b19a07c100235c92bdf";
  }
    public function recognize($image_url,$recognition_type){
        $data = array("url" => $image_url);
        if($recognition_type == "image"){
            $azure_url = $this->azure_imageRecognition;
        }else{
            echo "invalid recognition type";
        }
        $key=$this->subscription_key;
        $data_string = json_encode($data);
        $curl = curl_init($azure_url);
        curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);
        curl_setopt($curl, CURLOPT_POSTFIELDS, $data_string);
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1 );
        curl_setopt($curl, CURLOPT_POST,           1 );
        curl_setopt($curl, CURLOPT_HTTPHEADER, array(
          'Content-Type: application/json',
      'Ocp-Apim-Subscription-Key:'.$key
        ));
        $response = curl_exec($curl);
        if(curl_error($curl)) {
        echo 'error:' . curl_error($curl);
    }
    else {
        if($recognition_type == "image"){
            $json_object = json_decode($response, true);
            $description=$json_object['description']['captions'][0]['text'];
            $confidence=$json_object['description']['captions'][0]['confidence'];
            $confidence=$confidence*100;
            $confidence=round($confidence,1);
            $verif = ($confidence > 75) ? '<span class="badge badge-pill badge-success">Terpercaya</span>' : '<span class="badge badge-pill badge-danger">Di Blacklist</span>' ;
            $resp='<div class="alert alert-primary" role="alert">
            <strong>Hasil Analisa : '.$description.'<br>Status : '.$verif.'</strong></div>';
          }
}
          curl_close($curl);
        return $resp; 
    }
}
?>