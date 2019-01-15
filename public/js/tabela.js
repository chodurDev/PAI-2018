document.addEventListener("DOMContentLoaded", function() {
    new FancyGrid({
        resizable: true,
        renderTo: 'container',
        title: '44 DETAILING - CRM',
        width: 'fit',
        height: 'fit',
        trackOver: true,

        data: {
            proxy: {
                type: 'rest',
                read:'POST',
                url: '?page=admin_uslugi'
            }
        },
        tbar: [{
            text: 'Add',
            action: 'add'
        }, {
            text: 'Remove',
            action: 'remove'
        }],
        defaults: {
            type: 'string',
            width: 75,
            resizable: true,
            sortable: true,
            editable: true,

        },
        clicksToEdit: 1,
        columnLines: true,
        columnClickData: true,
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
            type:'combo'

        },{
            title: 'Model',
            index: 'model',
            width: 100,
            type:'combo'

        },{
            title: 'Rodzaj usługi',
            index: 'nazwa_uslugi',
            width: 100
        }, {
            title: 'Cena',
            index: 'cena',
            type: 'number',
            spin: true,
            step: 10,
            min: 0,
            max: 10000,
            format: {
                inputFn: cenaInputFn
            }
        },{
            title: 'Zapłacone',
            index: 'zaplacone',
            type:'select',
            width: 80
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
            width: 90,
            format: {
                read: 'Y.m.d',
                write: 'd/m/Y',
                edit: 'd/m/Y'
            }
        }]
    });
});

function cenaInputFn(value) {
    value = value.toString().replace('$', '').replace(/\,/g, '').replace('-', '').replace('.', '');

    if (value.length === 0) {
        value = '';
    } else if (value.length > 6) {
        value = value.substr(0, 6);
        value = '$' + value.replace(/\B(?=(\d{3})+(?!\d))/g, ',');
    } else {
        value = '$' + value.replace(/\B(?=(\d{3})+(?!\d))/g, ',');
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