<?php
class ExceptionProxy extends Exception{}


function transformException($functions){
    $ExceptionProxys=[];
    foreach($functions as $function){
        
    try{
        
        call_user_func($function);
        throw new ExceptionProxy("message ok");
            
    }catch(Exception $e){
        $ExceptionProxy = new ExceptionProxy($e->getMessage());
        $ExceptionProxy->function = $function;
        $ExceptionProxys[] = $ExceptionProxy;
    }
 
}
return $ExceptionProxys;
} 


function t(){
    throw new exception('chhhhhhhhhhhhhhhhhhhhh');
}

function h(){

    return true;
}

$transformException = transformException(['t','h']);

foreach ($transformException as $exp){
    echo "function:".$exp->function."<br>";
    echo "message:".$exp->getMessage()."<br>";

}