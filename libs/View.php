<?php

Class View{
    
    public function render($controller, $view, $estrict = false){
    	if($estrict == false){
    		$controller = get_class($controller);
    	}
        require ('./views/'.$controller.'/'.$view.'.php');
    }
}