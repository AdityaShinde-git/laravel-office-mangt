<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>My First project</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
  </head>
  <body>

  <div class="bg-dark py-3">
    <h1 class="text-2xl text-white" >My First project</h1>

  </div>
  <div class="container">
    <div class="row justify-content-center mt-4">
      <div class="col-md-10 d-flex justify-content-end">
        <a href="{{ route('products.index') }}" class="btn btn-dark">Back</a>
      </div>
    </div>
    <div class="row d-flex justify-content-center">
        <div class="col-md-10" >
            <div class="card borde-0 shadow-lg my-4">
                <div class="card-header bg-dark">
                    <h3 class="text-white" >Edit the Employee</h3>
                </div>
                <form enctype="multipart/form-data" action="{{ route('products.update',$product->id) }} " method="post">
                @method('put')  
                @csrf
                <div class="card-body" >
                    <div class="mb-3">
                        <label for="" class="form-label h5">Name</label>
                        <input value="{{ old('name',$product->name) }}" type="text" class=" @error('name') is-invalid @enderror form-control form-control-lg" placeholder="Name" name="name">
                        @error('name')
                        <p class="invalid-feedback">{{ $message }}</p>

                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="" class="form-label h5">Company-[COM-ID]</label>
                        <input value="{{ old('sku',$product->sku) }}" type="text" class=" @error('sku') is-invalid @enderror form-control form-control-lg" placeholder="Sku" name="sku">
                        @error('sku')
                        <p class="invalid-feedback">{{ $message }}</p>

                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="" class="form-label h5">Salary</label>
                        <input value="{{ old('price',$product->price) }}" type="text" class=" @error('price') is-invalid @enderror form-control form-control-lg" placeholder="Price" name="price">
                        @error('price')
                        <p class="invalid-feedback">{{ $message }}</p>

                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="" class="form-label h5">Description</label>
                        <textarea placeholder="Description" class="form-control" name="description"  cols="30" rows="5" >{{ old('description',$product->description) }}</textarea>
                      </div>
                      <div class="mb-3">
                        <label for="" class="form-label h5">Image</label>
                        <input type="file" class="form-control form-control-lg " placeholder="Price" name="image">
                         @if($product ->image != "")
                        <img class="w-50 my-3" src="{{asset('uploads/products/'.$product)}}" alt="image">
                        @endif
                    </div>
                    <div class="d-grid">
                      <button class="btn btn-lg btn-dark" >Update</button>

                    </div>
                </div>
              </form>

            </div>

        </div>

    </div>
  </div>
</body>
</html>