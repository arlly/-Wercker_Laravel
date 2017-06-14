	/**
 * jQuery datepicker
 */
(function($){
	// カレンダー管理
	$('#input-holiday').datepicker({
		dateFormat: 'yy-mm-dd',//年月日の並びを変更
	});
})(jQuery);

// E-Mail Duplication Check on Ajax
(function($){
	$("#email").keyup(function(){
		chkDuplicateEmail('#email', '#email_judge', 'POST', 'JSON', '/ajax/chkDuplicateEmail');
	});
})(jQuery);



// E-Mail Duplication Check on Ajax
(function($){
	$("#email").focusout(function(){
		chkDuplicateEmail('#email', '#email_judge', 'POST', 'JSON', '/ajax/chkDuplicateEmail');
	});
})(jQuery);

/**
 * E-Mail Duplication Check on Ajax
 * フォーム入力値を取得して、E-Mail重複チェックを行うAjaxを実行
 *
 * @param string target 文字数取得要素名(ID)
 * @param string field 結果出力場所の要素名(ID)
 * @param string method メソッド
 * @param string type データタイプ
 * @param string url Ajax送信先
 * @return void
 * @author Kuniyasu Wada
 */
function chkDuplicateEmail(target, field, method, type, url)
{
	// フォーム内容取得
	var email = $(target).val();
	
	// 入力された値があるならマッチ開始
	if(email != "")
	{
		// 形式チェックを通ればAjax通信
		if(email.match(/^[A-Za-z0-9.]+[\w-]+@[\w\.-]+\.\w{2,}$/))
		{
			$(field).text('');
			var token = document.getElementsByName('_token')[0].value;
			
			$.ajax({
				type: method,
				url:  url,
				dataType: type,
				data: {email: email, _token: token},//json形式
				
				// 成功時のコールバック
				success: function (cnt)
				{
					if(cnt == 0){
						success();
						$(field).text('○ 登録可能です。');
						$(field).css('color','#62c5dd');
					} else {
						error();
						$(field).text('× 既に登録されています。');
						$(field).css('color','#feb258');
					}
				},
				error: function( data ) {
						console.log('通信エラー');
				}//,
				//complete: function( data ) {
				//	alert("complete!");
				//}
			});
		} else {
			warning();
			$(field).text('× E-Mail形式外');
			$(field).css('color','#feb258');
		}
	} else {
		remove();
		$(field).text('入力してください');
		$(field).css('color','#feb258');
	}
}

function checkBillsModal(data, bills, total)
{
	var modalBody = document.getElementById('checkBillsModal-body');
	var html = '<table class="table table-bordered table-hover table-striped table-condensed"><colgroup><col width="15%"><col width="20%"><col width="15%"><col width="15%"><col width="15%"><col width="20%"></colgroup>';

	for(let i of data )
	{
		html += '<tr>';
		html += '<th class="text-center info" colspan="1">' + '紙幣名称' + '</th>';
		html += '<td class="text-center" colspan="1">' + bills[i['bill_id']]['name'] + '</td>';
		html += '<th class="text-center success" colspan="1">' + '数量' +'</th>';
		html += '<td class="text-center" colspan="1">' + i['amount'] +'</td>';
		html += '<th class="text-center success" colspan="1">' + '金額' +'</th>';
		html += '<td class="text-center" colspan="1">' + i['amount'] * bills[i['bill_id']]['value'] +'</td>';
		html += '</tr>';
	}
	html += '<tr><th class="text-center warning" colspan="1">' + '合計金額' +'</th>';
	html += '<td class="text-center" colspan="5">' + total +'</td></tr>';
	html += '</table>';
	modalBody.innerHTML = html;
	
	$('#checkBillsModal').modal();
}

/**
 * 要素を無効化し、disabledクラスを付加する
 * 
 * @param element
 */
function disableElements(submit)
{
	$(submit).addClass('disabled');
	$(submit).prop('disabled', true);
}

/**
 * 要素の無効化を解除し、disabledクラスを除去する
 * 
 * @param element
 */
function enableElements(submit)
{
	$(submit).removeClass('disabled');
	$(submit).prop('disabled', false);
}

/*
$(document).ready(function() {

	// 画像のみ右クリック禁止
	$('img').on('contextmenu',function(e){
		return false;
	});
	
	// 画像のみドラッグ&ドロップ禁止 (2つで1セット)
	$('img').mousedown(function(e){
		e.preventDefault();
	});
	
	// 画像のみドラッグ&ドロップ禁止 (2つで1セット)
	$('img').mouseup(function(e){
		e.preventDefault();
	});
});
*/

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