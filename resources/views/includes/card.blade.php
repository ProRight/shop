<div class="row">
    @foreach($skus as $sku)
    <div class="col-sm-6 col-md-4">
        <div class="thumbnail">
            <div class="labels">

            </div>
            <img src="/storage/products/iphone_x.jpg" alt="iPhone X 64GB">
            <div class="caption">
                <h3>{{ $sku->product->name }}</h3>
                <p>{{ $sku->price }} {{ App\Services\CurrencyConvert::getCurrencySymbol() }}</p>
                <p>
                <form action="{{ route('basket_add',$sku->product) }}" method="POST">
                    <button type="submit" class="btn btn-primary" role="button">В корзину</button>
                    <a href="{{ route('sku', [isset($category) ? $category->code : $sku->product->category->code, $sku->product->code, $sku->id]) }}"
                       class="btn btn-default"
                       role="button">Подробнее</a>
                    @csrf
                </form>
                </p>
            </div>
        </div>
    </div>
    @endforeach
    {{ $skus->links() }}
</div>
