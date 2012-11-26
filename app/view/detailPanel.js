/**
 * 
 */
Ext.regModel('combox2', {
			fields : [{
						type : 'string',
						name : 'id'
					}, {
						type : 'string',
						name : 'state'
					}

			]
		});
var states2 = [{
			'id' : 'BXD',
			name : '报销单'
		}, {
			'id' : 'ZP',
			name : '支票'
		}, {
			'id' : 'LYD',
			name : '另用单'
		}, {
			'id' : 'ZZ',
			name : '转账'
		}];

var payStates2 = [{
			'id' : '0',
			name : '未支付'
		}, {
			'id' : '1',
			name : '已支付'
		}];
// The data store holding the states
var store2 = Ext.create('Ext.data.Store', {
			model : 'combox2',
			data : states2
		});
//var groupingFeature = Ext.create('Ext.grid.feature.Grouping',{
//groupHeaderTpl: 'NO. {name} ({rows.length} Item{[values.rows.length > 1 ? "s" : ""]})'
//    });
Ext.define('Star.view.detailPanel', {
	extend : 'Ext.grid.Panel',
	id : 'detailPanel',
	closable : true,
	alias : 'widget.detailPanel',
//	features: [groupingFeature],
	width : '100%',
	height : '100%',
	title : 'grid panel',
	frame : true,
	selType : 'checkboxmodel',
	multiSelect : true,
	plugins : [Ext.create('Ext.grid.plugin.CellEditing', {
				clicksToEdit : 2
			})],
	store : 'detailStore',
	// dockedItems : [{
	//		
	// xtype: 'pagingtoolbar',
	// store: 'detailStore', // same store GridPanel is using
	// dock: 'bottom',
	// displayInfo: true
	// }],
	
	dockedItems : [{
		xtype : 'toolbar',
		dock : 'top',
		items : [{
			xtype : 'button',
			id : 'add_detail',
			cls : 'x-btn-text-icon',
			icon : '../../extjs/resources/themes/images/default/dd/drop-add.gif',
			text : '添加费用明细',
			handler : onButtonClick
		}, {
			xtype : 'button',
			id : 'btn_save',
			text : '保存修改',
			cls : 'x-btn-text-icon',
			handler : onButtonClick
		},{
			xtype : 'button',
			id : 'btn_makebill',
			text : '生成表单',
			cls : 'x-btn-text-icon',
			handler : onButtonClick
		}, {
			xtype : 'button',
			id : 'btn_lookfor',
			text : '查询',
			cls : 'x-btn-text-icon',
			handler : onButtonClick
		},
		{
			xtype : 'button',
			id : 'btn_makeinvalid',
			text : '作废',
			cls : 'x-btn-text-icon',
			handler : onButtonClick
		}
		, {

			xtype : 'pagingtoolbar',
			id : 'pagebar',
			store : 'detailStore', // same store GridPanel is using
			// dock: 'bottom',
			flex : 1,
			displayInfo : true

		}]
	}],
	columns : [{
				header : '序号',
				dataIndex : 'ID',
				width : 40
			}, {
				header : '日期',
				dataIndex : 'date',
				width : 100,
				renderer : Ext.util.Format.dateRenderer('Y-m-d'),
				editor : 'datefield'
			}, {
				header : '项目',
				dataIndex : 'project',
				width : 120,
				editor : {
					xtype : 'combobox',
					displayField : 'project',
					store : 'projectStoreItem',
					queryMode : 'ajax',
					editable : false
				}
			},
			{
				header : '费用类型',
				dataIndex : 'fee_type',
				width : 60,
				editor : {
					xtype : 'combobox',
					displayField : 'name',
					store : 'feetypeStoreItem',
					queryMode : 'ajax',
					editable : false
				}
			}
			, {
				header : '工作内容',
				dataIndex : 'working',
				flex : 1,
				editor : 'textfield'
			}, {
				header : '姓名',
				dataIndex : 'name',
				width : 60

			}, {
				header : '工作量',
				dataIndex : 'workload',
				width : 60,
				editor : 'textfield'
			}, {
				header : '费用标准',
				dataIndex : 'cost',
				width : 60,
				editor : 'textfield'
			}, {
				header : '补贴',
				dataIndex : 'Subsidy',
				width : 60,
				editor : 'textfield'
			}, {
				header : '手工金额',
				dataIndex : 'manual_num',
				width : 60,
				editor : 'textfield'
			},
				{
				header : '金额',
				dataIndex : 'num',
				width : 60,
				editor : 'textfield'
			}, {
				header : '结账方式',
				dataIndex : 'payment',
				width : 80,
				editor : {
					xtype : 'combobox',
					displayField : 'name',
					store : store2,
					queryMode : 'local',
					editable : false
				}
			}, {
				header : '经手人',
				dataIndex : 'payCreator',
				width : 50,
				editor : 'textfield'
		}	, {
				header : '备注',
				dataIndex : 'remark',
				width : 120,
				editor : 'textfield'
			}, {
				header : 'owner',
				dataIndex : 'owner',
				hidden : true

			}, {
				header : 'timeflag',
				dataIndex : 'timeflag',
				width : 60,
				hidden : true
			}, {
				header : '票据号',
				dataIndex : 'billno',
				width : 120
			}, {
				header : '打印',
				dataIndex : 'is_print',
				width : 60,
				hidden : true
			}],
	initComponent : function() {
		this.callParent(arguments);
	}
});

