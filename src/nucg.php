<?php
namespace fge\nucg\src;
use fge\token\src\token as token;
class nucg extends token{
    protected $prefix="";
    protected $year="";
    public $nuc='';
    public $cvv='';
    function __construct(){
        $this->l=6;
    }
    public function nnuc($prefix,$year){
        $this->prefix=$prefix;
        $this->year=$year;
        $this->l=6;
    }
    public function nuccvv($nuc,$cvv){
        $token=explode('-',$nuc);
        $this->nuc=$token[1];
        $this->t=$token[1];
        $this->prefix=$token[0];
        $this->year=$token[2];
        $this->cvv=$cvv;
        $this->c=$this->cvv;
        $this->l=6;
    }
    public function IsValid(&$error){                
        return $this->valited($error);
    }
    private function CalcCVV(&$error)
    {
        return $this->CreateCVV($error);
    }
    private function CalcNUC(){
        $this->CreateTOKEN();
    }
    public function fullnuc(&$error)
    {
        if($this->create($error)){
            $this->nuc=$this->prefix.'-'.$this->t.'-'.$this->year;  
            $this->cvv=$this->c;
            return true;
        }
        return false;
    }
    public function same($clave){
        return $this->prefix==$clave;
    }
    public static function getclave($number){
        return base_convert($number,10,36); 
    }
}