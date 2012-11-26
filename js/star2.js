

Ext.define('Star.view.ui.DetailPanel', {
    extend: 'Ext.tab.Panel',
	
    initComponent: function() {
        var me = this;
       
		
        Ext.applyIf(me,       
        
        	{
        		id:'gp',
        		flex:1,
	  regeion:'center',
            items: [
                {
                    extend: 'Ext.panel.Panel',
                    title: 'Tab 1',
                    items: [
                        {
                            xtype: 'gridpanel',
                            title: 'My Grid Panel',
                            columns: [
                                {
                                    xtype: 'gridcolumn',
                                    dataIndex: 'string',
                                    text: 'String'
                                },
                                {
                                    xtype: 'numbercolumn',
                                    dataIndex: 'number',
                                    text: 'Number'
                                },
                                {
                                    xtype: 'datecolumn',
                                    dataIndex: 'date',
                                    text: 'Date'
                                },
                                {
                                    xtype: 'booleancolumn',
                                    dataIndex: 'bool',
                                    text: 'Boolean'
                                }
                            ],
                            viewConfig: {

                            }
                        }
                    ]
                },
                {
                    xtype: 'panel',
                    title: 'Tab 2'
                },
                {
                    xtype: 'panel',
                    title: 'Tab 3'
                }
            ]
        });

        me.callParent(arguments);
    }
});


