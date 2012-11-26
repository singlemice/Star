Ext.define('Star.store.detailStore', {
    extend: 'Ext.data.Store',
    alias:'widget.detailStore',
    model: 'Star.model.workingDetail',
//    sorters: ['billno'],
//    groupField: 'billno',
    pageSize: 20,
    autoLoad: false,
    proxy: {
        type: 'ajax',
        
        api:{
        	read : 'list_working.php',
        	create : 'list_working.php',
        	update : 'update_working.php',
        	destroy : 'destroy_working.php'
        },
        reader:{
        type:'json',
        root:'detailData',
        totalProperty: 'iTotalRecords'
        }
    }
});
