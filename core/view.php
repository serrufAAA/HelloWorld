<?php
class core_View
{
    function generate($contentView, $data = null)
    {
        if (is_array($data)) {
            extract($data);
        }
        include "Application/views/templateView.php";
    }
}