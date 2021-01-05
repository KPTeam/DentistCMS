@push('head')
    <link
        href="/favicon.ico"
        id="favicon"
        rel="icon"
    >
@endpush

<p class="h2 n-m font-thin v-center">
    <img class="img-responsive" style="width: 30%; height: 30%" src="{{App\Models\User::getLogo()}}"/>
    <span class="m-l d-none d-sm-block">
        {{ App\Models\User::getAppName()}}
    </span>
</p>