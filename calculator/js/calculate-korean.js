/**
 * Loader
 * @type {{css: {border: string, cursor: string, padding: number, margin: number, backgroundColor: string, top: string, color: string, left: string, textAlign: string, width: string}, overlayCSS: {background: string, opacity: number}, message: string}}
 */
var loader_default = {
    message         :   '',
    overlayCSS      :   {
        background  :   '#fff',
        opacity     :   0.6
    },
    css: {
        padding     :   0,
        margin      :   0,
        width       :   '100%',
        top         :   '0%',
        left        :   '0%',
        textAlign   :   'center',
        color       :   '#000',
        border      :   'none',
        backgroundColor:'transparent',
        cursor      :   'wait'
    }
};
// *********************
// initial data
// *********************

var UA = navigator.userAgent,
    iOS = !!(UA.match(/iPad|iPhone/i));

var calculationsData = {};

// *********************
// add event listener
// *********************

document.querySelector('#calculator').addEventListener('submit', calculateResults);
document.addEventListener("DOMContentLoaded", onLoad);
document.querySelector('#result_button').addEventListener('click', savePDF);
var $mark = document.getElementById('mark');
$mark.addEventListener('change', loadCurrentModels);


if (iOS) {
    document.querySelector('#result_button').addEventListener('touchstart', savePDF)
}


// *********************
// fetch currencies from file
// *********************
var usd = 24.17;
var euro = 26.75;
var von = .021;
var uah = 1;

// *********************
// create XMLHttpRequest for currencies USD and EURO
// *********************

function loadCurrency() {
    var date = new Date();
    var current_hour = date.getHours();

    if (current_hour < 15 || current_hour > 18) {
        var xhr = (window.XMLHttpRequest) ? new XMLHttpRequest() : new activeXObject("Microsoft.XMLHTTP");
        xhr.open( "POST", '/wp-content/themes/vedanta/calculator/create_currency.php', true );
        xhr.send(null);
    }

    // var url = 'https://bank.gov.ua/NBUStatService/v1/statdirectory/exchange?json';
    var url = '/wp-content/themes/vedanta/calculator/json/my.json';
    var req = new XMLHttpRequest();
    req.responseType = 'json';
    req.open('GET', url, true);
    req.onload  = function() {
        var jsonResponse = req.response;
        for (var i=0; i<jsonResponse.length; i++) {
            if (jsonResponse[i].cc == 'USD') {
                usd = jsonResponse[i].rate
            }
            if (jsonResponse[i].cc == 'EUR') {
                euro = jsonResponse[i].rate
            }
            if (jsonResponse[i].cc == 'KRW') {
                von = jsonResponse[i].rate
            }
        }

    };
    req.send(null);

}

// *********************
// loadCars
// *********************
var jsonResponse = [];
function loadCars() {
    var url = '/wp-content/themes/vedanta/calculator/json/cars.json';
    var req = new XMLHttpRequest();
    req.responseType = 'json';
    req.open('GET', url, true);
    req.onload  = function() {
        jsonResponse = req.response;
        var select = document.getElementById('mark');
        select.innerHTML = '';
        var opt = document.createElement('option');
        opt.value = 0;
        opt.innerHTML = 'Марка авто';
        select.appendChild(opt);

        jsonResponse.forEach(function(item, i){
            opt = document.createElement('option');
            opt.value = item.mark;
            opt.innerHTML = item.mark;
            select.appendChild(opt);
        })
    };
    req.send(null);
}

function loadCurrentModels(e) {

    var value = e.target.value;
    var select = document.getElementById('model');

    select.innerHTML = '';
    var opt = document.createElement('option');
    opt.value = 0;
    opt.innerHTML = 'Выбрать модель';
    select.appendChild(opt);

    jsonResponse.forEach(function(item) {
        if (item.mark === value) {
            item.models.forEach( function(model, i) {
                opt = document.createElement('option');
                opt.value = model;
                opt.innerHTML = model;
                select.appendChild(opt);
            });
        }
    })
}





