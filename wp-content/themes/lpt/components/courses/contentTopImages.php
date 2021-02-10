<?php
use App\Proxies\CoursePost;

/**
 * @var stdClass $post
 * @var CoursePost $course
 */

if ($course->contentTopImages): ?>
	<section class="container mx-auto">
		<ul class="flex justify-center items-stretch -mx-3 my-10">
			<?php foreach ($course->contentTopImages as $image): ?>
				<li class="mx-3">
					<img src="<?= $image ?>" alt="" style="max-height: 12rem;"/>
				</li>
			<?php endforeach; ?>
		</ul>
	</section>
<?php endif; ?>