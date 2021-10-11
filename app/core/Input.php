<?php 
class Input{
    public static function get($name){
        if (isset($_POST[$name])) {
            return htmlspecialchars($_POST[$name]);
        }else if(isset($_GET[$name])) {
            return htmlspecialchars($_GET[$name]);
        }
        // return false;
        header('Location:'.BASEURL.'auth/errorpage');
    }

}