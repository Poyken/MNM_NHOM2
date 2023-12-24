<div class="button-head">
    {{-- <div class="product-action">
        <a href="#" data-toggle="modal"
            data-target="#{{ $product->id }}" title="Mua hàng nhanh">
            <i class="ti-eye"></i>
            <span>Mua hàng nhanh</span>
        </a>
    </div> --}}

    <div class="product-action-2">
        <a href="{{ route('add-to-cart', $product->slug) }}"
            title="Thêm vào giỏ hàng">
            Thêm vào giỏ hàng
        </a>
    </div>
</div>
