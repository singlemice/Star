Ext.define('Star.view.welcome',{
	extend:'Ext.panel.Panel',
	alias:'widget.welcome',
	id:'welcomePanel',
	closable:false,
	alias:'widget.welcome',
	html:'Welcome',
	width:'100%',
	height:'100%',
	title:'welcome',
	frame:true,
	initComponent:function(){
		this.callParent(arguments);
	}
	
});