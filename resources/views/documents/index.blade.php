<?php
echo '<ul>';
    foreach($documents as $doc){
        echo '<li> Title: '.$doc->title.' </li>';
    }
echo '</ul>';
?>