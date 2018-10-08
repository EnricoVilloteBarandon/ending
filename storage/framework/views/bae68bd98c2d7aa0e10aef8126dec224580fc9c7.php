<p>Lorem ipsum dolor isit</p>
<?php
    if(Auth::check()){
        echo Auth::user()->firstname;
        echo " test";    
    }
?>