// *********************
// call functions when page is loaded
// *********************
function onLoad() {
    loadCars();
    loadCurrency();
}






// *********************
// calculation
// *********************

function calculateResults(e) {
    // UI elements
    var UImark = document.querySelector('#mark'),
        UImodel = document.querySelector('#model'),
        UIbodyType = document.querySelector('#body_type'),
        UIprice = document.querySelector('#price'),
        UIcurrency = document.querySelector('#currency'),
        UIvolume = document.querySelector('#volume'),
        UIengine = document.querySelector('#engine'),
        UIyear = document.querySelector('#year'),
        UIloading = document.querySelector('#loading'),
        UIoutput = document.querySelector('#output'),
        UIsaveResult = document.querySelector('#result_button'),
        currentYear = new Date().getFullYear(),
        coefficient = 1;

    // hide our UI/UX elements
    UIloading.style.display = 'none';
    UIoutput.style.display = 'none';
    UIsaveResult.style.display = 'none';
    // if we haven't some data (проверяем введены ли у все данные)
    if (UImark.value === "0" || UImodel.value === "0" || UIbodyType.value === "0" || !UIprice.value || !UIcurrency.value || !UIvolume.value || !UIyear.value) {
        // create alert with error (создаём алёрт с ошибкой)
        var p = document.createElement("p");
        p.classList = 'alert';
        p.appendChild(document.createTextNode('Не все данные введены'));
        this.appendChild(p);

        // remove alert from UI (удаляем алёрт из интерфейса)
        setTimeout(function() {
            document.querySelector('p.alert').remove();
        }, 2000);
    } else {
        // if everything OK (Когда всё хорошо)

        if (UIengine && UIengine.value !== 'electro') {
            // calculation for usual cars (рассчёт для всех обычных автомобилей)

            // Вычисляем коэффициент
            coefficient = 1;
            var year = Number(UIyear.value);
            if (year >= (currentYear - 2) && year <= currentYear) {
                coefficient = 1;
            } else if (year <= (currentYear - 3) && year >= (currentYear - 16)) {
                coefficient = currentYear - 1 - +year;
            } else if ( year < (currentYear - 16)) {
                coefficient = 15;
            }

            // Ввозная (импортная) пошлина 10%
            var price = Number(UIprice.value),
                currency = UIcurrency.value;
            if (currency == 'von') {
                price = price * von / usd;
                currency = 'usd';
            }
            var importDuty = price * 0.1;

            // Акцизный сбор
            var exciseTax,
                euroEqv,
                volume = Number(UIvolume.value),
                engine = UIengine.value;



            if ( engine === 'petrol') {
                if ( +volume <= 3000) {
                    // 0.05 euro
                    euroEqv = 0.05 * euro / usd;
                    exciseTax = +volume * euroEqv * coefficient;
                } else {
                    euroEqv = 0.1 * euro / usd;
                    exciseTax = +volume * euroEqv * coefficient;
                }
            } else {
                if ( +volume <= 3500) {
                    euroEqv = 0.075 * euro / usd;
                    exciseTax = +volume * euroEqv* coefficient;
                } else {
                    euroEqv = 0.15 * euro / usd;
                    exciseTax = +volume * euroEqv * coefficient;
                }
            }


            // VAT НДС 20%
            var vat = (importDuty + exciseTax + +price) * 0.2;

            // Пенсионный фонд
            var priceUAH,
                pensionFund,
                currentCurrensy;

            priceUAH = price*usd;
            currentCurrensy = 'USD';

            // меньше 305 745 гривен - 3%
            // от 305 745 до 537 370 - 4%
            // 537 370 и выше - 5%
            var percent;
            if (priceUAH < 305745) {
                percent = 3;
                pensionFund = +price*0.03;
            } else if (priceUAH >= 305745 && priceUAH < 537370) {
                pensionFund = +price*0.04;
                percent = 4;
            } else {
                pensionFund = +price*0.05;
                percent = 5;
            }

            // value in UAH
            var importDutyUAH,
                exciseTaxUAH,
                vatUAH,
                pensionFundUAH,
                allCalc = importDuty + exciseTax + vat,
                allCalcUAH;

            importDutyUAH = importDuty * usd;
            exciseTaxUAH = exciseTax * usd;
            vatUAH = vat * usd;
            pensionFundUAH = pensionFund * usd;
            allCalcUAH = allCalc * usd;

            // output
            outputAjax(percent,
                importDuty,
                importDutyUAH,
                exciseTax,
                exciseTaxUAH,
                vat,
                vatUAH,
                allCalc,
                allCalcUAH,
                pensionFund,
                pensionFundUAH,
                price,
                'not-electric',
                UIbodyType.value);

            /*outputHandler(percent,
                importDuty,
                importDutyUAH,
                exciseTax,
                exciseTaxUAH,
                vat,
                vatUAH,
                allCalc,
                allCalcUAH,
                pensionFund,
                pensionFundUAH,
                price,
                'not-electric',
                UIbodyType.value);*/

        } else {

            // calculation for electro cars

            // ...Ввозная (импортная ) пошлина =  0%
            var importDuty = 0;
            // ...Акцизный сбор = Мощность аккумулятора * (1 евро)
            var exciseTax,
                price = Number(UIprice.value),
                currency = UIcurrency.value,
                volume = Number(UIvolume.value);
            if (currency == 'von') {
                price = price * von / usd;
                currency = 'usd';
            }

            exciseTax = volume * (1 * euro / usd);

            // ...Пенсионный фонд: при цене машины меньше 305 745 гривен - 3% ; от 305 745 до 537 370  4% ; 537 370 и выше - 5%
            var priceUAH,
                pensionFund,
                priceUAH = price * usd,
                percent;

            if (priceUAH < 305745) {
                percent = 3;
                pensionFund = +price*0.03;
            } else if (priceUAH >= 305745 && priceUAH < 537370) {
                pensionFund = +price*0.04;
                percent = 4;
            } else {
                pensionFund = +price*0.05;
                percent = 5;
            }

            // НДС
            var vat = 0;

            // allCalc
            var allCalc = importDuty + exciseTax + vat;

            // UAH val
            var importDutyUAH = importDuty * usd,
                exciseTaxUAH = exciseTax * usd,
                vatUAH = vat * usd,
                pensionFundUAH = pensionFund * usd,
                allCalcUAH = allCalc * usd;

            // output
            outputAjax(percent,
                importDuty,
                importDutyUAH,
                exciseTax,
                exciseTaxUAH,
                vat,
                vatUAH,
                allCalc,
                allCalcUAH,
                pensionFund,
                pensionFundUAH,
                price,
                'electric',
                UIbodyType.value);
            /*outputHandler(percent,
                importDuty,
                importDutyUAH,
                exciseTax,
                exciseTaxUAH,
                vat,
                vatUAH,
                allCalc,
                allCalcUAH,
                pensionFund,
                pensionFundUAH,
                price,
                'electric',
                UIbodyType.value);*/

        }
    }


    e.preventDefault();
}


