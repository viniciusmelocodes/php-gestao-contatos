<?php

function temPost()
{
    return count($_POST) > 0 ? true : false;
}
