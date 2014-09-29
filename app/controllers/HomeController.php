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

        // function call to convert array to xml
        $this->arrayToXml($data, $this->xml);

        $xml_string = $this->xml->asXML();

        return Response::make($xml_string, '200')
                    ->header('Content-Type', 'text/xml');
    }

    // function to convert array to xml
    function arrayToXml($array_data, &$xml_obj, $node = null)
    {
//        var_dump($array_data);
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
                    case 'genres':
                        $xml_obj->addChild("genre")->addAttribute("code", "$value");
                        // convert to array then iterate to add attributes
                        break;

                    case 'file':
                        if ($key == 'checksum')
                            $xml_obj->addChild("$key", "$value")->addAttribute("type", "md5");
                        else
                            $xml_obj->addChild("$key", "$value");
                        break;
                    
                    case 'products':
                        $subnode = $xml_obj->addChild("product");
                        foreach($value as $sub_key => $sub_value)
                            $subnode->addChild("$sub_key", "$sub_value");
                        break;
                    
                    case 'artists':
                        $subnode = $xml_obj->addChild("artist");
                        foreach($value as $sub_key => $sub_value)
                        {
                            if( $sub_key == "roles" )
                                $subnode->addChild($sub_key)->addChild("role", $sub_value['role']);
                            else
                                $subnode->addChild("$sub_key", "$sub_value");
                        }
                        break;

                    default:

                        $xml_obj->addChild("$key", "$value");
                        break;
                }
            }
        }

        return $xml_obj;
    }

}
