<?php
/* @var $this \C\View\ConcreteContext */
/* @var $isUserLogged bool */
/* @var $sessionContent string */
?>

<!-- content -->

Hello the world from magento <!-- ... I m so happy to load in magento backend system....-->
<br/>

Magento says that you are <b><?php echo $isUserLogged?" logged":" not logged "; ?></b> to a customer account.

<h1>Let s register</h1>
<form method="POST" action="/register">
    Login : <input input type=text name="username" />
    <br>
    Password:<input input type=text name="password" />
    <br>
    <input type="submit"/>
</form>

<h1>Let s login</h1>
<form method="POST" action="/login">
    Login : <input input type=text name="username" />
    <br>
    Password:<input input type=text name="password" />
    <br>
    <input type="submit"/>
</form>

<h1>Your sesion content</h1>
<pre><?php print_r($sessionContent); ?></pre>
