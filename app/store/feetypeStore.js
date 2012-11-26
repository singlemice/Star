Ext.define('Star.store.feetypeStore', {
    extend: 'Ext.data.Store',
    alias:'widget.feetypeStore',
    model: 'Star.model.feetypeModel',
//    sorters: ['billno'],
//    groupField: 'billno',
    autoLoad: true,
    proxy: {
        type: 'ajax',
        url : 'process_fee_type.php',
        params:{
        	action:'list'
        },
        reader:{
        type:'json',
        root:'detailData',
        totalProperty: 'iTotalRecords'
        }
    }
});