function onButtonClick(btn, event) {

	if (btn.id == 'add_detail') {
		if (typeof(detail_win) == 'undefined') {
			var detail_win = Ext.create('Star.view.showwin');
		}
		detail_win.show();

		console.log(detail_win.isVisible())

	}
	if (btn.id == 'btn_save') {
	
		var grid = btn.ownerCt.ownerCt;
		var st=grid.getStore();
		var records=st.getUpdatedRecords() ;
		st.sync();
		Ext.Array.each(records,function(model){
		model.set('num',parseFloat(model.get('workload'))*parseFloat(model.get('cost'))+parseFloat(model.get('Subsidy'))+parseFloat(model.get('manual_num')));
		//console.log(parseFloat(model.get('workload')))
		model.commit();
		});
		console.log(records)
	}
	if (btn.id == 'btn_makebill') {
		var grid = btn.ownerCt.ownerCt;
		// console.log('start.........')
		// console.log(grid)

		// grid.getView().refresh();
		var data = grid.getSelectionModel().getSelection();

		if (data.length == 0) {
			Ext.Msg.alert('提示', '至少选择一条数据');
		} else {
			var st = grid.getStore();
			var ids = [];
			var userid = Ext.getBody().getById('drealname').dom.innerText;
			Ext.Array.each(data, function(record) {
					if(record.get('is_print') == 0 && record.get('billno')=='' ){
						ids.push(record.get('ID'));
					}
					else{
						Ext.Msg.alert('warn','is_print');
					}
//
//						添加判断，对已经打印的表单，不做更改表单号
//						
//						
//						
					});
			Ext.Ajax.request({
						url : 'process_working.php',
						params : {
							ids : ids.join(","),
							action : 'gen_form',
							id : userid
						},
						method : 'POST',
						timeout : 2000,
						success : function() {
							
							console.log("success........")
						}
					});
			var store = grid.getStore();
							//store.removeAll();
							store.removeAt(store.getCount() - 1);
							store.load();		

		}
	}
	if (btn.id == 'detail_from_exit') {
		btn.ownerCt.ownerCt.ownerCt.destroy();

	}
	if(btn.id=='btn_makeinvalid'){
		
		
		var grid = btn.ownerCt.ownerCt;
		// console.log('start.........')
		// console.log(grid)

		// grid.getView().refresh();
		var data = grid.getSelectionModel().getSelection();
var userid = Ext.getBody().getById('drealname').dom.innerText;
		if (data.length == 0) {
			Ext.Msg.alert('提示', '至少选择一条数据');
		} else {
			var st = grid.getStore();
			var ids = [];
			var userid = Ext.getBody().getById('drealname').dom.innerText;
			Ext.Array.each(data, function(record) {

						ids.push(record.get('ID'));
//
//						添加判断，对已经打印的表单，不做更改表单号
//						
//						
//						
					});
			Ext.Ajax.request({
						url : 'process_working.php',
						params : {
							ids : ids.join(","),
							action : 'makeinvalid',
							id : userid
						},
						method : 'POST',
						timeout : 2000,
						success : function() {
							
							console.log("success........")
						}
					});
			var store = grid.getStore();
							//store.removeAll();
							store.removeAt(store.getCount() - 1);
							store.load();		

		}
		
		
	}
	if (btn.id == 'save_detail') {
		btn.up('form').getForm().findField('timeflag').setValue((new Date())
				.valueOf());
		btn.up('form').getForm().findField('username').setValue(Ext.getBody()
				.getById('dusername').dom.innerText);
		btn.up('form').getForm().findField('owner').setValue(Ext.getBody()
				.getById('drealname').dom.innerText);

		btn.up('form').submit({

					url : 'process_working.php',
					method : 'POST',
					success : function() {
						var store = Ext.getCmp('detailPanel').store;
						store.removeAt(store.getCount() - 1);
						store.load();
						Ext.Msg.alert('ok', '添加成功!');
						btn.up('form').getForm().findField('project').reset();
						btn.up('form').getForm().findField('working').reset();
						btn.up('form').getForm().findField('fee_type').reset();
						btn.up('form').getForm().findField('date').reset();
						btn.up('form').getForm().findField('name').reset();
						btn.up('form').getForm().findField('Workload').reset();
						btn.up('form').getForm().findField('cost').reset();
						btn.up('form').getForm().findField('Subsidy').reset();
						btn.up('form').getForm().findField('manual_num').reset();
						btn.up('form').getForm().findField('payment').reset();
						btn.up('form').getForm().findField('payCreator')
								.reset();
						btn.up('form').getForm().findField('remark').reset();

					},
					error : function() {
						console.log(error)
					}

				});
	}

}
/**
 * Ext.define('Star.view.detailPanel',{ extend:'Ext.grid.Panel',
 * alias:'widget.detailPanel', // store:'detailStore', width:400, height:600,
 * title:'gridtable', border:0, selModel:{ selType:'checkboxmodel' },
 * multiSelect:true, frame:true, enableKeyNav:true, columnLines:true, columns:[
 * {text:'ID',dataIndex:'id',width:100},
 * {text:'user',dataIndex:'user',width:100} ], initComponent:function(){
 * this.callParent(arguments); } });
 */