// *********************
// output our calculations and data
// *********************

function outputHandler(percent, importDuty, importDutyUAH, exciseTax, exciseTaxUAH, vat, vatUAH, allCalc, allCalcUAH, pensionFund, pensionFundUAH, price, status, bodyType) {
    var UIoutput = document.querySelector('#output'),
        UImark = document.querySelector('#mark'),
        UImodel = document.querySelector('#model'),
        UIloading = document.querySelector('#loading'),
        UIsaveResult = document.querySelector('#result_button');

    // our const in $ Витя
    var traderService = 300, // Услуги трейдера
        seaDelivery = +bodyType, // Доставка Морем 1500 $ (седан) , 1750 $ (кроссовер), 2000 $ (минивэн) из вёрстки (значение селекта)
        serviceCost = 1000, // Стоимость услуг
        portForwarding = 400, // Экспедирование в порту "Одесса"
        brokerageServices = 400, //Брокерские услуги
        sertivicate = 250, // Сертификация
        koreanAuctionTax = price / 100 * 2.2, // 2.2% Комиссия аукциона
        prepareDocuments = 100, // Подготовка и оформление экспортных документов
        toKoreanPort = 150; // Доставка в порт по территории Кореи

    koreanAuctionTax = koreanAuctionTax < 280 ? 280 : koreanAuctionTax;

    UIloading.style.display = 'block';

    var html = `
        <h2 class="name">${UImark.value} ${UImodel.value}</h2>

        <div>Ввозная (импортная) пошлина ${status == 'electric'? '': '10%'}<span>${importDuty.toFixed(2)} USD / (${importDutyUAH.toFixed(2)} грн.)</span></div>
        <div>Акцизный сбор <span>${exciseTax.toFixed(2)} USD / (${exciseTaxUAH.toFixed(2)} грн.)</span></div>
        <div>Налог на добавленную стоимость (НДС) ${status == 'electric'? '': '20%'}<span>${vat.toFixed(2)} USD / (${vatUAH.toFixed(2)} грн.)</span></div>
        <div>Всего таможенных платежей<span>${allCalc.toFixed(2)} USD / (${allCalcUAH.toFixed(2)} грн.)</span></div>
        <div>Дополнительные расходы</div>
        <div>Пенсионный фонд ${percent}% <span>${pensionFund.toFixed(2)} USD / (${pensionFundUAH.toFixed(2)} грн.)</span></div>

        <h2>Расходы в Корее</h2>

        <div>Цена авто <span>${price.toFixed(2)} USD</span></div>
        <div>Комиссия аукциона <span>${koreanAuctionTax.toFixed(2)} USD</span></div>
        <div>Доставка в порт по территории Кореи <span>${toKoreanPort.toFixed(2)} USD</span></div>
        <div>Подготовка и оформление экспортных документов <span>${prepareDocuments.toFixed(2)} USD</span></div>
        <div>Услуги трейдера <span>${traderService.toFixed(2)} USD</span></div>

        <h2>Доставка морем</h2>

        <div>Доставка морем <span>${seaDelivery.toFixed(2)} USD</span></div>
        <div>Стоимость услуг <span>${serviceCost.toFixed(2)} USD</span></div>
        <div>Всего затрат <span>${(seaDelivery + serviceCost).toFixed(2)} USD</span></div>
        <div class="output_important">Стоимость автомобиля в порту "Одесса"<span>${(price + traderService + seaDelivery + serviceCost + koreanAuctionTax + toKoreanPort + prepareDocuments).toFixed(2)} USD</span></div>

        <h2>Расходы по прибытию</h2>

        <div>Экспедирование в порту "Одесса" <span>${portForwarding.toFixed(2)} USD</span></div>
        <div>Брокерские услуги <span>${brokerageServices.toFixed(2)} USD</span></div>
        <div>Таможенные платежи <span>${allCalc.toFixed(2)} USD / (${allCalcUAH.toFixed(2)} грн.)</span></div>
        <div>Сертификация автомобиля <span>${sertivicate.toFixed(2)} USD</span></div>
        <div>Пенсионный фонд (первая регистрация) <span>${pensionFund.toFixed(2)} USD</span></div>

        <div class="output_important">Цена автомобиля под ключ <span>${(price + traderService + seaDelivery + serviceCost + portForwarding + brokerageServices + allCalc + sertivicate + pensionFund /* new data*/ + koreanAuctionTax + prepareDocuments + toKoreanPort).toFixed(2)} USD</span></div>
    `;

    UIoutput.innerHTML = html
    setTimeout(function() {
        UIloading.style.display = 'none';
        UIoutput.style.display = 'flex';
        UIoutput.scrollIntoView({block: "start", behavior: "smooth"});
        UIsaveResult.style.display = 'flex';
    }, 2000)

    calculationsData = {
        name: `${UImark.value} ${UImodel.value}`,
        percent: percent.toFixed(2),
        importDuty: importDuty.toFixed(2),
        importDutyUAH: importDutyUAH.toFixed(2),
        exciseTax: exciseTax.toFixed(2),
        exciseTaxUAH: exciseTaxUAH.toFixed(2),
        vat: vat.toFixed(2),
        vatUAH: vatUAH.toFixed(2),
        allCalc: allCalc.toFixed(2),
        allCalcUAH: allCalcUAH.toFixed(2),
        pensionFund: pensionFund.toFixed(2),
        pensionFundUAH: pensionFundUAH.toFixed(2),
        price: price.toFixed(2),
        status: status == 'electric'? 'electric': 'petrol or disel or gas',
        traderService: traderService.toFixed(2),
        seaDelivery: seaDelivery.toFixed(2),
        serviceCost: serviceCost.toFixed(2),
        portForwarding: portForwarding.toFixed(2),
        brokerageServices: brokerageServices.toFixed(2),
        sertivicate: sertivicate.toFixed(2),
        seaServiceAndDelivery: (seaDelivery + serviceCost).toFixed(2),
        carCostInOdessa: (price + traderService + seaDelivery + serviceCost + koreanAuctionTax + toKoreanPort + prepareDocuments).toFixed(2),
        totalCarCost: (price + traderService + seaDelivery + serviceCost + koreanAuctionTax + toKoreanPort + prepareDocuments + portForwarding + brokerageServices + allCalc + sertivicate + pensionFund).toFixed(2),
        koreanAuctionTax: koreanAuctionTax.toFixed(2),
        prepareDocuments: prepareDocuments.toFixed(2),
        toKoreanPort: toKoreanPort.toFixed(2)
    }
}

