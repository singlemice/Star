var billno = Ext.create('Ext.data.Store', {
			model : 'Star.model.workingDetail',
			// sorters : ['billno'],
			// groupField : 'billno',

			autoLoad : true,
			proxy : {
				type : 'ajax',
				url : 'list_working.php',
				extraParams : {
					'action' : 'listbillno'
				},
				reader : {
					type : 'json',
					root : 'detailData',
					totalProperty : 'iTotalRecords'
				}
			}
		});

// Create the combo box, attached to the states data store
var cb = Ext.create('Ext.form.ComboBox', {
			fieldLabel : '表单号',
			store : billno,
			id : 'cmblist',
			queryMode : 'ajax',
			displayField : 'billno',
			valueField : 'billno',
			editable : false,
			listeners : {
				'select' : function(r) {
					bill.proxy.extraParams = {
						'action' : 'bill'
						// 'billno' : r.value
					};
					var isLoad = false;
					if (bill.getTotalCount() == undefined) {
						bill.load();
						isLoad = true;
					}

					if (!isLoad) {
						bill.clearFilter(true);
					}

					bill.filter("billno", r.value);

					// bill.load();
				}

			}
		});

// Column Model shortcut array
var columns = [{
			text : "ID",
			flex : 1,
			sortable : true,
			dataIndex : 'ID'
		}, {
			text : "日期",
			width : 70,
			sortable : true,
			dataIndex : 'date'
		}, {
			text : "项目",
			width : 70,
			sortable : true,
			dataIndex : 'project'
		}, {
			text : "费用类型",
			width : 70,
			sortable : true,
			dataIndex : 'fee_type'
		}, {
			text : "工作内容",
			width : 70,
			sortable : true,
			dataIndex : 'working'
		}, {
			text : "金额",
			width : 70,
			sortable : true,
			dataIndex : 'num'
		}, {
			text : "经手人",
			width : 70,
			sortable : true,
			dataIndex : 'payCreator'
		}, {
			text : "票据编号",
			flex : 70,
			sortable : true,
			dataIndex : 'billno'
		}

];

var rs = Ext.create('Ext.data.Store', {
			model : 'Star.model.workingDetail',
			// sorters : ['billno'],
			// groupField : 'billno',

			autoLoad : true,
			proxy : {
				type : 'ajax',
				url : 'list_working.php',
				extraParams : {
					action : 'record'
				},
				reader : {
					type : 'json',
					root : 'detailData',
					totalProperty : 'iTotalRecords'
				}
			}
		});

var bill = Ext.create('Ext.data.Store', {
			model : 'Star.model.workingDetail',
			// sorters : ['billno'],
			// groupField : 'billno',
			extraParams : {
				action : 'bill'
			},
			autoLoad : false,
			proxy : {
				type : 'ajax',
				api:{
        	read : 'list_working.php',
        	create : 'list_working.php',
        	update : 'update_billno.php',
        	destroy : 'destroy_working.php'
        },
				reader : {
					type : 'json',
					root : 'detailData',
					totalProperty : 'iTotalRecords'
				}
			}
		});

var recordGrid = Ext.create('Ext.grid.Panel', {
			multiSelect : true,
			id : 'recordGrid',
			// viewConfig: {
			// plugins: {
			// ptype: 'gridviewdragdrop',
			// dragGroup: 'recordGridDDGroup',
			// dropGroup: 'billGridDDGroup'
			// },
			// listeners: {
			// drop: function(node, data, dropRec, dropPosition) {
			// var dropOn = dropRec ? ' ' + dropPosition + ' ' +
			// dropRec.get('name') : ' on empty view';
			// // Ext.example.msg("Drag from right to left", 'Dropped ' +
			// data.records[0].get('name') + dropOn);
			// }
			// }
			// },

			dockedItems : [{
						xtype : 'toolbar',
						dock : 'top',
						items : [{
									xtype : 'button',
									text : '添加至表单',
									id : 'btn_to_right',
									handler : onButtonClick
								}, cb]
					}],
			store : rs,
			columns : columns,
			stripeRows : true,
			title : 'First Grid',
			margins : '0 2 0 0'

		});
var billGrid = Ext.create('Ext.grid.Panel', {
			multiSelect : true,
			id : 'billGrid',
			dockedItems : [{
						xtype : 'toolbar',
						dock : 'top',
						items : [{
									xtype : 'button',
									text : '打印',
									id : 'print_bill',
									handler : onButtonClick
								}, cb]
					}],
			viewConfig : {
				plugins : {
					ptype : 'gridviewdragdrop',
					dragGroup : 'billGridDDGroup',
					dropGroup : 'recordGridDDGroup'
				},
				listeners : {
					drop : function(node, data, dropRec, dropPosition) {
						var dropOn = dropRec ? ' ' + dropPosition + ' '
								+ dropRec.get('name') : ' on empty view';
						// Ext.example.msg("Drag from right to left", 'Dropped '
						// + data.records[0].get('name') + dropOn);
					},
					beforedrop : function(node, data, overModel, dropPosition,
							dropFunction, eOpts) {
						console.log(data.records.length)
						console.log(node)
					}
				}
			},
			store : bill,
			columns : columns,
			stripeRows : true,
			title : 'First Grid',
			margins : '0 2 0 0'
		});
function onButtonClick(btn, event) {

	if (btn.id == 'btn_to_right') {
		btn.disable(true);
		// if(btn.isDisabled())
		// {
		// Ext.MessageBox.alert('提示','不能重复提交');
		// Ext.EventManager.stopEvent();
		// }

		var cmb = Ext.getCmp('cmblist');
		console.log(cmb.value)
		if (cmb.value == null) {
			Ext.MessageBox.alert('提示', '表单号不能为空');
			btn.enable();
			Ext.EventManager.stopEvent();
		} else {
			var grid = btn.ownerCt.ownerCt;
			var data = grid.getSelectionModel().getSelection();
			var billStore = Ext.getCmp('billGrid').getStore();
			var curTotal=billStore.getCount();
			
			rows = data.length;
			var newTotal=curTotal+rows;
			if(newTotal>10){
				Ext.Msg.alert('警告','添加后记录后，票据明细超过10条，请重新添加！')
				btn.enable();
			}
			else
			{
				var store = grid.getStore();
			for (var i = 0; i < rows; i++) {
				store.removeAt(data[i].index);
				billStore.insert(0, data[i]);
				// if()
			}
			
			}
//			store.filter([{
//						property : "ID",
//						value : 100
//					}]);

			// console.log(grid.getView().getRecords())
			// store.load();
			console.log(store.getCount())
			btn.enable();

		}

	} else if (btn.getId() == 'print_bill') {
		console.log(btn.getId())
	}
}
Ext.define('Star.view.billManagePanel', {
			extend : 'Ext.panel.Panel',
			alias : 'widget.billManagePanel',
			width : '100%',
			height : '100%',
			title : '票据管理',
			frame : true,
			layout : {
				type : 'hbox',
				align : 'stretch',
				padding : 5
			},
			defaults : {
				flex : 1
			},
			items : [recordGrid, billGrid]
		});