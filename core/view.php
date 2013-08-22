<?php
class View
{
    function generate($contentView, $data = null)
    {
        /*if (is_array($date)) {
            extract($date);
        }*/
        include "application/views/templateView.php";
    }
}