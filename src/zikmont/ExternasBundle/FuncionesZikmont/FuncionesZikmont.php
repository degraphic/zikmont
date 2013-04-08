<?php

namespace zikmont\ExternasBundle\FuncionesZikmont;

class FuncionesZikmont
{
    
    public function sumarNumeros()
    {        
        $n1 = 1;
        $n2 = 2;
        return $n1+$n2;
    }
    
    function createExcel($filename, $arrydata) {                        
            $excelfile = __DIR__.'/../../../../web/docs/' . $filename;  
            $fp = fopen($excelfile, "wb");  
            if (!is_resource($fp)) 
                die("Error al crear $excelfile");  
            fwrite($fp, serialize($arrydata));  
            fclose($fp);
            header ("Expires: 0");        
            header ("Last-Modified: " . gmdate("D,d M YH:i:s") . " GMT");  
            header ("Cache-Control: no-cache, must-revalidate");  
            header ("Pragma: no-cache");  
            //header ("Content-type: application/x-msexcel");  
            header('Content-type: application/vnd.ms-excel');
            header ("Content-Disposition: attachment; filename=\"" . $filename . "\"" );
            readfile($excelfile);              
    }   
    
    public static function object2array($valor) {
        $objFunciones = new \zikmont\ExternasBundle\FuncionesZikmont\FuncionesZikmont();
        $dato = NULL;
        if (!(is_array($valor) || is_object($valor))) { //si no es un objeto ni un array
            $dato = $valor; //lo deja
        } else { //si es un objeto
            foreach ($valor as $key => $valor1) { //lo conteo
                $dato[$key] = $objFunciones->object2array($valor1); //
            }
        }
        return $dato;
    }    
    
}
