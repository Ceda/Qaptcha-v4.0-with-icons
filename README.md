QapTcha description
=============

QapTcha is a draggable jQuery captcha system with jQuery UI !

QapTcha is an easy-to-use, simple and intuitive captcha system.
It needs human action instead of to read a hard text and it is a very lightweight jQuery plugin.

In order to work with iPhone and iPad, a file jquery.ui.touch.js has been added in v2.5 !

QapTcha works with PHP5.2 or more cause to the function json_encode() !

###How does it work ?

During the DOM building, QapTcha create a hidden input with a random 'name' attribut filled with a random password.
Usually, a bot filled all the input into a form before sending the form.

The purpose of the drop is to empty this random input and set a $_SESSION['qaptcha_key'] variable with this random value in Ajax.

With PHP, just check if the random input exists and is empty and if the $_SESSION['qaptcha_key'] is filled with this random value.
In the PHP file, you just have to do something like :
if(isset($_SESSION['qaptcha_key']) && !empty($_SESSION['qaptcha_key'])) { $myVar = $_SESSION['qaptcha_key']; if(isset($_POST[''.$myVar.'']) && empty($_POST[''.$myVar.''])) //mail can be sent else //mail can not be sent } unset($_SESSION['qaptcha_key']);

Even if javascript is disabled, the iQaptcha input will not be create and the PHP control always returns false : (isset($_POST[''.$myVar.'']).
Moreover, the SESSION will not be create and PHP will always returns false : (isset($_SESSION['qaptcha_key']) && $_SESSION['qaptcha_key']).
QapTcha download package

    QapTcha v4.0
        jquery
            jquery.js
            jquery-ui.js
            QapTcha.jquery.css
            jquery.ui.touch.js
            QapTcha.jquery.js
        images
            bg_draggable_qaptcha.jpg
        php
            QapTcha.jquery.php
        index.php

QapTcha implementation
-------
* 1. First, include the CSS & jQuery files
<!-- include CSS & JS files --> <!-- CSS file --> <link rel="stylesheet" type="text/css" href="QapTcha.jquery.css" media="screen" /> <!-- jQuery files --> <script type="text/javascript" src="jquery.js"></script> <script type="text/javascript" src="jquery-ui.js"></script> <script type="text/javascript" src="jquery.ui.touch.js"></script> <script type="text/javascript" src="QapTcha.jquery.js"></script>
* 2. Add a <div class="QapTcha"></div> into your form
<form method="post" action=""> <fieldset> <label>First Name</label> <input type="text" name="firstname" /> <label>Last Name</label> <input type="text" name="lastname" /> <div class="clr"></div> <!-- Add this line in your form --> <div class="QapTcha"></div> <input type="submit" name="submit" value="Submit form" /> </fieldset> </form>
* 3. PHP control before sending the form
if(isset($_POST['iQapTcha']) && empty($_POST['iQapTcha']) && isset($_SESSION['iQaptcha']) && $_SESSION['iQaptcha']) { // mail can be sent } else { // mail can not be sent }
* 4. Now, call QapTcha plugin
<script type="text/javascript"> $(document).ready(function(){ // Simple call $('.QapTcha').QapTcha(); }); </script>

### QapTcha options

PHPfile
-------
    String
    Default : 'php/Qaptcha.jquery.php' - PHP file path

autoRevert
-------
    Boolean
    Default : true - Slider returns to the init-position, when the user hasn't dragged it to end

disabledSubmit
-------
    Boolean
    Default : true - Add the "disabled" attribut to the submit button : true or false

txtLock
-------
    String
    Default : 'Locked : form can't be submited' - Text to display when form is locked

txtUnlock
-------
    String
    Default : 'Unlocked : form can be submited' - Text to display when form is unlocked

### Who use QapTcha on the web ?

If you use QapTcha Plugin into your website and you want to be added here, please contact us !
We will add you with pleasure :)

    http://www.myjqueryplugins.com
    http://www.pacitel.fr
    http://www.travelinsuranceservices.com.au
    http://dis-slovarcek.ijs.si

How can you help us ?

If you love our work, you can show us your admiration by having a look on the ads, free for you, good for us =).THANKS ! 