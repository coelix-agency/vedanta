<?php
if ((isset($_POST['name'])&&$_POST['name']!="")&&
    (isset($_POST['phone'])&&$_POST['phone']!="")&&
    (isset($_POST['link'])&&$_POST['link']!="") ) {
        
    $myTime = time();
    $data = array(
        'add' => array(
            0 => array(
                'source_name' => $_POST['name'],
                'source_uid' => $myTime,
                'created_at' => $myTime,
                'incoming_entities' => array(
                    'leads' => array(
                        0 => array(
                            // 'name' => $_POST['name'],
                            'name' => 'test',
                            'tags' => 'Заявка с сайта',
                            // 'custom_fields' => array(
                            //     0 => array(
                            //         'id' => '357799',
                            //         'values' => array(
                            //             0 => $_POST['link'],
                            //         ),
                            //     ),
                            // ),
                        ),
                    ),
                    'contacts' => array(
                        0 => array(
                            // 'name' => $_POST['name'],
                            'name' => 'test',
                            'custom_fields' => array(
                                0 => array(
                                    'id' => '64235',
                                    'values' => array(
                                        0 => array(
                                            // 'value' => $_POST['phone'],
                                            'value' => '879646549865',
                                            'enum' => 'WORK',
                                        ),
                                    ),
                                ),
                            ),
                        ),
                    ),
                ),
                'incoming_lead_info' => array(
                    'form_id' => 'form_leave_request',
                    'form_page' => 'https://www.vedanta-auto.com.ua',
                    'service_code' => '0',
                ),
            ),
        ),
    );
    $subdomain = 'vedanta'; #Наш аккаунт - поддомен
    $api_key = 'ab9b832cf08c571dfdaa172150cf78eb33258df4';
    $login = 'dante.essence@gmail.com';

    $link = 'https://' . $subdomain . '.amocrm.ru/api/v2/incoming_leads/form?api_key=' . $api_key . '&login=' . $login;

    $curl = curl_init(); #Сохраняем дескриптор сеанса cURL

    #Устанавливаем необходимые опции для сеанса cURL
    curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($curl, CURLOPT_USERAGENT, 'amoCRM-API-client/1.0');
    curl_setopt($curl, CURLOPT_HTTPHEADER, ['Accept: application/json']);
    curl_setopt($curl, CURLOPT_URL, $link);
    curl_setopt($curl, CURLOPT_HEADER, false);
    curl_setopt($curl, CURLOPT_POSTFIELDS, http_build_query($data));
    curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, 0);
    curl_setopt($curl, CURLOPT_SSL_VERIFYHOST, 0);
    $out = curl_exec($curl); #Инициируем запрос к API и сохраняем ответ в переменную
    $code = curl_getinfo($curl, CURLINFO_HTTP_CODE);
    curl_close($curl);

    $code = (int) $code;
    $errors = array(
        301 => 'Moved permanently',
        400 => 'Bad request',
        401 => 'Unauthorized',
        403 => 'Forbidden',
        404 => 'Not found',
        500 => 'Internal server error',
        502 => 'Bad gateway',
        503 => 'Service unavailable',
    );
    try
    {
        #Если код ответа не равен 200, 201 или 204 - возвращаем сообщение об ошибке
        if (!in_array($code, [200, 201, 204])) {
            throw new Exception(isset($errors[$code]) ? $errors[$code] : 'Undescribed error', $code);
        }

    } catch (Exception $E) {
        die('Ошибка: ' . $E->getMessage() . PHP_EOL . 'Код ошибки: ' . $E->getCode());
    }
    /*
    Данные получаем в формате JSON, поэтому, для получения читаемых данных,
    нам придётся перевести ответ в формат, понятный PHP
    */
    $Response = json_decode($out, true);
    $Response = $Response['data'];

} //endif