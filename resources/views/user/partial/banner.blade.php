@if(!\Illuminate\Support\Facades\Route::is('user.post.show'))
    <section class="s-top-intro s-top-intro-homepage full-height" style="background-image: url({{ asset($language->banner->image) }});">
        <div class="container">
            <div class="main-title-wrap">
                <h1 class="main-title">{{ $language->banner->title }}</h1>
            </div>
        </div>
    </section>
@endif
