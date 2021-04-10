@extends('layouts.addProductLayout')

@section('addProductContent')
    <form action="" method="post">
        @csrf
        <label for="category_id">
            Выбор категории товара

            <select name="category_id" id="">
                @foreach($productCategories as $productCategory)
                    <option value="{{ $productCategory->id }}">{{ $productCategory->name }}</option>
                @endforeach
            </select>
        </label>

        <button class="main-btn">Далее</button>
    </form>
@endsection
