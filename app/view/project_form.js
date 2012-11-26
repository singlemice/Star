Ext.define('Star.view.project_form', {
	extend : 'Ext.form.Panel',
	alias : 'widget.project_form',
	id : 'project_form',
	layout : 'border',
	frame : true,
	width : '100%',
	height : '100%',
	// minHight:300,
	// minHeight:300,
	defaults : {
		frame : false,
		height : 298
	},
	
	tbar : [{
				xtype : 'textfield',
				fieldLabel : '项目名称',
				id : 'project_name',
				name : 'project_name',
				allowBlank : false,
				labelAlign : 'right',
				labelWidth : 50,
				width : 200

			}, {
				xtype : 'textfield',
				fieldLabel : '备注',
				id : 'remark',
				name : 'remark',
				allowBlank : true,
				labelAlign : 'right',
				labelWidth : 30,
				flex : 1

			}, {
				xtype : 'button',
				text : '保存',
				id : 'saveproject',
				cls : 'x-btn-text-icon',
				icon : '../../extjs/resources/themes/images/default/dd/drop-add.gif',
				handler : function(button, e) {
					console.log(button)
					var form = button.ownerCt.ownerCt.getForm();
					var project_name = form.findField('project_name')
							.getValue();
					var remark = form.findField('remark').getValue();
					// console.log(form)
					// var pro=form.getValues(false,false,false);
					if (project_name == '') {
						Ext.Msg.alert('警告：', '项目名称不可为空！');

					} else {
						Ext.Ajax.request({
									url : 'process_project.php',
									params : {
										project_name : project_name,
										remark : remark,
										action : 'add'
									},
									method : 'POST',
									timeout : 2000,
									success : function() {
										var store = Ext.getCmp('project_grid').store;
										store.removeAt(store.getCount() - 1);
										store.load();
										console.log("success........")
										form.findField('project_name').setValue();
										 form.findField('remark').setValue();
									}
								});
					}

				}

			}, {
				xtype : 'button',
				text : '删除',
				id : 'delproject',
				cls : 'x-btn-text-icon',
				icon : '../../extjs/resources/themes/images/default/dd/drop-no.gif',
				handler : function(button, e) {
					var form = button.ownerCt.ownerCt.getForm();
					var grid=Ext.getCmp('project_grid');
					console.log(grid)
					var data = grid.getSelectionModel().getSelection();
					

					if (data.length == 0) {
			Ext.Msg.alert('提示', '至少选择一条数据');
		} else {
			var st = grid.getStore();
			var ids = [];
			Ext.Array.each(data, function(record) {
					
						ids.push(record.get('ID'));
				
					});
			Ext.Ajax.request({
						url : 'process_project.php',
						params : {
							ids : ids.join(","),
							action : 'delete'
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

			}],
	items : [{
				xtype : 'grid',
				id : 'project_grid',

					store : 'projectStore',
				name:'project_grid',
				region : 'center',
				selType : 'checkboxmodel',
	multiSelect : true,
				plugins : [Ext.create('Ext.grid.plugin.CellEditing', {
							clicksToEdit : 2
						})],
				columns : [{
							header : '序号',
							dataIndex : 'ID',
							width : 40
						}, {
							header : '项目名称',
							dataIndex : 'project',
							width : 100
						}, {
							header : '备注',
							dataIndex : 'remark',
							flex : 1
						}]

			}]
})