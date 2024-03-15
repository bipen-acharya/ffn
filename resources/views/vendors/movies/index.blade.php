{{--@extends('templates.index')--}}
@extends('vendors.template.index')

@section('title', 'Movies')

@section('content_header')
    <h1>Movies</h1>
@stop

@section('ext_css')
@stop

@section('index_content')
    <div class="table-responsive">
        <table class="table w-100" id="data-table">
            <thead>
            <tr class="text-left text-capitalize">
                <th>#id</th>
                <th>image</th>
                <th>title</th>
                <th>Theater</th>
                <th>Release Date</th>
                <th>status</th>
                <th>action</th>
            </tr>
            </thead>

        </table>
    </div>
@stop

@push('scripts')
    <script>
        $(function () {
            $('#data-table').DataTable({
                processing: true,
                serverSide: true,
                ajax: "{{ route('movies.index') }}",
                columns: [
                    {data: 'id', name: 'id'},
                    {data: 'image', name: 'image'},
                    {data: 'title', name: 'title'},
                    {data: 'theater_id', name: 'theater_id'},
                    {data: 'release_date', name: 'release_date'},
                    {
                        data: 'status', name: 'status', render: function (data, type, full, meta) {
                            switch (data) {
                                case ('Active'):
                                    return `<span class="badge bg-success">Active</span>`;
                                    break;
                                case ('Inactive'):
                                    return `<span class="badge bg-secondary">Inactive</span>`;
                                    break;
                                default:
                                    return `<span class="badge bg-success">Active</span>`;
                            }
                        }
                    },
                    {data: 'action', name: 'action'},
                ],
            });
        });
    </script>
@endpush
