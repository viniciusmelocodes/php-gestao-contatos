<?php

function temPost()
{
    if (count($_POST) > 0) {
        return true;
    }
    return false;
}
