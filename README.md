# Online Chatting System  <img src="https://img.shields.io/badge/project-completed-brightgreen"> 
<img src="https://img.shields.io/badge/php-v7.2.18-brightgreen"> <img src="https://img.shields.io/badge/MySQL-v5.7.26-brightgreen"> <img src="https://img.shields.io/badge/HTML-v5-brightgreen"> <img src="https://img.shields.io/badge/CSS-brightgreen"> <img src="https://img.shields.io/badge/Jquery-v1.12.4-brightgreen"> <img src="https://img.shields.io/badge/Wamp Server-brightgreen">

Duration
--------

6 month.

Technologies / Tools Used
-------------------------

PHP, MySQL, HTML, CSS, JavaScript, Notepad++, Apache.

Description
----------

   __i.__ We have built a user friendly interface of a web application. It consists of a user interface and schema regarding user information.

   __ii__ The functionality of the web application are a user can use the application by easy sign up and chat with the persons who are available in the interface .
    
Images
------

    Images of the projects are shown below    

> Image of index page

<img src="https://github.com/sneha2245/online-chatting-system/blob/main/images/ss/1.png" alt="index page" title="Index page" width="100%" height="100%"/>
 
> Image of login page

<img src="https://github.com/sneha2245/online-chatting-system/blob/main/images/ss/4.png" alt="login page" title="Login page" width="100%" height="100%"/>

> Image of forgot password page

<img src="https://github.com/sneha2245/online-chatting-system/blob/main/images/ss/3.png" alt="forgot password page" title="Forgot password page" width="100%" height="100%"/>

> Image of available users page

<img src="https://github.com/sneha2245/online-chatting-system/blob/main/images/ss/5.png" alt="available users page" title="Available users page" width="100%" height="100%"/>

> Image of chat page

<img src="https://github.com/sneha2245/online-chatting-system/blob/main/images/ss/6.png" alt="chat page" title="Chat page" width="100%" height="100%"/>

Code
----

__`1. HTML Code`__

> We get `senderId` and `reciverId` by using : 

```html
<input id="sender" value="<?php echo(isset($_SESSION["userId"]))?$_SESSION["userId"]:'';?>" type="hidden" name="sender"/>

<input id="receiver" value="<?php echo(isset($row["id"]))?$row["id"]:'';?>" type="hidden" name="receiver"/>
```
__`2. Java Script Code`__

> We send the chat of the user in `chatcontentprocess.php` by suing __`$.ajax`__ function :

```javascript
$("#send").on('click', function (e) {		
   $.ajax({
      method : 'POST',
      async : true,
      url: 'chatcontentprocess.php', 
      data: $('#frmData').serialize(),
      beforeSend : function(){
      $("#textarea").val("");
         ...
      }
   });
});
```

__`3. PHP Code`__

> We insert all the field of tabel by using __`insert`__ query :

```php
if($_POST["content"]==null){			
   return 0;				
}else{
   $text=$_POST["content"];
   $contentQuery="insert into `chat_content` (`senderId`,`receiverId`,`content`,`current_time`) values ('".$sen."','".$rev."','".$text."',CURRENT_TIMESTAMP)";
}
$conn = mysqli_connect($servername, $username, $password, $dbName, $port);
```

__`4. Detabase Schema`__

> __Users Table :__  Where we store the users information .

| id | uname | email | gender | phone | password |
|----|-------|-------|--------|-------|----------|
|1|example|`example@gmail.com`|m|77......89|subir|
|...|...|`...`|...|...|...|

> __Chat Content Table :__  Where we store the chat of the users .

| id | senderId | reciverId | content | current_time |
|----|----------|-----------|---------|--------------|
|1|2|3|hi|2020-06-21 19:13:06|
|...|...|...|...|...|

Features
--------

Searching a chat or users .

Team Members
------------

https://github.com/subirghosh77 , https://github.com/sneha2245/ 
