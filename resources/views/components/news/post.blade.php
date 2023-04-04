<div class="container-fluid">
    <div class="row row-title">
        <div class="col-12">
            <h2 class="text-center">{{ $attributes['title'] }}</h2>
        </div>
    </div>
    <div class="row row-content">
        <div class="col-12 col-md-10 offset-md-1">
            @php
                echo $attributes['content'];
            @endphp
        </div>
    </div>
    <div class="row row-info flex-column justify-content-center flex-md-row justify-content-md-between mt-5">
        <div class="col-12 col-md-6">
            <span class="fw-bold">CATEGORIE:</span>
            <span>{{ $attributes['categories'] }}</span>
        </div>
        <div class="col-12 col-md-6">
            <span class="fw-bold">TAG:</span>
            <span>{{ $attributes['tags'] }}</span>
        </div>
    </div>
    <div class="row flex-column justify-content-center flex-md-row justify-content-md-between">
        <div class="col-12 col-md-6">
            <span class="fw-bold">DATA DI CREAZIONE:</span>
            <span>{{ $attributes['created_at'] }}</span>
        </div>
        <div class="col-12 col-md-6">
            <span class="fw-bold">UTLIMO AGGIORNAMENTO:</span>
            <span>{{ $attributes['updated_at'] }}</span>
        </div>
    </div>
</div>