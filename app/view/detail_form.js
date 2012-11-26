
var moneyTest=/^[+-]?[0-9]+\.[0-9]{2}$/;
Ext.apply(Ext.form.field.VTypes, {
    //  vtype validation function
    money: function(val, field) {
        return moneyTest.test(val);
    },
    // vtype Text property: The error text to display when the validation function returns false
    moneyText: '格式不对， 示例 "123.12".'//,
    // vtype Mask property: The keystroke filter mask
    //moneyMask: /^[+-]?[0-9]+\.[0-9]{2}$/
});

// Define the model for a State
Ext.regModel('combox', {
			fields : [{
						type : 'string',
						name : 'id'
					}, {
						type : 'string',
						name : 'state'
					}

			]
		});
var states = [{
			'id' : 'JKF',
			name : '监考费'
		}, {
			'id' : 'KC',
			name : '课酬'
		}, {
			'id' : 'LWF',
			name : '劳务费'
		}];

var payStates = [{
			'id' : '0',
			name : '未支付'
		}, {
			'id' : '1',
			name : '已支付'
		}];
var payment = [{
			'id' : '0',
			name : '现金'
		},
		 {
			'id' : '3',
			name : '支票'
		},
			{
			'id' : '1',
			name : '银行转帐'
		},
		{
			'id' : '2',
			name : '另用单'
		},{
			'id' : '4',
			name : '用工结算单'
		}
		];
// The data store holding the states
var store = Ext.create('Ext.data.Store', {
			model : 'combox',
			data : states
		});
var payStateStore = Ext.create('Ext.data.Store', {
			model : 'combox',
			data : payStates
		});
		var paymentStore = Ext.create('Ext.data.Store', {
			model : 'combox',
			data : payment
		});

Ext.define('Star.view.detail_form', {
	extend : 'Ext.form.Panel',
	alias : 'widget.detail_form',
	id:'detail_form',
	layout : {
		type : 'vbox',
		align : 'stretch'
	},
	frame : true,
	border : false,
	bodyPadding : 10,
	bbar : [{
				xtype : 'button',
				id : 'save_detail',
				cls : 'x-btn-text-icon',
				icon : '../../extjs/resources/themes/images/default/dd/drop-add.gif',
				text : '保存',
				handler:onButtonClick
		/**		function(){
					console.log(this.up('form').getForm())
					var basic=this.up('form').getForm();
					basic.submit()
				}**/
			}, {
				xtype : 'button',
				id : 'save_more_detail',
				cls : 'x-btn-text-icon',
				icon : '../../extjs/resources/themes/images/default/dd/drop-add.gif',
				text : '保存并继续添加',
				//handler : onButtonClick
				handler:function(){
					console('this up form'+this.up('form'))
					//var basic=this.up('form').getForm();
				}
			}, {
				xtype : 'button',
				id : 'detail_from_exit',
				cls : 'x-btn-text-icon',
				icon : '../../extjs/resources/themes/images/default/dd/drop-add.gif',
				text : '退出',
				handler : onButtonClick
			},{
			xtype: 'label',
			width:200,
			id:'lbtip',
			margins:'0 0 0 100',			
			renderer:function(value){
				return Ext.String.format('<span style="color:#F00">{0}</span>',value);
			}
			}],
	fieldDefaults : {
		msgTarget : 'side',
		labelStyle : 'font-weight:bold'
	},
	defaults : {
		margins : '0 0 10 0'
	},
	items : [{
				xtype : 'fieldcontainer',
				layout : 'hbox',
				items : [{
							xtype : 'datefield',
							fieldLabel : '日期',
							id : 'date',
							name : 'date',
							editable:false,
							allowBlank : false,
							flex : 1,
							allowBlank : false,
							maxValue : new Date(),
							labelWidth : 30,
							padding : '0 0 0 0'
						}, {
							xtype : 'combobox',
							fieldLabel : '项目',
							id : 'project',
							name : 'project',
							allowBlank : false,
							displayField:'project',
							store:'projectStore',
							width : 150,
							labelWidth : 30,
							padding : '0 0 0 0'
						}, {
							xtype : 'combobox',
							fieldLabel : '费用类型',
							editable:false,
							id : 'fee_type',
							name : 'fee_type',
							width : 150,
							labelWidth : 60,
							allowBlank : false,
							padding : '0 0 0 0',
							displayField : 'name',
							store : store,
							queryMode : 'local',
							typeAhead : true
						}]
			}, {
				xtype : 'fieldcontainer',
				layout : 'hbox',
				items : [{
							xtype : 'textfield',
							fieldLabel : '工作内容',
							id : 'working',
							name : 'working',
							width : 310,
							labelWidth : 60,
							allowBlank : false,
							padding : '0 0 0 0'
						}, {
							xtype : 'textfield',
							fieldLabel : '姓名',
							id : 'name',
							name : 'name',
							flex:1,
							labelWidth : 30,
							allowBlank : false,
							padding : '0 0 0 0'
						}]
			},  {
				xtype : 'fieldcontainer',
				layout : 'hbox',
				items : [{
							xtype : 'textfield',
							fieldLabel : '工作量',
							id : 'Workload',
							name : 'Workload',
							width : 150,
							value:'0',
							labelWidth : 50,
							allowBlank : false,
							padding : '0 0 0 0'
						}, {
							xtype : 'textfield',
							fieldLabel : '费用标准',
							id : 'cost',
							name : 'cost',
							flex : 1,
							value:'0',
							labelWidth : 60,
							allowBlank : false,
							padding : '0 0 0 0'
						}, {
							xtype : 'textfield',
							fieldLabel : '补贴',
							id : 'Subsidy',
							name : 'Subsidy',
							value:'0.00',
							width : 150,
							labelWidth : 30,
							allowBlank : false,
							padding : '0 0 0 0',
							vtype:'money'
						}]
			}, {
				xtype : 'fieldcontainer',
				layout : 'hbox',
				items : [ {
							xtype : 'textfield',
							fieldLabel : '手工金额',
							id : 'manual_num',
							name : 'manual_num',
							width : 145,
							value:'0.00',
							labelWidth : 60,
							allowBlank : false,
							padding : '0 0 0 0'
						}, {
							xtype : 'combobox',
							fieldLabel : '结账方式',
							id : 'payment',
							name : 'payment',
							editable:false,
							flex : 1,
							labelWidth : 60,
							allowBlank : false,
							padding : '0 0 0 0',
							displayField : 'name',
							store : paymentStore,
							queryMode : 'local',
							typeAhead : true
						}, {
							xtype : 'textfield',
							fieldLabel : '经手人',
							id : 'payCreator',
							name : 'payCreator',
							width : 120,
							labelWidth : 40,
							allowBlank : false,
							padding : '0 0 0 0'
						}]

			}, {
				xtype : 'fieldcontainer',
				layout : 'hbox',
				id:'remark_bar',
				items : [{
							xtype : 'textfield',
							fieldLabel : '备注',
							id : 'remark',
							name : 'remark',
							flex : 1,
							labelWidth : 30,
							allowBlank : true,
							padding : '0 0 0 0'
						},
						{
						xtype:'textfield',
						id:'timeflag',
						name:'timeflag',
						hidden:true
						},
						{
						xtype:'textfield',
						id:'owner',
						name:'owner',
						hidden:true
						}
						,{
						xtype:'textfield',
						id:'username',
						name:'username',
						hidden:true
						
						},
						{
						xtype:'textfield',
						id:'action',
						name:'action',
						hidden:true,
						value:'addworking'
						
						}
						
						
						]

			}]
}

);
