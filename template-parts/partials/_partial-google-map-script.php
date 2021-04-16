<?php
/*
 * Partial: Google Map Script
 */
if ( ! defined('ABSPATH')) :
    exit();
endif;
/**
 * Get Lat Lng
 */
$latlng = get_field( 'contacts-map', 'options' );
?>

<?php if( $latlng ) : ?>
    <script type="text/javascript">

        // Определяем переменную map
        var map;

        // Функция initMap которая отрисует карту на странице
        function initMap() {

            var container = document.getElementById('map-google');

            if(container) {
                map = new google.maps.Map(document.getElementById('map-google'), {
                    // При создании объекта карты необходимо указать его свойства
                    // center - определяем точку на которой карта будет центрироваться
                    center: {lat: <?= $latlng['lat'] ?>, lng: <?= $latlng['lng'] ?>},
                    // zoom - определяет масштаб. 0 - видно всю платнеу. 18 - видно дома и улицы города.
                    zoom: 16,
                    disableDefaultUI: true
                });
                // Создаем маркеров на карте
                var marker = new google.maps.Marker({

                    // Определяем позицию маркера 46.460123,30.5717039
                    position: {lat: <?= $latlng['lat'] ?>, lng: <?= $latlng['lng'] ?>},

                    // Указываем на какой карте он должен появится. (На странице ведь может быть больше одной карты)
                    map: map,

                    // Пишем название маркера - появится если навести на него курсор и немного подождать
                    title: '<?= $latlng["address"] ?>',

                    // Укажем свою иконку для маркера
                    //icon: '<?= get_template_directory_uri() ?>/assets/css/images/map-marker.svg'
                });
            }
        }
    </script>
<?php endif; ?>