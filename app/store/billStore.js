Ext.define('Star.store.billStore', {
			extend : 'Ext.data.Store',
			alias : 'widget.billStore',
			model : 'Star.model.workingDetail',
			// sorters: ['billno'],
			// groupField: 'billno',
//			extraParams : {
//				action : 'bill'
//			},
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
