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
