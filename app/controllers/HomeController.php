<?php

use Illuminate\Support\Facades\Input;

class HomeController extends BaseController {

    private $root = '<package/>';

    protected $xml;

    public function __construct()
    {
        $this->xml = new SimpleXMLElement($this->root);
        $this->xml->addAttribute("xmlns", "http://apple.com/itunes/importer");
        $this->xml->addAttribute("version", "music5.1");
    }

	public function index()
	{
		return View::make('landing');
	}

    public function select($type)
    {
        return View::make($type);
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

        // convert to string
        $xml_string = $this->xml->asXML();

        if(isset($data['album']['label_name']) and ! empty($data['album']['label_name']))
            $file_name = $data['album']['label_name'];
        else if(isset($data['tracks'][0]['label_name']) and ! empty($data['tracks'][0]['label_name']))
            $file_name = $data['tracks'][0]['label_name'];
        else
            $file_name = 'iTunes';

        // return download XML
        return Response::make($xml_string, '200')
                    ->header('Cache-Control', 'public')
                    ->header('Content-Description', 'File Transfer')
                    ->header('Content-Disposition', 'attachment; filename='.$file_name.'.xml')
                    ->header('Content-Transfer-Encoding', 'binary')
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
