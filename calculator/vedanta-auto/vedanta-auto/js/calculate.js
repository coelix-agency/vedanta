


// fetch currencies from file
var usd = 24.17;
var euro = 26.75;

// create XMLHttpRequest for currencies USD and EURO

var date = new Date();
var current_hour = date.getHours();

if (current_hour < 15 || current_hour > 18) {
    var xhr = (window.XMLHttpRequest) ? new XMLHttpRequest() : new activeXObject("Microsoft.XMLHTTP");
    xhr.open( "POST", '/wp-content/themes/vedanta-auto/create_currency.php', true );
    xhr.send(null);
}

// var url = 'https://bank.gov.ua/NBUStatService/v1/statdirectory/exchange?json';
var url = '/wp-content/themes/vedanta-auto/js/my.json';
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
    }

};
req.send(null);





// add event listener
document.querySelector('#calculator').addEventListener('submit', calculateResults);
document.querySelectorAll('.custom-select').forEach(function(item) {
    item.addEventListener('click', clickTypeOfEngine, false)
});
window.addEventListener('resize', resizeHeader);
document.addEventListener("DOMContentLoaded", resizeHeader);

// calculate func
function calculateResults(e) {
    // UI elements
    var UIprice = document.querySelector('#price'),
        UIcurrency = document.querySelector('#currency'),
        UIvolume = document.querySelector('#volume'),
        UIengine = document.querySelector('#engine'),
        UIyear = document.querySelector('#year'),
        UIloading = document.querySelector('#loading'),
        UIoutput = document.querySelector('#output'),
        currentYear = new Date().getFullYear(),
        UIsaveResult = document.querySelector('#result_button'),
        coefficient;

    // hide our UI/UX elements
    UIloading.style.display = 'none';
    UIoutput.style.display = 'none';
    UIsaveResult.style.display = 'none';
    
    if (UIengine && UIengine.value !== 'electro') {

        // calculation for usual cars (рассчёт для всех обычных автомобилей)
        
        // if we haven't some data (проверяем введены ли у все данные)
        if (!UIprice.value || !UIcurrency.value || !UIvolume.value || !UIyear.value) {

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
            var price = Number(UIprice.value);
            var importDuty = price * 0.1;

            // Акцизный сбор
            var exciseTax,
            euroEqv,
            volume = Number(UIvolume.value),
            currency = UIcurrency.value,
            engine = UIengine.value;
            if (currency == 'eur') {
                if ( engine === 'petrol') {
                    if ( +volume <= 3000) {
                        // 0.05 euro
                        euroEqv = 0.05;
                        exciseTax = +volume * euroEqv * coefficient;
                    } else {
                        euroEqv = 0.1;
                        exciseTax = +volume * euroEqv * coefficient;
                    }
                } else {
                    if ( +volume <= 3500) {
                        euroEqv = 0.075;
                        exciseTax = +volume * euroEqv* coefficient;
                    } else {
                        euroEqv = 0.15;
                        exciseTax = +volume * euroEqv * coefficient;
                    }
                }
            } else {
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
            }

            // VAT НДС 20%
            var vat = (importDuty + exciseTax + +price) * 0.2;

            // Пенсионный фонд
            var priceUAH,
            pensionFund,
            currentCurrensy;

            if (currency == 'eur') {
                priceUAH = price*euro;
                currentCurrensy = 'EURO';
            } else {
                priceUAH = price*usd;
                currentCurrensy = 'USD';
            }

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


            if (currency == 'eur') {
                importDutyUAH = importDuty * euro;
                exciseTaxUAH = exciseTax * euro;
                vatUAH = vat * euro;
                pensionFundUAH = pensionFund * euro;
                allCalcUAH = allCalc * euro;
            } else {
                importDutyUAH = importDuty * usd;
                exciseTaxUAH = exciseTax * usd;
                vatUAH = vat * usd;
                pensionFundUAH = pensionFund * usd;
                allCalcUAH = allCalc * usd;
            }

            // output
            outputResults(currentCurrensy, 
                percent, 
                importDuty, 
                importDutyUAH, 
                exciseTax,
                exciseTaxUAH,
                vat,
                vatUAH,
                allCalc,
                allCalcUAH,
                pensionFund,
                pensionFundUAH);

        }
    } else {

        // calculation for electro cars

        // if we haven't some data (проверяем введены ли у все данные)
        if (!UIprice.value || !UIcurrency.value || !UIvolume.value || !UIyear.value) {

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
            // ...Ввозная (импортная ) пошлина =  0%
            var importDuty = 0;
            // ...Акцизный сбор = Мощность аккумулятора * (1 евро)
            var exciseTax,
                currency = UIcurrency.value,
                volume = Number(UIvolume.value);
            if (currency == 'eur') {
                exciseTax = volume * 1
            } else {
                exciseTax = volume * (1 * euro / usd); 
            }

            // ...Пенсионный фонд: при цене машины меньше 305 745 гривен - 3% ; от 305 745 до 537 370  4% ; 537 370 и выше - 5%
            var priceUAH,
                pensionFund,
                currentCurrensy,
                price = Number(UIprice.value);

            if (currency == 'eur') {
                priceUAH = price * euro;
                currentCurrensy = 'EURO';
            } else {
                priceUAH = price * usd;
                currentCurrensy = 'USD';
            }

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

            // НДС
            var vat = 0;

            // allCalc
            var allCalc = importDuty + exciseTax + vat;

            // UAH val
            if (currency == 'eur') {
                importDutyUAH = importDuty * euro;
                exciseTaxUAH = exciseTax * euro;
                vatUAH = vat * euro;
                pensionFundUAH = pensionFund * euro;
                allCalcUAH = allCalc * euro;
            } else {
                importDutyUAH = importDuty * usd;
                exciseTaxUAH = exciseTax * usd;
                vatUAH = vat * usd;
                pensionFundUAH = pensionFund * usd;
                allCalcUAH = allCalc * usd;
            }

            // output
            outputResults(currentCurrensy, 
                percent, 
                importDuty, 
                importDutyUAH, 
                exciseTax,
                exciseTaxUAH,
                vat,
                vatUAH,
                allCalc,
                allCalcUAH,
                pensionFund,
                pensionFundUAH);
        }
    }
    


    e.preventDefault();
}

