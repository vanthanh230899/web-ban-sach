<div class="bd-example">
    <div id="carouselExampleCaptions" class="carousel slide" data-ride="carousel">
        <ol class="carousel-indicators">
            @foreach($slide as $key => $sl)
            <li data-target="#carouselExampleCaptions" data-slide-to="{{$key}}" class="{{ $key == 1 ? 'active' : '' }}"></li>
            @endforeach
        </ol>

        <div class="carousel-inner">
            @foreach($slide as $key => $sl)
            <div class="{{ $key == 1 ? 'active' : '' }} carousel-item">
                <img src="public/images/hinh-slide/{{$sl->ten_slide}}" class="w-100">
            </div>
            @endforeach

        </div>
        <a class="carousel-control-prev" href="#carouselExampleCaptions" role="button" data-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="sr-only">Previous</span>
        </a>
        <a class="carousel-control-next" href="#carouselExampleCaptions" role="button" data-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="sr-only">Next</span>
        </a>
    </div>
</div>