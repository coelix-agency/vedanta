<?php
require_once __DIR__ . '/amocrm.phar';

try {
    // Создание клиента
    $amo = new \AmoCRM\Client('vedanta', 'dante.essence@gmail.com', 'ab9b832cf08c571dfdaa172150cf78eb33258df4');

    // SUBDOMAIN может принимать как часть перед .amocrm.ru,
    // так и домен целиком например test.amocrm.ru или test.amocrm.com

    // Получение экземпляра модели для работы с аккаунтом
    $account = $amo->account;
    // apiAddForms($forms = [])
    // Вывод информации об аккаунте
    // print_r($account->apiCurrent());

    // Получение экземпляра моделей для работы с контактами и сделками
    if ((isset($_POST['name'])&&$_POST['name']!="")&&
    (isset($_POST['phone'])&&$_POST['phone']!="")&&
    (isset($_POST['price'])&&$_POST['price']!="")&&
    (isset($_POST['car_type'])&&$_POST['car_type']!="")&&
    (isset($_POST['year'])&&$_POST['year']!="")&&
    (isset($_POST['fuel_type'])&&$_POST['fuel_type']!="")&&
    (isset($_POST['comment'])&&$_POST['comment']!="") ) {
        
        // Создание сделки
            $lead = $amo->lead;
            $lead['name'] = $_POST['name'];
            $lead['tags'] = 'Заявка на авто с vedanta-auto';
            // $lead['responsible_user_id'] = '3706747';
            // $lead['pipeline_id'] = '0';
            $lead->addCustomField(358469, $_POST['price']);
            $lead->addCustomField(358471, $_POST['car_type']);
            $lead->addCustomField(358473, $_POST['year']);
            $lead->addCustomField(358475, $_POST['fuel_type']);
            $lead->addCustomField(358477, $_POST['comment']);
            $id = $lead->apiAdd();

            // Создание контакта
            $contact = $amo->contact;
            $contact['name'] = $_POST['name'];
            $contact['tags'] = 'Заявка на авто с vedanta-auto';
            $contact['linked_leads_id'] = [(int)$id];
            $contact->addCustomField(64235, $_POST['phone'], 'WORK');
            $id = $contact->apiAdd();

        }
        
} catch (\AmoCRM\Exception $e) {
    printf('Error (%d): %s' . PHP_EOL, $e->getCode(), $e->getMessage());
}