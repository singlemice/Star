Ext.define('Star.view.workArea',{
	extend:'Ext.tab.Panel',
	alias:'widget.workArea',
	title:'工作区',
	region:'center',
	items:[{
	title:'tab1',
	html:'this is tab1'
	},
	{
	title:'tab2',
	xtype: 'bills',
	title:'明细'
	}]
	
});