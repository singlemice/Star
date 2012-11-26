/**
 * 
 */
Ext.define("Star.controller.controller", {
			extend : 'Ext.app.Controller',
			init : function() {
				this.control({});
				console.log('Controller init.....');
			},
			views : ['topPanel','menuTree','detailPanel','welcome','workArea','mainLayout','showwin','detail_form','project_form','project_win','fee_type_win','fee_type_form','billManagePanel'],
			models : ['workingDetail'],
			stores : ['detailStore','projectStore','projectStoreItem','feetypeStore','feetypeStoreItem','billStore','recordStore']
		});
