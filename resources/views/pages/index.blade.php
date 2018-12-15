@if (Route::currentRouteName() === "site.post.tag")
	<h2 class="icon fa-file-text-o">Посты на тему: {{ $tagName }}</h2>
@else
	<h2 class="icon fa-file-text-o">Недавние посты</h2>
@endif

@forelse ($posts as $post)
	<article class="box excerpt post">
		<div class="post__image-wrapper">
			<a href="{{ route('site.post.post', $post->id) }}" class="image left">
				{{-- <img src="/assets/images/pic0{{ mt_rand(4,6) }}.jpg" alt=""> --}}
				<img src="{{ $post->image }}" alt="">
			</a>
		</div><!-- /post__image-wrapper -->
		<div class="post__content">
			<header>
				<span class="date">{{ getRusDate($post->updated_at) }}</span>
				<ul class="tags">
					@foreach ($post->tags as $tag)
						@if ($tag->name)
							<li class="tags__item">
								<a class="tags__link" href="{{ route('site.post.tag', $tag->id) }}">{{ $tag->name }}</a>
							</li>
						@endif
					@endforeach
				</ul>
				<h3><a href="{{ route('site.post.post', $post->id) }}">{{ $post->title }}</a></h3>
					<div class="post__about-wrapper">
						<p class="post__author">
							@can('view', App\Models\Profile::class)
								Автор: <a class="post__author-link" href="{{ route('site.user.profile', $post->user->id) }}">{{ $post->user->login }}</a>
							@else
								Автор: {{ $post->user->login }}
							@endcan
						</p>
						<span class="post__views-count">
							<i class="fa fa-eye"></i> {{ $post->views_count }}
						</span>
					</div>
			</header>
			<p class="post__announce">
				@if (mb_strlen($post->content) >= 200)
					{{ mb_substr($post->content, 0, 200) }}
					<a class="post__read-more" href="{{ route('site.post.post', $post->id) }}"> ...</a>
				@else
					{{ $post->content }}
				@endif
			</p>
			@can('update', App\Models\Post::class)
				@if ($post->user->id === Auth::user()->id)
					<a class="post__change post__change--edit" href="{{ route('site.post.edit', $post->id) }}">
						<i class="fa fa-pencil"></i>
					</a>
				@endif
			@endcan
			@can('delete', App\Models\Post::class)
				@if ($post->user->id === Auth::user()->id)
					<a class="post__change post__change--delete" href="{{ route('site.post.delete', $post->id) }}" onclick="return confirm('Удалить статью?')">
						<i class="fa fa-times"></i>
					</a>
				@endif
			@endcan
		</div><!-- /post__content -->
	</article>
@empty
	<p>Нет постов для отображения...</p>
@endforelse

@can('create', App\Models\Post::class)
	<a class="button alt icon fa-file-o" href="{{ route('site.post.add') }}">Добавить</a>
@endcan
