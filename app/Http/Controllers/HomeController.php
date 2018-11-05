<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;
use PhpOffice\PhpSpreadsheet\IOFactory;

use Facebook\WebDriver\Remote\DesiredCapabilities;
use Facebook\WebDriver\Remote\RemoteWebDriver;
use Facebook\WebDriver\WebDriverBy;
use Facebook\WebDriver\WebDriverExpectedCondition as WDEC;

class HomeController extends Controller
{
    public function processaEndereco($CEP){
        $cepArr = str_split($CEP);
        if($cepArr[0]==6 && $cepArr[1]==7){
            return false;
        }
        set_time_limit(0);
        $capabilities = DesiredCapabilities::firefox();
        $host = 'http://localhost:4444/wd/hub';
        $web_driver = RemoteWebDriver::create($host, $capabilities, 120000);
        $web_driver->get("https://webvendas.gvt.com.br/siebelview/dealer/login.sv");
        
        $element1= $web_driver->findElement(WebDriverBy::cssSelector('input[name=login]'))->sendKeys('80066191');        
        $element2= $web_driver->findElement(WebDriverBy::cssSelector('input[name=senha]'));
        $web_driver->executeScript('arguments[0].setAttribute("value", "VIVO!6191")', [$element2]);
        $button_entrar = $web_driver->findElement(WebDriverBy::cssSelector('input[name=j_id194]'))->click();
        $link = $web_driver->findElement(WebDriverBy::id('formTemplate:coverageAddress'))->click();
        $cep = $web_driver->findElement(WebDriverBy::name('formTemplate:j_id28')); 
        $web_driver->executeScript('arguments[0].setAttribute("value", '.$CEP.')', [$cep]);
        $numero = $web_driver->findElement(WebDriverBy::name('formTemplate:unitNumber')); 
        $web_driver->executeScript('arguments[0].setAttribute("value", "1")', [$numero]);
        $estado = $web_driver->findElement(WebDriverBy::cssSelector('select[name="formTemplate:estadoEndereco"] option[value="PA"]'))->click();
        
        $web_driver->wait(10,1000)->until(
            WDEC::elementToBeClickable(WebDriverBy::cssSelector('select[name="formTemplate:cidadeEndereco"] option[value="BELEM"]'))
        );
        $cidade = $web_driver->findElement(WebDriverBy::cssSelector('select[name="formTemplate:cidadeEndereco"] option[value="BELEM"]'))->click();
//        if(!$cidade){
//            $web_driver->quit();
//            return false;
//        }
        
        $button_pesquisar = $web_driver->findElement(WebDriverBy::name('formTemplate:findAddressbtnPesquisar'))->click();
              
        
        $web_driver->wait(10,1000)->until(
            WDEC::elementToBeClickable(WebDriverBy::xpath("//div[contains(.,'VIVO2 /')]"))
        );
        
        
        
        $cobertura = $web_driver->findElements(WebDriverBy::xpath("//div[contains(.,'VIVO2 /')]"));
        
        if(count($cobertura) > 0){
            $return = false;
            //dd($coberturar);
            foreach ($cobertura as $cob) {
                if($cob->getText() == 'VIVO2 /'){
                    $web_driver->quit();
                    return true;  
                }                
            }  
            return $return;
        }else{
            $web_driver->quit();
            return false;
        }  
        
    }
    
    
    private function processaPlanilha(Array $array){
        foreach ($array as $key => $value) {
            $retorno = $this->processaEndereco($array[$key][6]);
            if($retorno){
                $array[$key][8] = 'SIM'; 
            }else{
                $array[$key][9] = 'NÃO'; 
                
            }
        }
        return $array;
    }

    public function xls(){
        $file = public_path(). '/exemplo.xlsx' ;
        $load = IOFactory::load($file);
        $loadArray = $load->getActiveSheet()->toArray();
        $reader = $loadArray[0];
        unset($loadArray[0]);
        dd($loadArray);
        $retornoArray = $this->processaPlanilha($loadArray);
        
        array_unshift($retornoArray, $reader);
        dd($retornoArray);
        $spreadsheet = new Spreadsheet();
        $sheet = $spreadsheet->getActiveSheet();
        $sheet->fromArray($load->getActiveSheet()->toArray(), NULL, 'A1');
        
        // redirect output to client browser
        header('Content-Type: application/vnd.ms-excel');
        header('Content-Disposition: attachment;filename="myfile.xlsx"');
        header('Cache-Control: max-age=0');

        $writer = new Xlsx($spreadsheet);
        $writer->save('php://output');
    }
    
    public function xlsx(){
        $file = public_path(). '/exemplo.xlsx' ;
        $load = IOFactory::load($file);
        $loadArray = $load->getActiveSheet()->toArray();
        $reader = $loadArray[0];
        unset($loadArray[0]);
        
        $retornoArray = $this->processaPlanilha($loadArray);      
        
        array_unshift($retornoArray, $reader);
        //dd($retornoArray);
        $spreadsheet = new Spreadsheet();
        $sheet = $spreadsheet->getActiveSheet();
        $sheet->fromArray($retornoArray, NULL, 'A1');
        
        // redirect output to client browser
        header('Content-Type: application/vnd.ms-excel');
        header('Content-Disposition: attachment;filename="myfile.xlsx"');
        header('Cache-Control: max-age=0');

        $writer = new Xlsx($spreadsheet);
        $writer->save('php://output');
    }
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('home');
    }
}
