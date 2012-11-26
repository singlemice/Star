Ext.define('Star.store.projectStoreItem', {
    extend: 'Ext.data.Store',
    alias:'widget.projectStoreItem',
    model: 'Star.model.projectModel',
//    sorters: ['billno'],
//    groupField: 'billno',
    autoLoad: true,
    proxy: {
        type: 'ajax',
        url : 'process_project.php',
        extraParams:{
        	action:'item'
        },
        reader:{
        type:'json',
        root:'detailData'
        }
    }
});
