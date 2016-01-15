<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed'); 
 
class Instagram 
{
	//português - Você pode obter o access token e id de usuario em http://www.pinceladasdaweb.com.br/instagram/access-token/
	public $accessToken = "";
	public $idUser = "";

	public function fetch_data($url)
	{
    	$json_file = file_get_contents($url);
        return $json_file;
    }

    public function get_data_user($count = 10)
    {
    	$result = $this->fetch_data("https://api.instagram.com/v1/users/{$this->idUser}/media/recent/?access_token={$this->accessToken}&count={$count}");
        return $result = json_decode($result);
    }

    public function get_data_tag($tag = "lennon", $count = 20)
    {
    	$result = $this->fetch_data("https://api.instagram.com/v1/tags/{$tag}/media/recent?access_token={$this->accessToken}&count={$count}");
        return $result = json_decode($result);
    }
}

/* MANUAL

$this->load->library('instagram');

//GET TAG, MORE INFO- https://www.instagram.com/developer/endpoints/tags/
$instaTag = $this->instagram->get_data_tag('NAME TAG', count);
$dataTag = insta->data;
foreach($dataTag as $value)
{
    echo $value->images->low_resolution->url;
    echo $value>images->standard_resolution->url;
    echo $value->images->thumbnail->url;
}


//GET USER, MORE INFO - https://www.instagram.com/developer/endpoints/users/
$instaUser => $this->instagram->get_data_user(count),


*/