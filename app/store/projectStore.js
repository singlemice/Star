Ext.define('Star.store.projectStore', {
    extend: 'Ext.data.Store',
    alias:'widget.projectStore',
    model: 'Star.model.projectModel',
//    sorters: ['billno'],
//    groupField: 'billno',
    autoLoad: true,
    proxy: {
        type: 'ajax',
        url : 'process_project.php',
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
