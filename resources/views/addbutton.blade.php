@if (session()->has('tablenumber'))
    @php
        $cartItems = session()->get('cart', []);
        $inCart = array_key_exists($id, $cartItems);
        $quantity = $inCart ? $cartItems[$id] : 0;
    @endphp
    <!-- Add to Cart Button -->
    @if ($isAvailable == 1)
        <button class="add-to-cart-btn btn btn-primary" data-item-id="{{ $id }}"
            style="{{ $inCart ? 'display:none;' : '' }}">
            Add
        </button>
    @else
        <button type="button" class="btn btn-danger">
            Out of stock
        </button>
    @endif

    <!-- Quantity Control -->
    <div class="quantity-control" data-item-id="{{ $id }}" style="{{ $inCart ? '' : 'display:none;' }}">
        <button type="button" class="quantity-btn btn btn-secondary minus" data-item-id="{{ $id }}">-</button>
        <span class="quantity" id="quantity-{{ $id }}">{{ $quantity }}</span>
        <button type="button" class="quantity-btn btn btn-secondary plus" data-item-id="{{ $id }}">+</button>
    </div>
@endif
