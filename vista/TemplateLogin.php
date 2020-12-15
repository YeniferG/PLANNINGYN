<?php

class TemplateLogin {

    public function render($data = []){
        include(DIR_VIEW . "template_login/header.php");

        include(DIR_VIEW . "template_login/login.php");

        include(DIR_VIEW . "template_login/footer.php");
    }

}