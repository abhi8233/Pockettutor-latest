<div class="mb-3 subscription">
    <div class="row">
        @foreach($subscription as $row)
            <div class="col-12 col-md-3 plan-main">
                <div for="option-{{ str_replace(' ','-',$row->plan) }}" class="option">
                    <div class="d-flex flex-column justify-content-around pt-height-p-100">
                        <div class="pt-font-size-px-16">{{ $row->plan }}</div>
                        <div class="price-time-main">
                            <div class="pt-font-size-px-24 price pt-color-primary fw-500" style="line-height: 1;">${{ $row->price }}</div>
                            <div class="pt-font-size-px-12 minute">Minutes : {{ $row->minutes }}</div>
                        </div>
                        <!-- <button class="btn text-decoration-none common-btn"  data-bs-toggle="modal" data-bs-target="#payment" onclick="updateSubscription()"> -->
                        <button class="btn text-decoration-none common-btn btn-subscription" data-id="{{ $row->id }}" data-price ="{{ $row->price }}" data-minutes ="{{ $row->minutes }}"  data-slots ="{{ $row->slots }}">
                            Buy Now
                        </button>
                    </div>
                </div>
            </div>
        @endforeach
        <div id="msg"></div>
    </div>
</div>