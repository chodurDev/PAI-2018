

document.addEventListener("DOMContentLoaded", function() {
    new FancyGrid({
        resizable: true,
        renderTo: 'container',
        title: '44 DETAILING - NIEZAPŁACONE',
        width: 'fit',
        height: 'fit',
        selModel:'row',
        trackOver: true,
        filter: true,
        theme: 'gray',


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
            editable: false,
            height: 200


        },
        clicksToEdit: 1,
        columnLines: true,
        columnClickData: true,
        columns: [{
            title: 'Nazwisko i Imie',
            index: 'nazwisko_imie',
            width: 200

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
            displayKey: 'nazwa_samochod'

        },{
            title: 'Rodzaj usługi',
            index: 'nazwa_uslugi',
            width: 100,
            format: {
                inputFn: ServicesTypeInputFn
            }


        }, {
            title: 'Cena',
            index: 'cena',
            type: 'number',
            format: {
                inputFn: cenaInputFn
            }

        },{
            title: 'Zapłacone',
            index: 'zaplacone',
            type:'combo',
            width: 80,
            data:['tak','nie'],
            editable:true

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
});

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

