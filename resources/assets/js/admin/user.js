(function($){
	/**
	 * jQuery datepicker
	 */
	// 入金日
	$('#payment_date').datepicker({
		dateFormat: 'yy-mm-dd',//年月日の並びを変更
	});
	// 有効期限
	$('#expire_date').datepicker({
		dateFormat: 'yy-mm-dd',//年月日の並びを変更
	});
	
	// 検索パラメータ
	// ユーザ一覧 入金日 検索開始日
	$('#search_payment_start_date').datepicker({
		dateFormat: 'yy-mm-dd',//年月日の並びを変更
	});
	// ユーザ一覧 入金日 検索終了日
	$('#search_payment_end_date').datepicker({
		dateFormat: 'yy-mm-dd',//年月日の並びを変更
	});
	
	// ユーザ一覧 有効期限 検索開始日
	$('#search_expire_start_date').datepicker({
		dateFormat: 'yy-mm-dd',//年月日の並びを変更
	});
	// ユーザ一覧 有効期限 検索終了日
	$('#search_expire_end_date').datepicker({
		dateFormat: 'yy-mm-dd',//年月日の並びを変更
	});
})(jQuery);