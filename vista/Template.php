<?php

class Template{

    public function render($contenido,$data=[]){
        include(DIR_VIEW ."template/header.php");
        include($contenido);
        include(DIR_VIEW ."template/footer.php");
    }
}