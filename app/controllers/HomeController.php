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
//var_dump($key);

                $subnode = $xml_obj->addChild("$key");

                $this->arrayToXml($value, $subnode, $key);
            }
            else
            {
                switch ($node)
                {
                    case 'genres':
                        $xml_obj->addChild("genre")->addAttribute("code", "$value");
                        break;

                    case 'file':
                        if ($key == 'checksum')
                            $xml_obj->addChild("$key", "$value")->addAttribute("type", "md5");
                        else
                            $xml_obj->addChild("$key", "$value");
                        break;

                    default:
                        $xml_obj->addChild("$key", "$value");
                        break;
                }
            }
        }
//        dd();
    }

}
