Ext.define('Star.model.workingDetail', {
    extend: 'Ext.data.Model',
    fields: [ 
    	{name:'ID',type:'int'},//ID以DB为主，新增加数据时为空，从DB取数据时为DB内ID的值
    	{name:'date',type:'date'},//日期
    	{name:'project',type:'string'}//项目名称
    	,{name:'fee_type',type:'string'},//费用类型
    	{name:'working',type:'tring'},//工作内容
    	{name:'name',type:'string'},//姓名
    	{name:'workload',type:'float'},//工作量
    	{name:'cost',type:'float'},//费用标准
    	{name:'Subsidy',type:'float'},//补贴
    	{name:'num',type:'float'},//金额不为空，当工作量不为空时时，金额为工作量*费用标+补贴，工作量为0时，金额为补贴，补贴为0时，金额以实际输入值为主
    	{name:'manual_num',type:'float'},//手工金额
    	{name:'payment',type:'string'},//支付方式不为空，默认不支付
    	{name:'payCreator',type:'string'},//经手人
    	{name:'remark',type:'string'},//备注，可以为空
    	{name:'timeflag',type:'string'},//timestamp作为入单以及往返回验证数是否正常的，传递数据以及生成表单的唯一标识
    	{name:'owner',type:'string'},//记录的创建者 
    	{name:'billno',type:'string'},//票据号，默认为空
    	{name:'is_print',type:'int'}
    	]
    	,idProperty :'ID'
  /**  	,
    	validations:[
    	{type: 'inclusion', field: 'fee_type',   list: ['BXD', 'ZP', 'LYD', 'ZZ']},
    	{type: 'inclusion', field: 'payment',   list: ['0', '1']}
    	]
    	**/
});
