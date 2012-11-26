Ext.define('Star.store.feetypeStoreItem', {
    extend: 'Ext.data.Store',
    alias:'widget.feetypeStoreItem',
    model: 'Star.model.feetypeModel',
//    sorters: ['billno'],
//    groupField: 'billno',
    autoLoad: true,
    proxy: {
        type: 'ajax',
        url : 'process_fee_type.php',
//        extraParams:{
//        	action:'item'
//        },
        reader:{
        type:'json',
        root:'detailData'
        }
    }
});
