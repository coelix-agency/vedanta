<?php
require_once __DIR__ . '/amocrm.phar';
include_once __DIR__ . '/unsorted/form_to_lead.php';

try {
    // Создание клиента
    $amo = new \AmoCRM\Client('vedanta', 'dante.essence@gmail.com', 'ab9b832cf08c571dfdaa172150cf78eb33258df4');

    // SUBDOMAIN может принимать как часть перед .amocrm.ru,
    // так и домен целиком например test.amocrm.ru или test.amocrm.com

    // Получение экземпляра модели для работы с аккаунтом
    $account = $amo->account;

    // Вывод информации об аккаунте
    // print_r($account->apiCurrent());
    // echo '<pre>';
    // echo time();
    // echo '</pre>';
    // Получение экземпляра моделей для работы с контактами и сделками
    if ((isset($_POST['name'])&&$_POST['name']!="")&&
    (isset($_POST['phone'])&&$_POST['phone']!="")&&
    (isset($_POST['link'])&&$_POST['link']!="") ) {






            // Добавление заявки из веб-формы (form):
            $unsorted = $amo->unsorted;
            $unsorted['created_at'] = time();
            $unsorted.apiAdd();
            // Создание сделки
            // $lead = $amo->lead;
            // $lead['name'] = $_POST['name'];
            // $lead['tags'] = 'Заявка на авто с vedanta-auto';
            // $lead->addCustomField(357799, $_POST['link']);
            // $id = $lead->apiAdd();

            // Создание контакта
            $contact = $amo->contact;
            $contact['name'] = $_POST['name'];
            $contact['tags'] = 'Заявка на авто с vedanta-auto';
            $contact['linked_leads_id'] = [(int)$id];
            $contact->addCustomField(64235, $_POST['phone'], 'WORK');
            $contact->addCustomField(357797, $_POST['link']);
            $id = $contact->apiAdd();

        }

} catch (\AmoCRM\Exception $e) {
    printf('Error (%d): %s' . PHP_EOL, $e->getCode(), $e->getMessage());
}
