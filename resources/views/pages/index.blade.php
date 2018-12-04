<h2 class="icon fa-file-text-o">Недавние посты</h2>

@forelse ($posts as $post)
	<article class="box excerpt">
		<a href="#" class="image left">
			<img src="/assets/images/pic0{{ mt_rand(4,6) }}.jpg" alt="">
		</a>
		<div>
			<header>
				<span class="date">
					{{ $post['date'] }}
				</span>
				<h3>
					<a href="post/{{ $post['id'] }}">
						{{ $post['title'] }}
					</a>
				</h3>
			</header>
			<p>
				@if (strlen($post['content']) >= 150)
					{{ substr($post['content'], 0, 150) . ' ...' }}
				@else
					{{ $post['content'] }}
				@endif
			</p>
		</div>
	</article>
@empty
	<p>Нет постов для отображения...</p>
@endforelse