// *********************
// change placeholder if type of engine is electric
// *********************
function typeOfEngineHandler() {
    var val = document.querySelector('#engine').value;
    if (val !== 'electro') {
        document.querySelector('#volume').setAttribute('placeholder', 'Объем двигателя куб.см');
    } else {
        document.querySelector('#volume').setAttribute('placeholder', 'Мощность акум. кВт/ч');
    }
}

var backGroundPDF,
    marcupPDF,
    docPDF;


function getBGPDF() {
    var url = '/wp-content/themes/vedanta/calculator/txt/var_bg.txt';
    var req = new XMLHttpRequest();
    // req.responseType = 'json';
    req.open('GET', url, false);
    req.onload  = function() {
        backGroundPDF = req.response;
    };
    req.send(null);
}
function getMarcupPDF() {
    // var url = '/wp-content/themes/vedanta/calculator/txt/var_marcup.txt';
    var url = '/wp-content/themes/vedanta/calculator/txt/var_newMarcup.txt';
    var req = new XMLHttpRequest();
    // req.responseType = 'json';
    req.open('GET', url, false);
    req.onload  = function() {
        marcupPDF = req.response;
    };
    req.send(null);
}
function getDocPDF() {
    var url = '/wp-content/themes/vedanta/calculator/txt/var_bottomBG.txt';
    var req = new XMLHttpRequest();
    // req.responseType = 'json';
    req.open('GET', url, false);
    req.onload  = function() {
        docPDF = req.response;
    };
    req.send(null);
}
function savePDF() {

    getBGPDF();
    getMarcupPDF();
    getDocPDF();

    var bg = backGroundPDF;
    var marcup = marcupPDF;
    var bottomBG = docPDF;

    var doc = new jsPDF();

    var pageWidth = Number(doc.internal.pageSize.width.toFixed(0) || doc.internal.pageSize.getWidth().toFixed(0));

    doc.addImage(bg, 'WEBP', 0, 0, 211, 298);
    doc.addImage(marcup, 'WEBP', 10, 80, 190, 160);
    doc.addImage(bottomBG, 'WEBP', 10, 250, 190, 30);
    doc.setFontSize(40);
    doc.setTextColor(249, 92, 24);
    // (22, 167, 228)

    // CAR NAME
    doc.text(calculationsData.name, pageWidth / 2, 65, 'center');

    doc.setFontSize(12);
    doc.setTextColor(0, 0, 0);

    // doc.text(`${calculationsData.importDuty} USD`, 199, 84, 'right');

    // doc.text(`${calculationsData.exciseTax} USD`, 199, 89.5, 'right');

    // doc.text(`${calculationsData.vat} USD`, 199, 95, 'right');

    doc.text(`${calculationsData.allCalc} USD`, 199, 84, 'right');

    doc.text(`${calculationsData.pensionFund} USD`, 199, 95, 'right');

    // Расходы в Корее

    // doc.text(`${calculationsData.price} USD`, 199, 137.5, 'right');
    doc.text(`${calculationsData.price} USD`, 199, 121, 'right');

    doc.text(`${calculationsData.koreanAuctionTax} USD`, 199, 126.5, 'right');

    doc.text(`${calculationsData.toKoreanPort} USD`, 199, 132, 'right');

    doc.text(`${calculationsData.prepareDocuments} USD`, 199, 137.5, 'right');

    doc.text(`${calculationsData.traderService} USD`, 199, 143, 'right');

    // Доставка морем

    doc.text(`${calculationsData.seaDelivery} USD`, 199, 169, 'right');

    doc.text(`${calculationsData.serviceCost} USD`, 199, 174.5, 'right');

    doc.text(`${calculationsData.seaServiceAndDelivery} USD`, 199, 180, 'right');

    doc.setTextColor(22, 167, 228);
    doc.text(`${calculationsData.carCostInOdessa} USD`, 199, 185.5, 'right');

    // Расходы по прибытию

    doc.setTextColor(0, 0, 0);
    doc.text(`${calculationsData.portForwarding} USD`, 199, 211.5, 'right');

    doc.text(`${calculationsData.brokerageServices} USD`, 199, 217, 'right');

    doc.text(`${calculationsData.allCalc} USD`, 199, 222.5, 'right');

    doc.text(`${calculationsData.sertivicate} USD`, 199, 228, 'right');

    doc.text(`${calculationsData.pensionFund} USD`, 199, 233.5, 'right');

    doc.setTextColor(22, 167, 228);
    doc.text(`${calculationsData.totalCarCost} USD`, 199, 239, 'right');


    doc.save(`${calculationsData.name}.pdf`);
}

