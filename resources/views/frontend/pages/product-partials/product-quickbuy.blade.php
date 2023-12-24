@if ($products)
    @foreach ($products as $key => $product)
        <div class="modal fade" id="{{ $product->id }}" tabindex="-1" role="dialog">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span class="ti-close" aria-hidden="true"></span>
                        </button>
                    </div>

                    <div class="modal-body">
                        <div class="row no-gutters">
                            <div class="col-lg-6 col-md-12 col-sm-12 col-xs-12">
                                <div class="product-gallery">
                                    <div class="quickview-slider-active">
                                        @php
                                            $photo = explode(',', $product->photo);
                                        @endphp
                                        @foreach ($photo as $data)
                                            <div class="single-slider">
                                                <img src="{{ $data }}" alt="{{ $data }}">
                                            </div>
                                        @endforeach
                                    </div>
                                </div>
                            </div>

                            <div class="col-lg-6 col-md-12 col-sm-12 col-xs-12">
                                <div class="quickview-content">
                                    <h2>{{ $product->title }}</h2>
                                    <div class="quickview-ratting-review">
                                        <div class="quickview-ratting-wrap">
                                            <div class="quickview-ratting">
                                                @php
                                                    $rate = DB::table('product_reviews')
                                                        ->where('product_id', $product->id)
                                                        ->avg('rate');
                                                    $rate_count = DB::table('product_reviews')
                                                        ->where('product_id', $product->id)
                                                        ->count();
                                                @endphp

                                                @for ($i = 1; $i <= 5; $i++)
                                                    @if ($rate >= $i)
                                                        <i class="yellow fa fa-star"></i>
                                                    @else
                                                        <i class="fa fa-star"></i>
                                                    @endif
                                                @endfor
                                            </div>
                                            <a href="#"> ({{ $rate_count }} đánh giá)</a>
                                        </div>

                                        <div class="quickview-stock">
                                            @if ($product->stock > 0)
                                                <span>
                                                    <i class="fa fa-check-circle-o"></i>
                                                    Còn <b>{{ $product->stock }}</b> sản phẩm
                                                </span>
                                            @else
                                                <span>
                                                    <i class="fa fa-times-circle-o text-danger"></i>
                                                    Hết hàng
                                                </span>
                                            @endif
                                        </div>
                                    </div>

                                    @php
                                        $after_discount = $product->price - ($product->price * $product->discount) / 100;
                                    @endphp

                                    <h3>
                                        <small>
                                            <del class="text-muted">{{ number_format($product->price, 2) }} VND</del>
                                        </small>
                                        {{ number_format($after_discount, 2) }} VND
                                    </h3>

                                    <div class="quickview-peragraph">
                                        <p>{!! html_entity_decode($product->summary) !!}</p>
                                    </div>

                                    <div class="size">
                                        <div class="row">
                                            <div class="col-lg-6 col-12">
                                                <h5 class="title">Chọn kích cỡ</h5>
                                                <select>
                                                    @php
                                                        $sizes = explode(',', $product->size);
                                                    @endphp
                                                    @foreach ($sizes as $size)
                                                        <option>{{ $size }}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                            {{-- <div class="col-lg-6 col-12">
                                                    <h5 class="title">Color</h5>
                                                    <select>
                                                        <option selected="selected">orange</option>
                                                        <option>purple</option>
                                                        <option>black</option>
                                                        <option>pink</option>
                                                    </select>
                                                </div> --}}
                                        </div>
                                    </div>

                                    <form action="{{ route('single-add-to-cart') }}" method="post">
                                        @csrf
                                        <div class="quantity">
                                            <div class="input-group">
                                                <div class="button minus">
                                                    <button class="btn btn-primary btn-number" disabled="disabled"
                                                        data-type="minus" data-field="quant[1]">
                                                        <i class="ti-minus"></i>
                                                    </button>
                                                </div>

                                                <input type="hidden" name="slug" value="{{ $product->slug }}">
                                                <input type="text" name="quant[1]" class="input-number"
                                                    data-min="1" data-max="1000" value="1">

                                                <div class="button plus">
                                                    <button type="button" class="btn btn-primary btn-number"
                                                        data-type="plus" data-field="quant[1]">
                                                        <i class="ti-plus"></i>
                                                    </button>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="add-to-cart">
                                            <button type="submit" class="btn">Thêm vào giỏ hàng</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    @endforeach
@endif
