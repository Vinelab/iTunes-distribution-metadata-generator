<?php

use Illuminate\Support\Facades\Input;

class HomeController extends BaseController {

    private $root = '<root/>';

    protected $xml;

    public function __construct()
    {
        $this->xml = new SimpleXMLElement($this->root);
    }

	public function index()
	{
		return View::make('index');
	}

    public function submit()
    {
        $data = Input::get();
//        dd($data);
        // function call to convert array to xml
        $this->arrayToXml($data, $this->xml);

        $xml_string = $this->xml->asXML();

        return Response::make($xml_string, '200')
                    ->header('Content-Type', 'text/xml');
    }

    // function to convert array to xml
    function arrayToXml($array_data, &$xml_obj, $node = null)
    {
        foreach($array_data as $key => $value)
        {
            if(is_array($value))
            {
                $subnode = $xml_obj->addChild("$key");

                $this->arrayToXml($value, $subnode, $key);
            }
            else
            {
                if($node == 'genres')
                {
                    $xml_obj->addChild("genre")->addAttribute("code", "$value");

                }else{
                    $xml_obj->addChild("$key", "$value");
                }
            }
        }
    }

}
