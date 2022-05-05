<?php

// validate all the form fields
$errors=array();

if (isset($FORM['name']) and ! strlen($FORM['name']))
    { $errors[]='Please enter the First and Last Name'; }
    
if (isset($FORM['kerberos']) and ! strlen($FORM['kerberos']))
    { $errors[]='Please enter the Kerberos_ID'; }

if (isset($FORM['email']) and ! strlen($FORM['email']))
    { $errors[]='Please enter the Email Address'; }

if (! isset($FORM['art']) and ! isset($FORM['sci']) and ! isset($FORM['fir']))
    { $errors[]='Please select at least one Category for judging'; }


?>