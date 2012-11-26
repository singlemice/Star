Ext.define('Star.view.showwin', {
			extend : 'Ext.window.Window',
			alias:'widget.showwin',
			title : '添加记录',
			closeAction: 'destroy',
			width : 500,
			height : 300,
			minHeight : 300,
			layout : 'fit',
			resizable : true,
			modal : true,
			items : [{
						xtype : 'detail_form'
					}]

		});