if (iOS) {
    loadCars();
    loadCurrency();
    //document.querySelector('.custom-select.mark').addEventListener('touchstart', loadCurrentModels);
}

function outputAjax(percent, importDuty, importDutyUAH, exciseTax, exciseTaxUAH, vat, vatUAH, allCalc, allCalcUAH, pensionFund, pensionFundUAH, price, status, bodyType) {

    var UIoutput = document.querySelector('#output'),
        UImark = document.querySelector('#mark'),
        UImodel = document.querySelector('#model'),
        UIloading = document.querySelector('#loading'),
        UIsaveResult = document.querySelector('#result_button');

    // our const in $ Витя
    var traderService = 300, // Услуги трейдера
        seaDelivery = +bodyType, // Доставка Морем 1500 $ (седан) , 1750 $ (кроссовер), 2000 $ (минивэн) из вёрстки (значение селекта)
        serviceCost = 1000, // Стоимость услуг
        portForwarding = 400, // Экспедирование в порту "Одесса"
        brokerageServices = 400, //Брокерские услуги
        sertivicate = 250, // Сертификация
        koreanAuctionTax = price / 100 * 2.2, // 2.2% Комиссия аукциона
        prepareDocuments = 100, // Подготовка и оформление экспортных документов
        toKoreanPort = 150; // Доставка в порт по территории Кореи

    koreanAuctionTax = koreanAuctionTax < 280 ? 280 : koreanAuctionTax;

    UIloading.style.display = 'block';

    /**
     *
     * @type {{portForwarding: *, exciseTax: *, pensionFundUAH: *, percent: *, allCalc: *, traderService: *, price: *, totalCarCost: (*|string), exciseTaxUAH: *, vatUAH: *, prepareDocuments: *, sertivicate: *, serviceCost: *, brokerageServices: *, vat: *, pensionFund: *, seaServiceAndDelivery: string, toKoreanPort: *, seaDelivery: *, carCostInOdessa: (*|string), importDutyUAH: *, name: string, koreanAuctionTax: *, importDuty: *, allCalcUAH: *, status: (string)}}
     */
    calculationsData = {
        name: UImark.value + ' ' + UImodel.value,
        percent: percent.toFixed(2),
        importDuty: importDuty.toFixed(2),
        importDutyUAH: importDutyUAH.toFixed(2),
        exciseTax: exciseTax.toFixed(2),
        exciseTaxUAH: exciseTaxUAH.toFixed(2),
        vat: vat.toFixed(2),
        vatUAH: vatUAH.toFixed(2),
        allCalc: allCalc.toFixed(2),
        allCalcUAH: allCalcUAH.toFixed(2),
        pensionFund: pensionFund.toFixed(2),
        pensionFundUAH: pensionFundUAH.toFixed(2),
        price: price.toFixed(2),
        status: status == 'electric'? 'electric': 'petrol or disel or gas',
        traderService: traderService.toFixed(2),
        seaDelivery: seaDelivery.toFixed(2),
        serviceCost: serviceCost.toFixed(2),
        portForwarding: portForwarding.toFixed(2),
        brokerageServices: brokerageServices.toFixed(2),
        sertivicate: sertivicate.toFixed(2),
        seaServiceAndDelivery: (seaDelivery + serviceCost).toFixed(2),
        carCostInOdessa: (price + traderService + seaDelivery + serviceCost + koreanAuctionTax + toKoreanPort + prepareDocuments).toFixed(2),
        totalCarCost: (price + traderService + seaDelivery + serviceCost + koreanAuctionTax + toKoreanPort + prepareDocuments + portForwarding + brokerageServices + allCalc + sertivicate + pensionFund).toFixed(2),
        koreanAuctionTax: koreanAuctionTax.toFixed(2),
        prepareDocuments: prepareDocuments.toFixed(2),
        toKoreanPort: toKoreanPort.toFixed(2)
    }

    /**
     *
     * @type {{action: string, type: string, fields: {bodyType: *, portForwarding: *, exciseTax: *, pensionFundUAH: *, percent: *, allCalc: *, model_car: *, traderService: *, price: *, exciseTaxUAH: *, vatUAH: *, prepareDocuments: *, marka_car: *, sertivicate: *, serviceCost: *, brokerageServices: *, vat: *, pensionFund: *, toKoreanPort: *, seaDelivery: *, importDutyUAH: *, koreanAuctionTax: *, importDuty: *, allCalcUAH: *, status: *}}}
     */
    var data = {
        action                  : 'calculator',
        type                    : 'CalculatorKorea',
        fields                  : {
            percent             : percent,
            importDuty          : importDuty,
            importDutyUAH       : importDutyUAH,
            exciseTax           : exciseTax,
            exciseTaxUAH        : exciseTaxUAH,
            vat                 : vat,
            vatUAH              : vatUAH,
            allCalc             : allCalc,
            allCalcUAH          : allCalcUAH,
            pensionFund         : pensionFund,
            pensionFundUAH      : pensionFundUAH,
            price               : price,
            status              : status,
            bodyType            : bodyType,
            traderService       : traderService,
            seaDelivery         : seaDelivery,
            serviceCost         : serviceCost,
            portForwarding      : portForwarding,
            brokerageServices   : brokerageServices,
            sertivicate         : sertivicate,
            koreanAuctionTax    : koreanAuctionTax,
            prepareDocuments    : prepareDocuments,
            toKoreanPort        : toKoreanPort,
            marka_car           : UImark.value,
            model_car           : UImodel.value,
        }
    };

    $.ajax( {
        beforeSend  :   function(xhr){
            $('#calculator').block(loader_default);
        },
        data        :   data,
        dataType    :   'html',
        method      :   'POST',
        headers     :   {
            "Content-Type": "application/x-www-form-urlencoded"
        },
        complete    :   function(){
            $('#calculator').unblock();
        },
        success     :   function( data ){

            $('#output').show().html(data);

        },
        url         :   ajax_calculator.ajaxurl
    } );
}