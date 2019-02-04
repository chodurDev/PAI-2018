var grid;




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


        data: {
            proxy: {
                api:{
                    read:'?page=admin_servicesUnregulated',
                    update:'?page=adminServiceUpdate',
                    destroy:'?page=adminServiceDelete'
                }


            }
        },
        tbar: [{
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
        columnClickData: true,
        columns: [{
            title: 'Nazwisko i Imie',
            index: 'nazwisko_imie',
            width: 200,
            editable: false
        }, {
            title: 'Marka i model',
            index: 'nazwa_samochod',
            width: 100,
            type:'combo',
            data: {
                proxy: {
                    url: 'public/js/DataCarMarka.php'
                }
            },
            displayKey: 'nazwa_samochod',
            editable: false
        },{
            title: 'Rodzaj usługi',
            index: 'nazwa_uslugi',
            width: 100,
            format: {
                inputFn: ServicesTypeInputFn
            },
            editable: false

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
            },
            editable: false
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
            editable: false
        },{
            title: 'Dane do FV(NIP)',
            index: 'nip',
            width: 110,
            editable: false
        },{
            title: 'Email',
            index: 'email',
            width: 80,
            editable: false
        },{
            title: 'Uwagi',
            index: 'tresc_uwagi',
            width: 80,
            editable: false
        },{
            title: 'Data wykonania',
            index: 'data_wykonania',
            type: 'date',
            width: 120,
            format: {

                read: 'Y-m-d',
                write: 'd/m/Y',
                edit: 'd/m/Y'
            },
            editable: false
        }]

    });

};


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