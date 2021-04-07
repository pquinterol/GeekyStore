<!doctype html>

    <html lang="en">
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
        <meta name="viewport"
              content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <title>BigStore: Shopping Invoice</title>
    </head>
<body>
<div class="row p-5">

    <div class="col-md-12">
        <ul id="errors">
            <h1>{!! trans('order.list') !!}</h1>
            <div>
            </div>
            <table class="table">
                    <thead>
                        <tr>
                        <th scope="col">{!! trans('order.id') !!}</th>
                        <th scope="col">{!! trans('order.status') !!}</th>
                        <th scope="col"><a href="{{ route('order.list','price') }}" role="button" aria-pressed="true">{!! trans('order.price') !!}</a></th>
                        <th scope="col"><a href="{{ route('order.list','created_at') }}" role="button" aria-pressed="true">{!! trans('order.date') !!}</a></th>
                        </tr>
                    </thead>
                    @foreach($data as $order)
                    <tbody>
                        <tr>
                        <th scope="row">{{ $order->getId() }}</th>
                        <td>{{ $order->getStatus() }}</td>
                        <td>{{ $order->getPrice() }}</td>
                        <td>{{ $order->getDate() }}</td>
                        </tr>
                    </tbody>
                    @endforeach
                </table>
        </ul>

    </div>

</div>
</body>
</html>
