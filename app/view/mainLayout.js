/**
 * 
 */

Ext.define('Star.view.mainLayout', {
			extend : 'Ext.panel.Panel',
			alias : 'widget.mainLayout',
			id : 'maniLayout',
			title : '南京电大',
			layout : 'border',
			items : [{
						xtype : 'topPanel',
						id : 'mainTopPanel',
						region : 'north',
						width : '100%',
						height : 70
					}, {
						title : '功能导航',
						xtype : 'menuTree',
						region : 'west',
						border:true,
						width : 150,
						autoHeight : true
					}, {
						title : '工作区',
						region : 'center',
						xtype : 'tabpanel',
						id : 'mainTablPanel',
						width : '100%',
						height : '100%',
						layout : 'fit',
						items : [{
									title : 'Welcome you!',
									id:'welcome',
									xtype : 'welcome'
								},
//								{
//									title : '费用明细管理',
//									id:'detailPanel',
//									xtype : 'detailPanel'
//								},
								{
									title : '票据管理',
									id:'billManagePanel',
									xtype : 'billManagePanel'
								}
								]
					}],
			initComponent : function() {
				this.callParent(arguments);

			}
		});