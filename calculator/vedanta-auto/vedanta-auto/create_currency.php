<?

$link = file_get_contents("https://bank.gov.ua/NBUStatService/v1/statdirectory/exchange?json");
$data = json_decode($link,true);
if ($data) {
    file_put_contents('js/my.json', json_encode($data));
    $to = 'solo.vedanta@gmail.com '; 
    $subject = 'Парс валют vedanta-auto удался'; 
    $message = '
            <html>
                <head>
                    <title>'.$subject.'</title>
                </head>
                <body>
                    <p>Парс валют удался</p>
                </body>
            </html>'; 
    $headers  = "Content-type: text/html; charset=utf-8 \r\n"; 
    $headers .= "From: info@vedanta.com.ua\r\n"; 
    mail($to, $subject, $message, $headers); 
} else {
    $to = 'solo.vedanta@gmail.com '; 
    $subject = 'Парс валют vedanta-auto'; 
    $message = '
            <html>
                <head>
                    <title>'.$subject.'</title>
                </head>
                <body>
                    <p>Парс валют не удался, проверить страницу Калькулятор на наличие ошибок</p>
                    <p><a href="https://www.vedanta-auto.com.ua/wp-content/themes/vedanta-auto/create_currency.php">Нажми сюда чтоб сгенерировать в ручную</a></p>
                </body>
            </html>'; 
    $headers  = "Content-type: text/html; charset=utf-8 \r\n"; 
    $headers .= "From: info@vedanta.com.ua\r\n"; 
    mail($to, $subject, $message, $headers); 
}

?>