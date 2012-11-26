Ext.define('Star.store.recordStore', {
			extend : 'Ext.data.Store',
			alias : 'widget.recordStore',
			model : 'Star.model.workingDetail',
			sorters : ['billno'],
			groupField : 'billno',
			extraParams : {
				action : 'record'
			},
			proxy : {
				type : 'ajax',
				url : 'list_working.php',

				reader : {
					type : 'json',
					root : 'detailData',
					totalProperty : 'iTotalRecords'
				}
			}
		});
