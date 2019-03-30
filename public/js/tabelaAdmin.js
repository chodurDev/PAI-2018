var grid;

var currentDay;

var outputStringDate;
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


function lessDate(){
    outputStringDate = document.getElementById("dateExecution").value
    var previousDay=new Date(outputStringDate);
    previousDay.setDate(previousDay.getDate() - 1);
    currentDay=document.getElementById("dateExecution").value=format(previousDay,'yyyy-MM-dd');
    grid.destroy();
  load();

}

function moreDate(){
    outputStringDate = document.getElementById("dateExecution").value
    var nextDay=new Date(outputStringDate);
    nextDay.setDate(nextDay.getDate() + 1);
    currentDay=document.getElementById("dateExecution").value=format(nextDay,'yyyy-MM-dd');
    grid.destroy();
   load();


}
function loadData(){
    var outputStringDate = document.getElementById("dateExecution").value
    var Day=new Date(outputStringDate);
    Day.setDate(Day.getDate());
    currentDay= document.getElementById("dateExecution").value=format(Day,'yyyy-MM-dd');
    grid.destroy();
    load();


}

document.addEventListener("DOMContentLoaded", function() {
    document.getElementById("dateExecution").value = format(new Date(), 'yyyy-MM-dd');

});

function load(){

    grid=new FancyGrid({
        resizable: true,
        renderTo: 'container',
        title: '44 DETAILING - CRM',
        width: 'fit',
        height: 200,
        selModel:'row',
        trackOver: true,
        filter: true,
        theme: 'gray',


        data: {
            proxy: {
                api:{
                    create:'?page=adminServiceAdd&data_wykonania='+document.getElementById("dateExecution").value,
                    read:'?page=admin_services&data_wykonania='+document.getElementById("dateExecution").value,
                    update:'?page=adminServiceUpdate',
                    destroy:'?page=adminServiceDelete'
                }


            }
        },
        tbar: [{
            type:'button',
            text: 'Add',
            action: 'add',
            tip:'dodaje rekord do bazy'
        }, {
            type:'button',
            text: 'Delete',
            action: 'remove',
            tip:'usuwa rekord z bazy'
        }],
        defaults: {
            resizable: true,
            sortable: true,
            editable: true,
            scrollable:true

        },
        clicksToEdit: 1,
        columnLines: true,
        columnClickData: true,
        columns: [{
            title: 'Nazwisko i Imie',
            index: 'nazwisko_imie',
            width: 200,
            cellTip:'podpowiedz'

        },  {
            title: 'Marka i model',
            index: 'nazwa_samochod',
            width: 100,
            editable:true,
            type:'combo',
            data: {
                proxy: {
                    url: 'public/js/DataCarMarka.php'//todo sprawdzic czy combo przypadkiem nie wyłącza możliwości edytowania komórek!!!
                }
            },
            displayKey: 'nazwa_samochod'

        },{
            title: 'Rodzaj usługi',
            index: 'nazwa_uslugi',
            width: 100,
            type:'combo',
            data: {
                proxy: {
                    url: 'public/js/DataServicesType.php'
                }
            },
            displayKey: 'nazwa_uslugi',
            format: {
                inputFn: ServicesTypeInputFn
            }

        }, {
            title: 'Cena',
            index: 'cena',
            type: 'number',
            spin: true,
            step: 10,
            min: 0,
            max: 100000,
            format: {
                inputFn: cenaInputFn
            }
        },{
            title: 'Zapłacone',
            index: 'zaplacone',
            type:'combo',
            width: 80,
            data:['tak','nie']

        },{
            title: 'Rodzaj płatności',
            index: 'nazwa_platnosci',
            width: 110,
            type:"combo",
            data: {
                proxy: {
                    url: 'public/js/DataServicesPaymentType.php'
                }
            },
            displayKey: 'nazwa_platnosci'
        },{
            title: 'Dane do FV(NIP)',
            index: 'nip',
            width: 110
        },{
            title: 'Email',
            index: 'email',
            width: 80
        },{
            title: 'Uwagi',
            index: 'tresc_uwagi',
            width: 80
        }]
        // events: [{
        //     set: function(grid, o){
        //         if (o.value =='wprowadz dane'||o.value.empty()) {
        //             o.style = {
        //                 color: '#E46B67'
        //             };
        //         } else {
        //             o.style = {
        //                 color: '#65AE6E'
        //             };
        //         }
        //
        //     }}]

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
// value.style = {
//     color: '#E46B67'
// };
        return value;
}


function NieWypelnione(o) {

    if (o.value =='wprowadz dane'||o.value.empty()) {
        o.style = {
            color: '#E46B67'
        };
    } else {
        o.style = {
            color: '#65AE6E'
        };
    }



    return o;
}






