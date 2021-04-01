<?php
use App\Proxies\CoursePost;
use App\Support\Arr;

/**
 * @var stdClass $post
 * @var CoursePost $course
 */

if ($course->contentTopImages): ?>
	<section class="container mx-auto">
      <?php if(count(Arr::wrap($course->contentTopImages)) === 1): ?>
        <img class="mx-auto mb-6" src="<?= $course->contentTopImages[0] ?>" alt=""/>
      <?php else: ?>
		<?php foreach (array_chunk(Arr::wrap($course->contentTopImages), 3) as $chunk): ?>
			<ul class="flex justify-center items-stretch -mx-3 my-10">
				<?php foreach ($chunk as $image): ?>
					<li class="mx-3">
						<img src="<?= $image ?>" alt="" style="max-height: 12rem;"/>
					</li>
				<?php endforeach; ?>
			</ul>
        <?php endforeach; ?>
      <?php endif; ?>
	</section>
<?php endif; ?>