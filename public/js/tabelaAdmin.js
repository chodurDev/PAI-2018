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
    //grid.addFilter('data_wykonania',format(previousDay,'yyyy-MM-dd') , '=');
    grid.destroy();
  load();

}

function moreDate(){
    outputStringDate = document.getElementById("dateExecution").value
    var nextDay=new Date(outputStringDate);
    nextDay.setDate(nextDay.getDate() + 1);
    currentDay=document.getElementById("dateExecution").value=format(nextDay,'yyyy-MM-dd');
    //grid.addFilter('data_wykonania',format(nextDay,'yyyy-MM-dd') , '=');
    grid.destroy();
   load();


}
function loadData(){
    var outputStringDate = document.getElementById("dateExecution").value
    var Day=new Date(outputStringDate);
    Day.setDate(Day.getDate());
    currentDay= document.getElementById("dateExecution").value=format(Day,'yyyy-MM-dd');
    //grid.addFilter('data_wykonania',format(Day,'yyyy-MM-dd') , '=');
    //grid.hide();
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
        selModel:'rows',
        trackOver: true,
        filter: true,


        data: {
            proxy: {
                api:{
                    create:'?page=adminServiceAdd',
                    read:'?page=admin_services&data_wykonania='+document.getElementById("dateExecution").value,
                    update:'?page=adminServiceUpdate',
                    destroy:'?page=adminServiceDelete'
                }


            }
        },
        tbar: [{
            type:'button',
            text: 'Add',
            action: 'add'
        }, {
            type:'button',
            text: 'Delete',
            action: 'remove'
        }],
        defaults: {
            type: 'string',
            width: 75,
            resizable: true,
            sortable: true,
            editable: true,
            height: 200


        },
        clicksToEdit: 1,
        columnLines: true,
        // columnClickData: true,
        columns: [{
            title: 'Imie',
            index: 'imie',
            width: 100
        }, {
            title: 'Nazwisko',
            index: 'nazwisko',
            width: 100
        }, {
            title: 'Marka',
            index: 'marka',
            width: 100,
            type:'combo',
            data: {
                proxy: {
                    url: 'public/js/DataCarMarka.php'
                }
            }

        },{
            title: 'Model',
            index: 'model',
            width: 100,
            type:'combo',
            data: {
                proxy: {
                    url: 'public/js/DataCarModel.php'
                }
            }

        },{
            title: 'Rodzaj usługi',
            index: 'nazwa_uslugi',
            width: 100,
            type:'combo'
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
            width: 110
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
        },{
            title: 'Data wykonania',
            index: 'data_wykonania',
            type: 'date',
            width: 120,
            format: {

                read: 'Y-m-d',
                write: 'd/m/Y',
                edit: 'd/m/Y'
            }
        }]

    });

};
//grid=

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



function phoneInputFn(value) {
    value = parseInt(value.replace(/\-/g, ''));

    if (isNaN(value)) {
        value = '';
    } else {
        value = String(value);
    }

    switch (value.length) {
        case 0:
        case 1:
        case 2:
            break;
        case 4:
        case 5:
        case 6:
            value = value.replace(/^(\d{3})/, "$1-");
            break;
        case 7:
        case 8:
        case 9:
            value = value.replace(/^(\d{3})(\d{3})/, "$1-$2-");
            break;
        case 10:
            value = value.replace(/(\d{3})(\d{3})(\d{4})/, "$1-$2-$3");
            break;
        default:
            value = value.substr(0, 10);
            value = value.replace(/(\d{3})(\d{3})(\d{4})/, "$1-$2-$3");
    }

    return value;
}


var data = [{
    "position": "Tech Director",
    "imie": "Alexander",
    "nazwisko": "Brown",
    "cena": 6000,
    "phone": "858-490-5002",
    "birthday": "1966.08.21",
    "marka":""
}];