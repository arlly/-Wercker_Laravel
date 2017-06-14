<section class="section">
	<!-- 画像確認用モーダル -->
	<div class="modal fade" id="chkImageModal" tabindex="-1" role="dialog">
		<div class="modal-dialog modal-lg">
			<div class="modal-content">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal">
						<span aria-hidden="true">&#215;</span>
					</button>
					<div id="modal-header"></div>
				</div><!-- /modal-header -->
				<div class="modal-body">
					<div id="modal-body"></div>
				</div><!-- /modal-body -->
				<div class="modal-footer">
					<button type="button" class="btn btn-default" data-dismiss="modal">閉じる</button>
				</div><!-- /modal-footer -->
			</div><!-- /.modal-content -->
		</div><!-- /.modal-dialog -->
	</div> <!-- /.modal -->
	
	<!-- 保存前ﾀﾞｲｱﾛｸﾞ -->
	<div class="modal fade" id="saveModal" tabindex="-1" role="dialog">
		<div class="modal-dialog modal-sm">
			<div class="modal-content">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal">
						<span aria-hidden="true">&#215;</span><span class="sr-only">閉じる</span>
					</button>
					<h4 class="modal-title"><span class="glyphicon glyphicon-info-sign"></span>&nbsp;確認</h4>
				</div><!-- /modal-header -->
				<div class="modal-body" id="saveModal-body">
					保存しますか？
				</div><!-- /modal-body -->
				<div class="modal-footer">
					<button type="button" class="btn btn-default" data-dismiss="modal">閉じる</button>
					<button type="button" class="save-ok btn btn-primary">保存</button>
				</div><!-- /modal-footer -->
			</div><!-- /.modal-content -->
		</div><!-- /.modal-dialog -->
	</div><!-- /modal -->

	<!-- 送信前ﾀﾞｲｱﾛｸﾞ -->
	<div class="modal fade" id="submitModal" tabindex="-1" role="dialog">
		<div class="modal-dialog modal-sm">
			<div class="modal-content">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal">
						<span aria-hidden="true">&#215;</span><span class="sr-only">閉じる</span>
					</button>
					<h4 class="modal-title"><span class="glyphicon glyphicon-info-sign"></span>&nbsp;確認</h4>
				</div><!-- /modal-header -->
				<div class="modal-body" id="submitModal-body">
					送信しますか？
				</div><!-- /modal-body -->
				<div class="modal-footer">
					<button type="button" class="btn btn-default" data-dismiss="modal">閉じる</button>
					<button type="button" class="submit-ok btn btn-primary">送信</button>
				</div><!-- /modal-footer -->
			</div><!-- /.modal-content -->
		</div><!-- /.modal-dialog -->
	</div><!-- /modal -->

	<!-- データ更新前最終確認ﾀﾞｲｱﾛｸﾞ -->
	<div class="modal fade" id="finalConfirmModal" tabindex="-1" role="dialog">
		<div class="modal-dialog">
			<div class="modal-content">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal">
						<span aria-hidden="true">&#215;</span><span class="sr-only">閉じる</span>
					</button>
					<h4 class="modal-title"><span class="glyphicon glyphicon-alert"></span>&nbsp;最終確認</h4>
				</div><!-- /modal-header -->
				<div class="modal-body" id="finalConfirmModal-body">
					更新しますか？
				</div><!-- /modal-body -->
				<div class="modal-footer">
					<button type="button" class="btn btn-default" data-dismiss="modal">閉じる</button>
					<button type="button" class="final-confirm-ok btn btn-primary">強行する</button>
				</div><!-- /modal-footer -->
			</div><!-- /.modal-content -->
		</div><!-- /.modal-dialog -->
	</div><!-- /modal -->

	<!-- 券種確認ﾀﾞｲｱﾛｸﾞ -->
	<div class="modal fade" id="checkBillsModal" tabindex="-1" role="dialog">
		<div class="modal-dialog modal-lg">
			<div class="modal-content">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal">
						<span aria-hidden="true">&#215;</span><span class="sr-only">閉じる</span>
					</button>
					<h4 class="modal-title"><span class="glyphicon glyphicon-alert"></span>&nbsp;券種確認</h4>
				</div><!-- /modal-header -->
				<div class="modal-body" id="checkBillsModal-body">
					
				</div><!-- /modal-body -->
				<div class="modal-footer">
					<button type="button" class="btn btn-default" data-dismiss="modal">閉じる</button>
				</div><!-- /modal-footer -->
			</div><!-- /.modal-content -->
		</div><!-- /.modal-dialog -->
	</div><!-- /modal -->
</section>