Ext.define('Star.view.fee_type_win', {
			extend : 'Ext.window.Window',
			alias:'widget.fee_type_win',
			title : '费用类型管理',
			closeAction: 'destroy',
			width : 500,
			height : 300,
			minHeight : 300,
			layout : 'fit',
			resizable : true,
			margins:'0 0 0 0',
			modal : true,
			items : [{
						xtype : 'fee_type_form',
						width:'100%',
						height:'100%'
					}]

		});
