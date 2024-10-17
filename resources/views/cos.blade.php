@extends('layout')

@section('content')
    <table id="cos" class="table table-hover table-condensed">
        <thead>

        <tr>
            <th style="width:50%">Produs</th>
            <th style="width:10%">Pret</th>
            <th style="width:8%">Quantity</th>
            <th style="width:22%" class="text-center">Subtotal</th>
            <th style="width:10%"></th>
        </tr>

        </thead>
        <tbody>
        @php $total = 0 @endphp
        @if(session('cos'))
            @foreach(session('cos') as $id => $details)
                @php $total += $details['pret'] * $details['quantity'] @endphp
                <tr data-id="{{ $id }}">
                    <td data-th="Event">
                        <div class="row">

                            <div class="col-sm-9">
                                <h4 class="nomargin">{{ $details['nume'] }}</h4>
                            </div>
                        </div>
                    </td>
                    <td data-th="Pret">{{ $details['pret'] }} Ron</td>
                    <td data-th="Quantity">
                        <input type="number" value="{{ $details['quantity'] }}" class="form-control quantity cos_update" min="1" />
                    </td>
                    <td data-th="Subtotal" class="text-center">{{ $details['pret'] * $details['quantity'] }} Ron</td>
                    <td class="actions" data-th="">
                        <button class="btn btn-danger btn-sm cos_remove"><i class="fa fa-trash-o"></i> Sterge</button>
                    </td>
                </tr>
            @endforeach
        @endif
        </tbody>
        <tfoot>
        <tr>
            <td colspan="5" style="text-align:right;"><h3><strong>Total {{ $total }} Ron</strong></h3></td>
        </tr>
        <tr>
            <td colspan="5" style="text-align:right;">
                <form action="/checkout" method="POST">
                    <a href="{{ url('events.showEvents') }}" class="btn btn-danger"> <i class="fa fa-arrow-left"></i> Continua Cumparaturile</a>
                    <input type="hidden" name="_token" value="{{csrf_token()}}">
                    <button class="btn btn-success" type="submit" id="checkout-live-button"><i class="fa fa-money"></i> Plateste</button>
                </form>
            </td>
        </tr>
        </tfoot>
    </table>
@endsection

@section('scripts')
    <script type="text/javascript">

        $(".cos_update").change(function (e) {
            e.preventDefault();

            var ele = $(this);

            $.ajax({
                url: '{{ route('update_cos') }}',
                method: "patch",
                data: {
                    _token: '{{ csrf_token() }}',
                    id: ele.parents("tr").attr("data-id"),
                    quantity: ele.parents("tr").find(".quantity").val()
                },
                success: function (response) {
                    window.location.reload();
                }
            });
        });

        $(".cos_remove").click(function (e) {
            e.preventDefault();

            var ele = $(this);

            if(confirm("Do you really want to remove?")) {
                $.ajax({
                    url: '{{ route('remove_from_cos') }}',
                    method: "DELETE",
                    data: {
                        _token: '{{ csrf_token() }}',
                        id: ele.parents("tr").attr("data-id")
                    },
                    success: function (response) {
                        window.location.reload();
                    }
                });
            }
        });

    </script>
@endsection
