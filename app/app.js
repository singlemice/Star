/**
 * 
 */
 Ext.QuickTips.init();
 
Ext.Loader.setConfig({
	enabled:true
}
);
Ext.application({
			name : 'Star',
			appFolder : 'app',			
			controllers:['controller'],
			launch : function() {
				console.log('application running...' + this.appFolder + '    '
						+ this.name);
				console.log('Start create viewport ...' );
			Ext.create('Ext.container.Viewport', {
    		layout: 'auto',
    		width:'100%',
    		id:'mainView',
    		items:[{
    			xtype:'mainLayout',
    			width:'100%',
    			height:'100%'
    		}
    		]
    		});
					
			},
			controllers:[
		        'controller'     
		     ]

		});
