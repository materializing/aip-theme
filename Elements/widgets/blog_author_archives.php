<?php
/**
 * [PUBLISH] ブログ投稿者一覧
 *
 * baserCMS :  Based Website Development Project <http://basercms.net>
 * Copyright 2008 - 2014, baserCMS Users Community <http://sites.google.com/site/baserusers/>
 *
 * @copyright		Copyright 2008 - 2014, baserCMS Users Community
 * @link			http://basercms.net baserCMS Project
 * @package			Blog.View
 * @since			baserCMS v 0.1.0
 * @license			http://basercms.net/license/index.html
 */
if (empty($view_count)) {
	$view_count = '0';
}
if (isset($blog_content_id) ) {
  $id = $blog_content_id;
} else {
  $id = $blogContent['BlogContent']['id'];
}

$data = $this->requestAction('/blog/blog/get_authors/' . $id . '/' . $view_count);
$authors = $data['authors'];
$blogContent = $data['blogContent'];
$baseCurrentUrl = $blogContent['BlogContent']['name'] . '/archives/';
?>
<div class="widget widget-blog-authors widget-blog-authors-<?php echo $id ?> blog-widget">
	<?php if ($name && $use_title): ?>
		<h2><?php echo $name ?></h2>
	<?php endif ?>
	<?php if ($authors): ?>
		<ul>
			<?php foreach ($authors as $author): ?>
				<?php
				if ($this->request->url == $baseCurrentUrl . $author['User']['name']) {
					$class = ' class="current"';
				} else {
					$class = '';
				}
				if ($view_count) {
					$title = $this->BcBaser->getUserName($author['User']) . ' (' . $author['count'] . ')';
				} else {
					$title = $this->BcBaser->getUserName($author['User']);
				}
				?>
				<li<?php echo $class ?>>
					<?php
					$this->BcBaser->link($title, array(
						'admin' => false, 'plugin' => '',
						'controller' => $blogContent['BlogContent']['name'],
						'action' => 'archives',
						'author',
						$author['User']['name']
					))
					?>
				</li>
			<?php endforeach; ?>
		</ul>
	<?php endif; ?>
</div>
