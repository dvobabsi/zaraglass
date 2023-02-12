<?php
/* Осуществляем проверку вводимых данных и их защиту от враждебных 
скриптов */
$your_name = htmlspecialchars($_POST["your_name"]);
$email = htmlspecialchars($_POST["tel"]);
$tema = htmlspecialchars($_POST["address"]);
$message = htmlspecialchars($_POST["message"]);
/* Устанавливаем e-mail адресата */
$myemail = "info@zaragglass.es";
/* Проверяем заполнены ли обязательные поля ввода, используя check_input 
функцию */
$your_name = check_input($_POST["your_name"], "Escriba su nombre.!");
$email = check_input($_POST["tel"], "Escriba su número de Teléfono.!");
$tema = check_input($_POST["address"], "Escriba su dirección!");
$message = check_input($_POST["message"], "Usted olvido escribir un mensaje!");
/* Проверяем правильно ли записан e-mail */
/*if (!preg_match("/([\w\-]+\@[\w\-]+\.[\w\-]+)/", $email))
{
show_error("<br /> Е-mail адрес не существует");
}*/
/* Создаем новую переменную, присвоив ей значение */
$message_to_myemail = "Здравствуйте! 
Вашей контактной формой было отправлено сообщение! 
Имя отправителя: $your_name 
Номер телефона: $email 
Адрес: $tema
Текст сообщения: $message 
Конец";
/* Отправляем сообщение, используя mail() функцию */
$from  = "From: $yourname <$email> \r\n Reply-To: $email \r\n"; 
mail($myemail, $tema, $message_to_myemail, $from);
?>
<p>Su mensaje se envió correctamente!</p>
<p>A la <a href="index.html">página principal >>></a></p>
<?php
/* Если при заполнении формы были допущены ошибки сработает 
следующий код: */
function check_input($data, $problem = "")
{
$data = trim($data);
$data = stripslashes($data);
$data = htmlspecialchars($data);
if ($problem && strlen($data) == 0)
{
show_error($problem);
}
return $data;
}
function show_error($myError)
{
?>
<html>
<body>
<p>Error:</p>
<?php echo $myError; ?>
</body>
</html>
<?php
exit();
}
?>