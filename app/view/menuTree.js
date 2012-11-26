/**
 * 主布面左边导航栏
 */

Ext.define('Star.view.menuTree', {
	extend : 'Ext.tree.Panel',
	alias : 'widget.menuTree',
	id : 'menuTree',
	rootVisible : true,
	singleExpand : true,
	autoScroll : true,
	defaults:{
		bodyStyle:'padding:5px,2px,5px,2px'
	},
	//border:'10 5 3 10',
	collapsible:true,
	id : 'treePanel',
	root : {
		text : '南京电大',
		id : 'njtree',
		name : 'njtree',
		leaf : false,
		children : [{
					text : '明细管理',
					id : 'detainM',
					name : 'detainM',
					children : [{
								text : '费用明细管理',
								leaf : true,
								id : 'managerDetail',
								name : 'managerDetail'
							}, {
								text : '明细报表管理',
								leaf : true,
								id : 'reportDetail',
								name : 'reportDetail'
							},{
								text : '项目管理',
								leaf : true,
								id : 'projectManage',
								name : 'projectManage'
							}, {
								text : '打印管理',
								leaf : true,
								id : 'printDetail',
								name : 'reportDetail'
							}]
				}, {
					text : '票据管理',
					id:'billmanage',
					children : [{
								text : '工时票据管理',
								leaf : true,
								id : 'workingbillmanage'
							}, {
								text : '工时报表管理',
								leaf : true,
								id : 'reportWorking'
							}, {
								text : '打印管理',
								leaf : true,
								id : 'printWorking'
							}]
				}, {
					text : '监考管理',
					id:'invigilate',
					children : [{
								text : '监考费用管理',
								leaf : true,
								id : 'managerInvigilate'
							}, {
								text : '临考老师管理',
								leaf : true,
								id : 'teacher'
							}, {
								text : '报表管理',
								leaf : true,
								id : 'reportInvigilate'
							}, {
								text : '打印管理',
								leaf : true,
								id : 'printInvigilate'
							}]
				},

				{
					text : '报表管理',
					id:'report',
					name:'report',
					children : [{
								text : '月报表',
								leaf : true,
								id : 'exportMonthReport',
								name : 'exportMonthReport'
							},
							{
								text : '导出报表',
								leaf : true,
								id : 'exportReport',
								name : 'exportReport'
							},
							{
								text : '报表管理',
								leaf : true,
								id : 'manageReport',
								name : 'manageReport'
							}]
				}, {
					text : '系统管理',
					id:'sysManamger',
					name:'sysManamger',
					children : [{
								text : '用户管理',
								leaf : true,
								id : 'userManager',
								name:'userManager'
							},
							{
								text : '费用类型管理',
								leaf : true,
								id : 'fee_type_Manage',
								name : 'fee_type_Manage'
							}
							]
				}]
	},
	listeners : {
		itemclick : function(view, record, item, index, e, eOpts) {
			
//			console.log('itemclick ' + view + "====" + record.get('id')
//					+ "=  leaf===" + record.get('leaf') + " has child " + item
//					+ "====" + index + "====" + e.getTarget() + "====" + eOpts);
					
			if(record.get('id')=='managerDetail'){
					if(typeof(detailPanel)=='undefined')
					{
						var dp=Ext.create('Star.view.detailPanel');
						dp.id='dp';
						dp.title='费用明细管理';
						
						Ext.getCmp('mainTablPanel').add(dp).show();
						var grid=Ext.getCmp('detailPanel');
					
						var store=grid.getStore();
						store.load();
						
					}
					
					projectwin.show();
				}
				if(record.get('id')=='projectManage'){
					if(typeof(project_win)=='undefined')
					{
						var projectwin=Ext.create('Star.view.project_win');
						
						
						
					}
					
					projectwin.show();
				}
				
				if(record.get('id')=='fee_type_Manage'){
					console.log(record.get('id'))
					
					if(typeof(fee_type_win)=='undefined')
					{
						var fee_type_win=Ext.create('Star.view.fee_type_win');
						
						
					}
					
					fee_type_win.show();
				}
			if(record.get('leaf')){
//				console.log(Ext.getCmp('tb1'));
//				console.log(Ext.getCmp('tb2'));
//				console.log(Ext.getCmp('mainTablPanel'));//获取指定组件
//				console.log('set tab2 active');
//				Ext.getCmp('mainTablPanel').setActiveTab('tb2');//判断当前active状态tab
//				console.log('set tab2 active over');
//				console.log('active:=='+Ext.getCmp('mainTablPanel').getActiveTab().id); //获取当前active组件的id
//				Ext.getCmp('mainTablPanel').add({
//				title:'newadd',
//				id:'test',
//				xtype:'detailPanel',
//				closable:true
//				}).show();
			}
		}
		

		/**
		 * click : {
		 * 
		 * fn : function() { console.log('click el'); } }
		 */
	},
	initComponent : function() {
		this.callParent(arguments);
	}

});