function clickTypeOfEngine() {
    var val = document.querySelector('#engine').value;
    if (val !== 'electro') {
        document.querySelector('#volumeCont').childNodes[0].textContent = 'Объем двигателя куб.см' ;
    } else {
        document.querySelector('#volumeCont').childNodes[0].textContent = 'Мощность акум. кВт/ч' ;
    }
}

// screenshot
function screenshotHandler() {
    $('#result_button').hide()
    var inputs = $('#calc label input');
    var selects = $('#calc select');
    for (var i=0; i<inputs.length; i++) {
        var label = document.createElement('div');
        label.classList.add('removed')
        label.innerHTML = ' ' + inputs[i].value;
        inputs[i].after(label);
        // inputs[i]
    }
    for (var i=0; i<selects.length; i++) {
        var label = document.createElement('div');
        label.classList.add('removed')
        var value;
        if ( selects[i].value === 'petrol') {
            value = ' Бензин';
        } else if ( selects[i].value === 'diesel') {
            value = ' Дизель';
        }else if ( selects[i].value === 'do5') {
            value = ' До 5 тонн';
        }else if ( selects[i].value === '5-20') {
            value = ' От 5 до 20 тонн';
        }else if ( selects[i].value === '20+') {
            value = ' Более 20 тонн';
        } else if ( selects[i].value === 'eur') {
            value = ' EURO';
            label.classList.add('currency')
        } else if ( selects[i].value === 'usd') {
            value = ' USD';
            label.classList.add('currency')
        }
        label.innerHTML = value || selects[i].value;
        selects[i].after(label);
    }
    $('#calc .select_cont').addClass('hidden');
    $('#calc label .label_cont').removeClass('beauty');
    setTimeout(function() {
        $('div.removed').remove();
        $('#calc .select_cont').removeClass('hidden');
        $('#calc label .label_cont').addClass('beauty');
    })
}


// html2canvas screenshot
// data-html2canvas-ignore // data-attr for ignore element
document.getElementById("result_button").addEventListener('click', function () {
    var options = {
        // allowTaint: true,
        logging: false,
        // onclone: screenshotHandler()
    };
    html2canvas(document.getElementById("calc"), options).then(function(canvas) {
        canvas.toBlob(function(blob) {
            saveAs(blob, "kalkulyator-rastamozhki-avto.png");
        });
    });	
    
})


function outputResults(currentCurrensy, percent, importDuty, importDutyUAH, exciseTax, exciseTaxUAH, vat, vatUAH, allCalc, allCalcUAH, pensionFund, pensionFundUAH) {
    var UIoutput = document.querySelector('#output'),
        UIloading = document.querySelector('#loading'),
        UIsaveResult = document.querySelector('#result_button');

    
    UIloading.style.display = 'block';
    var html = `
        <div class="result_content-1">
            <div class="res_cont1"><span class="left">Ввозная (импортная) пошлина </span> <span>10 %</span>
            </div>
        <div class="res_cont2">${importDuty.toFixed(2)}<span class="currency"> ${currentCurrensy}</span></div>
            <div class="res_cont3">(${importDutyUAH.toFixed(2)} грн.)</div>
        </div>
        <div class="result_content-2">
            <div class="res_cont1"><span class="left">Акцизный сбор</span></div>
        <div class="res_cont2">${exciseTax.toFixed(2)}<span class="currency"> ${currentCurrensy}</span></div>
            <div class="res_cont3">(${exciseTaxUAH.toFixed(2)} грн.)</div>
        </div>
        <div class="result_content-3">
            <div class="res_cont1"><span class="left">Налог на добавленную стоимость (НДС) </span>
                <span>20%</span></div>
        <div class="res_cont2">${vat.toFixed(2)}<span class="currency"> ${currentCurrensy}</span></div>
            <div class="res_cont3">(${vatUAH.toFixed(2)} грн.)</div>
        </div>
        <div class="result_content-4">
            <div class="res_cont1"><span class="left">Всего таможенных платежей</span></div>
        <div class="res_cont2">${allCalc.toFixed(2)}<span class="currency"> ${currentCurrensy}</span></div>
            <div class="res_cont3">(${allCalcUAH.toFixed(2)} грн.)</div>
        </div>
        <div class="result_content-5">
            <div class="res_cont1"><span class="left">Дополнительные расходы</span></div>
            <div class="res_cont2"></div>
            <div class="res_cont3"></div>
        </div>
        <div class="result_content-6">
            <div class="res_cont1"><span class="left">Пенсионный фонд</span> <span id="pensionFund">${percent}%</span>
            </div>
        <div class="res_cont2">${pensionFund.toFixed(2)}<span class="currency"> ${currentCurrensy}</span></div>
            <div class="res_cont3">(${pensionFundUAH.toFixed(2)} грн.)</div>
        </div>
    `;
    UIoutput.innerHTML = html
    setTimeout(function() {
        UIloading.style.display = 'none';
        UIoutput.style.display = 'block';
        UIsaveResult.style.display = 'block';
    }, 2000)
}



function resizeHeader() {
    var top = document.querySelector('.top.view'),
        header = document.querySelector('header');
    
    header.style.height = `${top.offsetHeight}px`;
}

