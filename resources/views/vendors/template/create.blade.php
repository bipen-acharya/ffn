@extends('vendors.extends.soft_ui')

@section('title', 'Add ' . $title)

@section('content_header')
    <h1>Add {{ $title }}</h1>
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
                        <form class="form repeater" id="form" name="myForm" action="{{ route($route . 'store') }}"
                            method="post" enctype="multipart/form-data">
                            <div class="card-body">
                                @csrf
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
                                <button type="submit" id="button_submit" class="button_submit btn btn-primary">Submit
                                </button>
                                @if (isset($addMoreButton))
                                    <button type="submit" id="button_submit_add" class="button_submit btn btn-primary">
                                        Submit & Add new
                                    </button>
                                @endif
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
    <script src="http://ajax.aspnetcdn.com/ajax/jquery.validate/1.19.0/jquery.validate.min.js"></script>
    <script>
        let seatDetails = [];
        $('#button_submit').click(
            function(e) {
                e.preventDefault()
                var form = $('#form');
                let valid = true;

                $(document).find('.required-field').each(function() {
                    if (!$(this).val()) {
                        $(this).parent().append(
                            `<span style="color: rgba(234, 52, 52, 0.84);;font-weight: bold">This field is required.</span>`
                        );
                        valid = false;
                    }
                });

                if (!form.valid()) {
                    valid = false;
                }

                if (!valid) {
                    return;
                }

                let seats = [...$('.seats')];
                let seatIds = [...$('.seat-ids')];
                let rows = [...$('.rows')];
                let columns = [...$('.columns')];

                rows.forEach(function(row, obj) {
                    let keyValue = {
                        seat: seats[obj].value,
                        seatIds: seatIds[obj].value,
                        row: row.value,
                        column: columns[obj].value,
                    }

                    seatDetails.push(keyValue)

                });

                form.append(`
                        <input name="seats" type="hidden" value='${JSON.stringify(seatDetails)}'>
                    `);
                form.submit();
            }
        );
    </script>
    @stack('scripts')
@stop
