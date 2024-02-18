@extends('layouts.main')
@section('container')
    <div>
        <h2>Add School</h2>
        <form method="POST" action="{{ route('school.store') }}" enctype="multipart/form-data">
            @csrf
            <div class="form-group mt-3">
                <label for="name">Name :</label>
                <input type="text" name="name" class="form-control" value="{{ old('name') }}" required>
            </div>

            <div class="form-group mt-3">
                <label for="type">School Type :</label>
                <select class="form-select" name="type" aria-label="Default select example" required>
                    <option selected>Select Kelas</option>
                    <option value="negeri">Negeri</option>
                    <option value="swasta">Swasta</option>
                </select>
            </div>

            <div class="d-flex justify-content-between mt-3">
                <div class="form-group" style="width: 49.5%">
                    <label for="province">Province :</label>
                    <select class="form-select" id="province" name="province" aria-label="Default select example" required>
                        <option selected>Select Province</option>
                        @foreach ($provinces as $province)
                            <option value="{{ $province->id }}" province-name="{{ $province->name }} - ">{{ $province->name }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group" style="width: 49.5%">
                    <div id="city">
                        <label for="city">City :</label>
                        @if ($cities->count() == 0)
                            <select class="form-select" name="city" id="city" aria-label="Default select example" disabled required>
                                <option selected>Select City</option>
                            </select>
                        @else
                            <select class="form-select" name="city" id="city" aria-label="Default select example" required>
                                <option selected>Select City</option>
                                @foreach ($cities as $city)
                                    <option value="{{ $city->id }}" city-name="{{ $city->name }} - ">{{ $city->name }}</option>
                                @endforeach
                            </select>
                        @endif
                    </div>
                </div>
            </div>
            
            <div class="form-group mt-3">
                <label for="address">Address :</label>
                <input type="text" name="address" id="address" class="form-control" value="{{ old('address') }}" required>
            </div>

            <button type="submit" class="btn btn-primary mt-3">Simpan</button>
        </form>
    </div>
@endsection

@section('scripts')
    <script>
        $(document).ready(function() {
            $('.form-select').change(function() { 
                var selectedProvinceId = $(this).val();

                $.ajax({
                    url: '/school/create?province=' + selectedProvinceId,
                    type: 'GET',
                    success: function(response) {
                        var cityForm = $(response).find('#city');
                        $('#city').html(cityForm);
                    },
                    error: function(xhr, status, error) {
                        console.error('Error:', error);
                    }
                });
            });

            $('#province').change(function() {
                var provinceName = $('option:selected', this).attr('province-name');
                $('#address').val(provinceName);

                $('#city').change(function() {
                    var cityName = $('option:selected', this).attr('city-name');
                    $('#address').val(provinceName + cityName);
                });
            });
        });
    </script>
@endsection
