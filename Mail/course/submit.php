<?php
/**
 * [PUBLISH] メールフォーム送信完了ページ
 *
 * PHP versions 5
 *
 * baserCMS :  Based Website Development Project <http://basercms.net>
 * Copyright 2008 - 2015, baserCMS Users Community <http://sites.google.com/site/baserusers/>
 *
 * @copyright		Copyright 2008 - 2015, baserCMS Users Community
 * @link			http://basercms.net baserCMS Project
 * @package			Mail.View
 * @since			baserCMS v 0.1.0
 * @license			http://basercms.net/license/index.html
 */
$this->BcBaser->css('Mail.style', array('inline' => true));
if (Configure::read('debug') == 0 && $mailContent['MailContent']['redirect_url']) {
	$this->Html->meta(array('http-equiv' => 'Refresh'), null, array('content' => '5;url=' . $mailContent['MailContent']['redirect_url'], 'inline' => false));
}
?>

<h2 class="title-center-line"><span>講座申込受付完了</span></h2>

<div class="section">
	<p>講座申込いただきありがとうございました。<br />
		申込内容を確認次第、ご連絡させて頂きます。</p>
<?php if (Configure::read('debug') == 0 && $mailContent['MailContent']['redirect_url']): ?>
	<p>※５秒後にトップページへ自動的に移動します。</p>
	<p><a href="<?php echo $mailContent['MailContent']['redirect_url']; ?>">移動しない場合はコチラをクリックしてください。≫</a></p>
<?php endif; ?>
</div>
