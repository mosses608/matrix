@foreach ($components as $component)
    <div class="col-lg-3 col-md-6 col-sm-12 pb-1" style="padding-left: 3px; padding-right: 3px;">
        <a href="{{ url('order-component/' . $component->id) }}">
            <div class="card product-item border-0 mb-1" style="margin: 3px;">
                <div class="card-header product-img position-relative overflow-hidden bg-transparent border p-0">
                    <img class="img-fluid w-100"
                         style="height: 250px; max-height: 350px; object-fit: contain; object-position: center;"
                         src="{{ $component->component_picture ? asset('images/' . $component->component_picture) : asset('assets/images/image.pbg') }}"
                         alt="{{ $component->component_name }}" />
                </div>
                <div style="margin-top: 5px;">
                    <p style="color: #000; font-size: 12px; font-weight: normal;" class="text-truncate mb-1">
                        {{ $component->component_name }}
                    </p>
                    <div class="d-flex">
                        <p style="color: #000;">Tsh</p>
                        <h6 style="font-size: 20px; color: #000; font-weight: bolder; margin-left: 5px;">
                            {{ $component->component_price }}
                        </h6>
                    </div>
                </div>
            </div>
        </a>
    </div>
@endforeach
