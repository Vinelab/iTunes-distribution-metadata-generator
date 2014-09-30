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

    /**
     * on form submit
     *
     * @return mixed
     */
    public function submit()
    {
        $data = Input::get();

        // function call to convert array to xml
        $this->arrayToXml($data, $this->xml);

        $xml_string = $this->xml->asXML();

        // return XML
        return Response::make($xml_string, '200')
                    ->header('Content-Type', 'text/xml');
    }

    /**
     * function to convert array to xml
     *
     * @param $array_data
     * @param $xml_obj
     * @param null $node
     */
    function arrayToXml($array_data, &$xml_obj, $node = null)
    {

        foreach($array_data as $key => $value)
        {

            if(is_array($value) and ! is_numeric($key))
            {
                $subnode = $xml_obj->addChild("$key");
                $this->arrayToXml($value, $subnode, $key);
            }
            else
            {
                switch ($node)
                {
                    case 'products':
                        $subnode = $xml_obj->addChild("product");
                        $this->arrayToXml($value, $subnode, null);
                        break;
                    
                    case 'artists':
                        $subnode = $xml_obj->addChild("artist");
                        $this->arrayToXml($value, $subnode, null);
                        break;

                    case 'tracks':
                        $subnode = $xml_obj->addChild("track");
                        $this->arrayToXml($value, $subnode, null);
                        break;

                    case 'genres':
                        $xml_obj->addChild("genre")->addAttribute("code", "$value");
                        break;

                    default:
                        if ($key == 'lyrics')
                            $xml_obj->addChild("$key", "$value")->addAttribute("format", "html");
                        else if ($key == 'checksum')
                            $xml_obj->addChild("$key", "$value")->addAttribute("type", "md5");
                        else
                            $xml_obj->addChild("$key", "$value");
                        break;
                }
            }
        }


    }

}
