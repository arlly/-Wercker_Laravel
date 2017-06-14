/***********************************
 * サイト内共通JS
 ***********************************/

/**
 * オンロードアクション
 */
$(document).ready(function()
{
	// ゆうちょ
	if ( $('#account_type_1').is(':checked') ) {
		$('#yucho_area').css('display', 'block');
		$('#bank_area').css('display', 'none');
	}
	// 金融機関
	if ( $('#account_type_2').is(':checked') ) {
		$('#yucho_area').css('display', 'none');
		$('#bank_area').css('display', 'block');
	}
});


/**
 * 振込先ラジオボタンによって表示切り分け
 */
(function($){
	// ゆうちょ
	$('#account_type_1').change(function() {
		if ( $(this).is(':checked') ) {
			$('#yucho_area').css('display', 'block');
			$('#bank_area').css('display', 'none');
		}
	});
	// 金融機関
	$('#account_type_2').change(function() {
		if ( $(this).is(':checked') ) {
			$('#yucho_area').css('display', 'none');
			$('#bank_area').css('display', 'block');
		}
	});
})(jQuery);


/**
 * Eメール重複チェックAjaxエリア表示文言カラー
 */
function success()
{
	// status
	$('#email_response').removeClass('has-warning');
	$('#email_response').removeClass('has-error');
	$('#email_response').addClass('has-success');

	// icon
	$('#email-inputicon').removeClass('glyphicon-remove');
	$('#email-inputicon').removeClass('glyphicon-warning-sign');
	$('#email-inputicon').addClass('glyphicon-ok');
}

function warning()
{
	// status
	$('#email_response').removeClass('has-success');
	$('#email_response').removeClass('has-error');
	$('#email_response').addClass('has-warning');
	
	// icon
	$('#email-inputicon').removeClass('glyphicon-remove');
	$('#email-inputicon').removeClass('glyphicon-ok');
	$('#email-inputicon').addClass('glyphicon-warning-sign');
}

function error()
{
	// status
	$('#email_response').removeClass('has-success');
	$('#email_response').removeClass('has-warning');
	$('#email_response').addClass('has-error');
	
	// icon
	$('#email-inputicon').removeClass('glyphicon-ok');
	$('#email-inputicon').removeClass('glyphicon-warning-sign');
	$('#email-inputicon').addClass('glyphicon-remove');
}

function remove()
{
	// status
	$('#email_response').removeClass('has-success');
	$('#email_response').removeClass('has-warning');
	$('#email_response').removeClass('has-error');
	
	// icon
	$('#email-inputicon').removeClass('glyphicon-ok');
	$('#email-inputicon').removeClass('glyphicon-warning-sign');
	$('#email-inputicon').removeClass('glyphicon-remove');
}
