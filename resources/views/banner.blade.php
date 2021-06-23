<!-- Banner quảng cáo -->
<div class="banner-quang-cao">
	@foreach($banner as $bn)
	<img src="public/images/hinh-banner/{{$bn->ten_banner}}" alt="" class="w-100">
	@endforeach
</div>