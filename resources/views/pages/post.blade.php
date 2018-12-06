<h2>{{ nl2br($post->title) }}</h2>
<small>{{ nl2br(getRusDate($post->updated_at)) }}</small>
<p>{{ nl2br($post->content) }}</p>
<a href="/"><i class="fa fa-level-up"></i> На главную</a>
