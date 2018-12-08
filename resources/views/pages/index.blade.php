@if (Route::currentRouteName() === "site.post.tag")
	<h2 class="icon fa-file-text-o">Посты на тему: {{ $tagName }}</h2>
@else
	<h2 class="icon fa-file-text-o">Недавние посты</h2>
@endif

@forelse ($posts as $post)
	<article class="box excerpt post">
		<div class="post__image-wrapper">
			<a href="post/{{ $post->id }}" class="image left">
				<img src="/assets/images/pic0{{ mt_rand(4,6) }}.jpg" alt="">
			</a>
		</div><!-- /post__image-wrapper -->
		<div class="post__content">
			<header>
				<span class="date">{{ getRusDate($post->updated_at) }}</span>
				<ul class="tags">
					@foreach ($post->tags as $tag)
						@if ($tag->name)
							<li class="tags__item">
								<a class="tags__link" href="/post/tag/{{ $tag->id }}">{{ $tag->name }}</a>
							</li>
						@endif
					@endforeach
				</ul>
				<h3>
					<a href="post/{{ $post->id }}">{{ $post->title }}</a>
					<p class="post__author">
						@if (Auth::check())
							Автор: <a class="post__author-link" href="/user/{{ $post->user->id }}">{{ $post->user->login }}</a>
						@else
							Автор: {{ $post->user->login }}
						@endif
					</p>
				</h3>
			</header>
			<p>
				@if (strlen($post->content) >= 150)
					{{ substr($post->content, 0, 150) . ' ...' }}
				@else
					{{ $post->content }}
				@endif
			</p>
			@if (Auth::check() && $post->user->id === Auth::user()->id)
				<a class="post__change post__change--edit" href="/post/edit/{{ $post->id }}">
					<i class="fa fa-pencil"></i>
				</a>
				<a class="post__change post__change--delete" href="/post/delete/{{ $post->id }}" onclick="return confirm('Удалить статью?')">
					<i class="fa fa-times"></i>
				</a>
			@endif
		</div><!-- /post__content -->
	</article>
@empty
	<p>Нет постов для отображения...</p>
@endforelse

@if (Auth::check())
	<a class="button alt icon fa-file-o" href="/post/add">Добавить</a>
@endif
