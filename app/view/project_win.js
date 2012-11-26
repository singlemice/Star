Ext.define('Star.view.project_win', {
			extend : 'Ext.window.Window',
			alias:'widget.project_win',
			title : '项目管理',
			closeAction: 'destroy',
			width : 500,
			height : 300,
			minHeight : 300,
			layout : 'fit',
			resizable : true,
			margins:'0 0 0 0',
			modal : true,
			items : [{
						xtype : 'project_form',
						width:'100%',
						height:'100%'
					}]

		});
