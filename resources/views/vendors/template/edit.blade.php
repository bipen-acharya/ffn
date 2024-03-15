@extends('vendors.extends.soft_ui')

@section('title', 'Edit ' . $title)

@section('content_header')
    <h1>Edit {{ $title }}</h1>
@stop

@section('css')
    @stack('styles')
@stop

@section('content')
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <!-- left column -->
                <div class="col">
                    <!-- general form elements -->
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">{{ $title }}</h3>
                        </div>
                        <!-- /.card-header -->
                        <!-- form start -->
                        <form class="form repeater" id="form" action="{{ route($route . 'update', $item->id) }}"
                            method="post" enctype="multipart/form-data">
                            <div class="card-body">
                                @csrf
                                @method('PUT')
                                @if ($errors->any())
                                    @foreach ($errors->all() as $error)
                                        <div class="alert alert-danger" role="alert">
                                            {{ $error }}
                                        </div>
                                    @endforeach
                                @endif
                                @yield('form_content')

                            </div>

                            <div class="card-footer">
                                <button type="submit" id="button_submit" class="btn btn-primary">Submit</button>
                                <a href="javascript:history.back();" class="btn btn-default float-end">Cancel</a>
                            </div>
                        </form>
                    </div>
                    <!-- /.card -->

                </div>
                <!--/.col (left) -->
            </div>
            <!-- /.row -->
        </div><!-- /.container-fluid -->
    </section>

@endsection


@section('js')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.5/localization/messages_ar.min.js"
            integrity="sha512-nb2K94mYysmXkqlnVuBdOagDjQ2brfrCFIbfDIwFPosVjrIisaeYDxPvvr7fsuPuDpqII0fwA51IiEO6GulyHQ=="
            crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="http://ajax.aspnetcdn.com/ajax/jquery.validate/1.19.0/jquery.validate.min.js"></script>
    <script>
        let seatDetails = [];
        $('#button_submit').click(
            function (e) {
                var form = $('#form');
                if (!form.valid()) {
                    return;
                }

                let seats = [...$('.seats')];
                let seatIds = [...$('.seat-ids')];
                let rows = [...$('.rows')];
                let columns = [...$('.columns')];

                rows.forEach(function(row, obj){
                    let keyValue = {
                        seat : seats[obj].value,
                        seatIds: seatIds[obj].value,
                        row: row.value,
                        column: columns[obj].value,
                    }

                    seatDetails.push(keyValue)

                });

                form.append(`
                        <input name="seats" type="hidden" value='${ JSON.stringify(seatDetails)}'>
                    `);

                form.submit();
            }
        );
    </script>

@stack('scripts')
@endsection
