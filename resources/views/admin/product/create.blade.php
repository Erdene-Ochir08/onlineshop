@extends('layouts.admin')

@section('content')

    <div class="row">
        <div class="col md-12">
            <div class="card">
                <div class="card-header">
                    <h4>Add Products
                        <a href="{{ url('admin/product') }}" class="btn btn-primary btn-sm text-white float-end">BACK</a>
                    </h4>
                </div>
                <div class="card-body">
                    @if ($errors->any())
                        <div class="alert alert-warning">
                            @foreach ($errors->all() as $error)
                                <div>{{ $error }}</div>
                            @endforeach
                        </div>
                    @endif
                    <form action="{{ url('admin/product') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <ul class="nav nav-tabs" id="myTab" role="tablist">
                            <li class="nav-item" role="presentation">
                                <button class="nav-link active" id="home-tab" data-bs-toggle="tab" data-bs-target="#home-tab-pane" type="button" role="tab" aria-controls="home-tab-pane" aria-selected="true">
                                    Home
                                </button>
                            </li>

{{--                            <li class="nav-item" role="presentation">--}}
{{--                                <button class="nav-link" id="seotag-tab" data-bs-toggle="tab" data-bs-target="#seotag-tab-pane" type="button" role="tab" aria-controls="seotag-tab-pane" aria-selected="false">--}}
{{--                                    Quantity--}}
{{--                                </button>--}}
{{--                            </li>--}}

                            <li class="nav-item" role="presentation">
                                <button class="nav-link" id="details-tab" data-bs-toggle="tab" data-bs-target="#details-tab-pane" type="button" role="tab" aria-controls="details-tab-pane" aria-selected="false">
                                    Details
                                </button>
                            </li>

                            <li class="nav-item" role="presentation">
                                <button class="nav-link" id="image-tab" data-bs-toggle="tab" data-bs-target="#image-tab-pane" type="button" role="tab" aria-controls="image-tab-pane" aria-selected="false">
                                    Product Image
                                </button>
                            </li>

                        </ul>

                        <div class="tab-content" id="myTabContent">
                            <div class="tab-pane fade border p-3 show active" id="home-tab-pane" role="tabpanel" aria-labelledby="home-tab" tabindex="0">
                                <div class="mb-3">
                                    <label for="category_id">Category</label>
                                    <select name="category_id" class="form-control" id="category_id">
                                        @foreach ($categories as $category)
                                            <option value="{{ $category->id }}">{{ $category->name }}</option>
                                        @endforeach
                                    </select>
                                </div>

                                <div class="mb-3">
                                    <label for="name">Product Name</label>
                                    <input type="text" name="name" class="form-control" value="{{old('name')}}">
                                </div>

                                <div class="mb-3">
                                    <label for="slug">Product Slug</label>
                                    <input type="text" name="slug" class="form-control" value="{{old('slug')}}" >
                                </div>
                                <div class="mb-3">
                                    <label for="brand">Select Brand</label>
                                    <select name="brand" class="form-control" id="brand">
                                        <!-- Options will be populated dynamically using JavaScript -->
                                    </select>
                                </div>

                                <div class="mb-3">
                                    <label for="small_description">Small Description (500 Words)</label>
                                    <textarea id="editor2" name="small_description" class="form-control" rows="4" >{{ old('small_description') }}</textarea>
                                </div>

                                <div class="mb-3">
                                    <label for="description">Description</label>
                                    <textarea id="editor" name="description" class="form-control" rows="4">{{ old('description') }}</textarea>
                                </div>
                            </div>

                            <div class="tab-pane fade border p-3" id="details-tab-pane" role="tabpanel" aria-labelledby="details-tab" tabindex="0">
                                <div class="row">
                                    <div class="col-md-4">
                                        <div class="mb-3">
                                            <label for="sale_percent">Sale Percent</label>
                                            <input type="number" name="sale_percent" max="100" class="form-control" value="{{old('sale_percent')}}">
                                        </div>
                                    </div>

                                    <div class="col-md-4">
                                        <div class="mb-3">
                                            <label for="price">Price</label>
                                            <input type="number" name="price" min="1" class="form-control" value="{{old('price')}}">
                                        </div>
                                    </div>

                                    <div class="col-md-4">
                                        <div class="mb-3">
                                            <label for="price">Quantity</label>
                                            <input type="number" name="quantity" min="1" class="form-control" value="{{old('quantity')}}">
                                        </div>
                                    </div>

                                    <div class="col-md-4">
                                        <div class="mb-3">
                                            <label for="trending">Trending</label>
                                            <input type="checkbox" name="trending" value="{{old('trending')}}">
                                            (Checked = Hidden, Unchecked = Visible)
                                        </div>
                                    </div>
                                    <div class="col-md-4">

                                        <div class="mb-3">
                                            <label for="status">Status</label>
                                            <input type="checkbox" name="status" value="{{old('status')}}">
                                            (Checked = Hidden, Unchecked = Visible)
                                        </div>

                                    </div>
                                </div>
                            </div>

                            <div class="tab-pane fade border p-3" id="image-tab-pane" role="tabpanel" aria-labelledby="image-tab" tabindex="0">
                                <div class="mb-3">
                                    <label>Upload Product Image</label><br><br>
                                    <input  type="file" class="form-control" name="image[]" multiple />
                                </div>
                            </div>

                        </div>

                        <div>
                            <button type="submit" class="btn btn-primary float-end">Submit</button>
                        </div>

                    </form>
                </div>
            </div>
        </div>
    </div>

@endsection


@section('scripts')
    {{--    <script src="{{ asset('admin/js/ckeditor.min.js') }}"></script>--}}
    <script src="https://cdn.ckeditor.com/ckeditor5/39.0.1/classic/ckeditor.js"></script>

    <script>
        ClassicEditor
            .create( document.querySelector( '#editor' ) )
            .catch( error => {
                console.error( error );
            } );

        ClassicEditor
            .create( document.querySelector( '#editor2' ) )
            .catch( error => {
                console.error( error );
            } );
    </script>

    <script>
        function populateBrandDropdown() {
            const selectedCategoryId = $('#category_id').val();
            const brandDropdown = $('#brand');

            $.ajax({
                type: 'GET',
                url: '/admin/brand-get',
                data: { category_id: selectedCategoryId },
                success: function (response) {
                    brandDropdown.empty();
                    brandDropdown.append('<option value="">Select Brand</option>');
                    $.each(response, function (key, brand) {
                        brandDropdown.append('<option value="' + brand.name + '">' + brand.name + '</option>');
                    });
                },
                error: function (xhr, textStatus, errorThrown) {
                    console.error(xhr.responseText);
                }
            });
        }
        $('#category_id').on('change', function () {
            populateBrandDropdown();
        });
            populateBrandDropdown();
    </script>

@endsection
