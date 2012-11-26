Ext.define("Star.view.bills",{
	extend:'Ext.grid.Panel',
	alias:'widget.bills',
	id:'bill_list',
	features: [groupingFeature],
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
});
