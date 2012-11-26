var datas=[
                {name: 'Ed',    email: 'ed@sencha.com'},
                {name: 'Tommy', email: 'tommy@sencha.com'}
            ];




Ext.define('Star.view.ui.DetailPanel', {
    extend: 'Ext.tab.Panel',

    flex:1,
	regeion:'center',
    initComponent: function() {
        var me = this;

        Ext.applyIf(me, {
            items: [
                {
                    xtype: 'panel',
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












