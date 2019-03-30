var grid;
var to;
var from;
format = function date2str(x, y) {
    var z = {
        M: x.getMonth() + 1,
        d: x.getDate(),
        h: x.getHours(),
        m: x.getMinutes(),
        s: x.getSeconds()
    };
    y = y.replace(/(M+|d+|h+|m+|s+)/g, function(v) {
        return ((v.length > 1 ? "0" : "") + eval('z.' + v.slice(-1))).slice(-2)
    });

    return y.replace(/(y+)/g, function(v) {
        return x.getFullYear().toString().slice(-v.length)
    });
}
const date = new Date();
const month = date.toLocaleString('pl-eu', { month: 'long' });


var monthSelect = document.querySelector('#month');



function getMonthNumber(monthSelect){
    switch (monthSelect) {
        case "Styczeń":
            return 1;
            break;
        case "Luty":
            return 2;
            break;
        case "Marzec":
            return  ;
            break;
        case "Kwiecień":
            return 4;
            break;
        case "Maj":
            return 5;
            break;
        case "Czerwiec":
            return 6;
            break;
        case "Lipiec":
            return 7;
            break;
        case "Sierpień":
            return 8;
            break;
        case "Wrzesień":
            return  ;
            break;
        case "Październik":
            return 10;
            break;
        case "Listopad":
            return  1;
            break;
        case "Grudzień":
            return 12;
            break;
    }
}
var currentDay=new Date();
currentDay.setDate(currentDay.getDate());

var previousMonth=new Date(currentDay);
previousMonth.setDate(currentDay.getDate() - 28);


document.addEventListener("DOMContentLoaded", function() {
     document.getElementById("toDate").value = format(currentDay, 'yyyy-MM-dd');
     document.getElementById("fromDate").value = format(previousMonth, 'yyyy-MM-dd');


});
function loadData(){
    var from = document.getElementById("fromDate").value
    var to = document.getElementById("toDate").value

    var fromDay=new Date(from);
    var toDay=new Date(to);
    fromDay.setDate(fromDay.getDate());
    toDay.setDate(toDay.getDate());
    document.getElementById("fromDate").value=format(fromDay,'yyyy-MM-dd');
    document.getElementById("toDate").value=format(toDay,'yyyy-MM-dd');

    grid.destroy();
    load();


}

function load() {
     to= document.getElementById("toDate").value
    from= document.getElementById("fromDate").value
    var columns = [{
        index: 'name',
        type: 'string',
        sortable: true,
        width: 100,
        title: 'Name'
    },{
        index: 'surname',
        type: 'string',
        sortable: true,
        title: 'Start Price'
    }];

    var selModel = 'row',
        defaults = {
            resizable: true,
            draggable: true
        };

    grid=new FancyTab({
        renderTo: 'container',
        title: {
            text: '44 DETAILING '
        },
        width: 'fit',
        height: 450,
        resizable: true,
        theme: 'gray',

        items: [{
            title: 'L.rodzajów usług',
            type: 'grid',
            selModel: selModel,
            data: {
                proxy: {
                    url: '?page=ServiceTypeCount&from='+from+'&to='+to
                }
            },
            defaults: defaults,
            columns:  [{
                index: 'nazwa_uslugi',
                type: 'string',
                sortable: true,
                title: 'Nazwa usługi'
            },{
                index: 'liczba_wykonanych_uslug',
                type: 'number',
                sortable: true,
                width:150,
                title: 'Liczba wykonanych usług'
            },{
                index: 'suma_kwot_platnosci',
                type: 'number',
                sortable: true,
                width:150,
                title: 'Suma kwot płatności',
                format: {
                    inputFn: cenaInputFn
                }
            }]
        },{
            title: 'L.rodzajów płatności',
            type: 'grid',
            selModel: selModel,
            data: {
                proxy: {
                    url: '?page=ServicePaymentTypeCount&from='+from+'&to='+to
                }
            },
            defaults: defaults,
            columns: [{
                index: 'nazwa_platnosci',
                type: 'string',
                sortable: true,
                width: 120,
                title: 'Rodzaj płatnosci'
            },{
                index: 'liczba_wykonanych_platnosci',
                type: 'number',
                sortable: true,
                width:200,
                title: 'Liczba wykonanych płatnosci'
            },{
                index: 'suma_kwot_platnosci',
                type: 'number',
                sortable: true,
                width:150,
                title: 'Suma kwot płatności',
                format: {
                    inputFn: cenaInputFn
                }
            }]
        },{
            title: 'L.zapłaconych/niezapłaconych',
            type: 'grid',
            selModel: selModel,
            data: {
                proxy: {
                    url: '?page=ServicePaid&from='+from+'&to='+to
                }
            },
            defaults: defaults,
            columns: [{
                index: 'zaplacone',
                type: 'string',
                sortable: true,
                width: 150,
                title: 'Zapłacone/Niezapłacone'
            },{
                index: 'liczba_zaplaconych',
                type: 'number',
                sortable: true,
                width:220,
                title: 'Liczba zapłaconych/niezapłaconych'
            },{
                index: 'kwota_zaplaconych',
                type: 'number',
                sortable: true,
                width:220,
                title: 'Kwota zapłaconych/niezapłaconych',
                format: {
                    inputFn: cenaInputFn
                }
            }]
        }]

    });
}


function cenaInputFn(value) {
    value = value.toString().replace('zł', '').replace(/\,/g, ' ').replace('-', '').replace('.', '');

    if (value.length === 0) {
        value = '';
    } else if (value.length > 6) {
        value = value.substr(0, 6);
        value = value.replace(/\B(?=(\d{3})+(?!\d))/g, ' ')+' zł';
    } else {
        value =value.replace(/\B(?=(\d{3})+(?!\d))/g, ' ')+ ' zł';
    }

    return value;
}

function ServicesTypeInputFn(value) {
    value = value.toString().substr(0, value.indexOf(" "));

    return value;
}

